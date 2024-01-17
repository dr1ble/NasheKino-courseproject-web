<?php
require_once('config.php');


function getFilmDetails()
{
    $conn = getConnection();

    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM films ORDER BY RAND() LIMIT 4";

    // Используем prepared statement для избежания SQL-инъекций
    $stmt = $conn->prepare($sql);

    // Выполняем запрос
    $stmt->execute();

    // Получаем результат
    $result = $stmt->get_result();

    // Получаем все строки результата в виде массива ассоциативных массивов
    $filmsArray = $result->fetch_all(MYSQLI_ASSOC);

    // Закрываем prepared statement
    $stmt->close();

    // Закрываем соединение с базой данных
    $conn->close();

    // Возвращаем массив с данными о фильмах
    return $filmsArray;
}


// function fetchDataFromAPI($api_url, $api_key)
// {
//     $options = [
//         'http' => [
//             'header' => "X-API-KEY: $api_key\r\n" .
//                 "Content-Type: application/json\r\n",
//             'method' => 'GET',
//         ],
//     ];

//     $context = stream_context_create($options);
//     $response = file_get_contents($api_url, false, $context);

//     if ($response === FALSE) {
//         die('Error occurred while fetching data from API');
//     }

//     // Декодируем JSON-ответ в массив
//     return json_decode($response, true);
// }

// $api_url = 'https://kinopoiskapiunofficial.tech/api/v2.2/films/301';
// $api_key = 'cca44182-8de1-4977-b343-6fc473bc78df';

// // Получаем данные из API
// $data = fetchDataFromAPI($api_url, $api_key);

// // Выводим полученные данные
// echo '<pre>';
// print_r($data);
// echo '</pre>';


function getFilmDataFromAPI($filmName)
{
    $api_url = 'https://kinopoiskapiunofficial.tech/api/v2.1/films/search-by-keyword';
    $api_key = 'cca44182-8de1-4977-b343-6fc473bc78df'; // Замените на свой действительный API-ключ

    // Подготовка параметров запроса
    $queryParams = http_build_query([
        'keyword' => $filmName,
        'page' => 1,
    ]);

    // Создание полного URL для запроса
    $fullUrl = $api_url . '?' . $queryParams;

    // Установка параметров для контекста HTTP-запроса
    $options = [
        'http' => [
            'header' => "Accept: application/json\r\n" .
                "X-API-KEY: $api_key\r\n",
        ],
    ];
    $context = stream_context_create($options);

    // Выполнение запроса с использованием file_get_contents
    $response = file_get_contents($fullUrl, false, $context);

    if ($response === FALSE) {
        die('Error occurred while fetching data from API');
    }

    // Декодируем JSON-ответ в массив
    return json_decode($response, true);
}

// // Пример использования метода
// $filmName = 'падение'; // Замените на нужное вам название фильма
// $filmDetails = getFilmDataFromAPI($filmName);

// // Выводим полученные данные
// echo '<pre>';
// print_r($filmDetails);
// echo '</pre>';

?>