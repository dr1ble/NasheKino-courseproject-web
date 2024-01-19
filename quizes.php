<?php
include_once 'src/config.php';
require_once 'src\helpers.php';
$user = currentUser();
$pageTitle = 'Наше Кино - Викторины';


$db = getConnection();
$do = isset($_GET['do']) ? trim(strip_tags($_GET['do'])) : 'list';

if ($do == 'save') {
    $title = trim(mysqli_real_escape_string($db, $_POST['title']));
    $film_name = trim(mysqli_real_escape_string($db, $_POST['film']));

    $res = $db->prepare("INSERT IGNORE INTO tests (`title`, film_name) VALUES (?, ?)");
    $res->bind_param('ss', $title, $film_name);
    $res->execute();
    $testId = mysqli_insert_id($db);

    $questionNum = 1;
    while (isset($_POST['question_' . $questionNum])) {
        $question = trim(mysqli_real_escape_string($db, $_POST['question_' . $questionNum]));
        if (empty($question)) {
            continue;
        }

        $res = $db->prepare("INSERT IGNORE INTO questions (`test_id`, `question`) VALUES (?, ?)");
        $res->bind_param('is', $testId, $question);
        $res->execute();
        $questionId = mysqli_insert_id($db);

        $answerNum = 1;
        while (isset($_POST['answer_text_' . $questionNum . '_' . $answerNum])) {
            $answer = trim(mysqli_real_escape_string($db, $_POST['answer_text_' . $questionNum . '_' . $answerNum]));
            $score = trim($_POST['answer_score_' . $questionNum . '_' . $answerNum]);
            if (empty($answer)) {
                continue;
            }

            $res = $db->prepare("INSERT IGNORE INTO answers (`question_id`, `answer`, `score`) VALUES (?, ?, ?)");
            $res->bind_param('isd', $questionId, $answer, $score);
            $res->execute();

            $answerNum++;
        }
        $questionNum++;
    }

    $resultNum = 1;
    while (isset($_POST['result_' . $resultNum])) {
        $result = trim($_POST['result_' . $resultNum]);
        echo $result;
        $scoreMin = trim($_POST['result_score_min_' . $resultNum]);
        $scoreMax = trim($_POST['result_score_max_' . $resultNum]);

        $res = $db->prepare("INSERT IGNORE INTO results (`test_id`, `score_min`, `score_max`, `result`) VALUES (?, ?, ?, ?)");
        $res->bind_param('iiis', $testId, $scoreMin, $scoreMax, $result);
        $res->execute();

        $resultNum++;
    }

    header('Location: quizes.php
?do=list');
}

if ($do != 'add') {
    $do = 'list';
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
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
    <link rel="stylesheet" href="assets/quiz.css">
</head>
<?= include_once __DIR__ . '/components/head.php';
include_once __DIR__ . '/components/menumain.php'; ?>

<body>


    <div class="container" style="margin-top: 150px;">
        <div class="row justify-content-center">

            <?php include_once 'src/actions/' . $do . '.php'; ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/quiz.js"></script>
</body>
<footer style="width: 85%" ;>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Копирайт © 2024 Наше кино.
                    <br>Все права защищены.
            </div>
        </div>
    </div>
</footer>

</html>