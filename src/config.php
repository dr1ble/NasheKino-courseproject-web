<?php

const DB_HOST = 'localhost';
const DB_PORT = '3306';
const DB_NAME = 'cpkino';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';

$db_host = DB_HOST;
$db_port = DB_PORT;
$database = DB_NAME;
$db_user = DB_USERNAME;
$db_password = DB_PASSWORD;

$conn = mysqli_connect($db_host, $db_user, $db_password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Выбор базы данных
mysqli_select_db($conn, $database) or die("Cannot select DB");

function getConnection(){
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function pluralize($number, $singular, $plural1, $plural2)
{
    if ($number % 10 == 1 && $number % 100 != 11) {
        return "$number $singular";
    } elseif (($number % 10 >= 2 && $number % 10 <= 4) && !($number % 100 >= 12 && $number % 100 <= 14)) {
        return "$number $plural1";
    } else {
        return "$number $plural2";
    }
}
?>