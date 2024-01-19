<?php
require 'src\config.php'; // Подключение к базе данных

if (!$conn) {
    die("Ошибка подключения к базе данных: " . $db->getConnectionError());
}

$output = '';
$query = $_POST['query'];

if ($query != '') {
    $sql = "SELECT DISTINCT CommonName FROM films WHERE CommonName LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $filmname = $row['CommonName'];
            $output .= "<div class='film-card'>$filmname</div>";
        }
    } else {
        $output = "<div class='no-film'>Фильмы не найдены</div>";
    }
} else {
}

$conn->close();
echo $output;
?>