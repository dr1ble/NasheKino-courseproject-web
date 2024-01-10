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
?>