<?php
include_once 'src/config.php';
require_once 'src\helpers.php';

$db = getConnection();
// session_start();

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$testId = (int) $_GET['id'];
$film_name = $_GET['film_name'];
// echo "film_name: $film_name";


if ($testId < 1) {
    header('location: admin.php');
}

if (!isset($_SESSION['test_id']) || $_SESSION['test_id'] != $testId) {
    $_SESSION['test_id'] = $testId;
    $_SESSION['test_score'] = 0;
}

$res = $db->query("SELECT * FROM tests WHERE id = {$testId}");
$row = $res->fetch_assoc();
$testTitle = $row['title'];

$questionNum = isset($_POST['q']) ? (int) $_POST['q'] : 0;
if (empty($questionNum)) {
    $questionNum = 0;
}
$questionNum++;
$questionStart = $questionNum - 1;

$res = $db->query("SELECT count(*) AS count FROM questions WHERE test_id = {$testId}");
$row = $res->fetch_assoc();
$questionCount = $row['count'];

$answerId = isset($_POST['answer_id']) ? (int) $_POST['answer_id'] : 0;
if (!empty($answerId)) {
    $res = $db->query("SELECT * FROM answers WHERE id = {$answerId}");
    $row = $res->fetch_assoc();
    $score = $row['score'];
    $_SESSION['test_score'] += $score;
}

$showForm = 0;
if ($questionCount >= $questionNum) {
    $showForm = 1;

    $res = $db->query("SELECT * FROM questions WHERE test_id = {$testId} LIMIT {$questionStart}, 1");
    $row = $res->fetch_assoc();
    $question = $row['question'];
    $questionId = $row['id'];

    $res = $db->query("SELECT * FROM answers WHERE question_id = {$questionId}");
    $answers = $res->fetch_all(MYSQLI_ASSOC);
} else {
    $score = $_SESSION['test_score'];



    $res = $db->query("SELECT * FROM results WHERE test_id = {$testId} AND score_min <= {$score} AND score_max >= {$score}");


    $row = $res->fetch_assoc();


    $result = $row['result'];

    $resscore = $db->prepare("INSERT INTO user_test_results (user_id, test_id, score) VALUES (?, ?, ?)");
    $resscore->bind_param('iii', $_SESSION['user']['id'], $testId, $score);
    $resscore->execute();
}
?>

<!doctype html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Система тестирования</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/quiz.css">
</head>

<body>

    <div class="container">
        <?php if ($showForm) { ?>
            <form action="main.php?id=<?php echo $testId; ?>&film_name=<?php echo $film_name; ?>" method="post">
                <input type="hidden" name="q" value="<?php echo $questionNum; ?>">

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="text-center mt-5">
                            <p>Вопрос
                                <?php echo $questionNum . ' из ' . $questionCount; ?>
                            </p>
                        </div>
                        <div class="card mt-3">
                            <div class="card-header">
                                <h3 style="color: #212529;">
                                    <?php echo $question; ?>
                                </h3>
                            </div>
                            <div class="card-body" style="color: #212529;">
                                <?php foreach ($answers as $answer) { ?>
                                    <div>
                                        <input type="radio" name="answer_id" required value="<?php echo $answer['id']; ?>">
                                        <?php echo $answer['answer']; ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <?php if ($questionCount == $questionNum) { ?>
                                <button type="submit" class="btn btn-success">Получить результат</button>
                            <?php } else { ?>
                                <button type="submit" class="btn btn-primary">Дальше</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
        <?php } else { ?>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            <h3 style="color: black">Ваш результат</h3>
                        </div>
                        <div class="card-body text-center">
                            <div class="result-print">
                                <?php echo $result; ?>
                            </div>
                            
                            <!-- Вам начислено блок с использованием Bootstrap классов -->
                            <div class="score-block mt-3">
                                <div class="font-weight-bold">
                                    Вам начислено:
                                    <?php echo pluralize($score, 'балл', 'балла', 'баллов'); ?>
                                </div>
                            </div>
                            <!-- Кнопка "Назад на сайт" -->
                            <div class="mt-3">
                                <a href="index.php" class="btn btn-primary">Назад на сайт</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>