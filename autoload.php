<?php
require_once('src/config.php');

$apiKey = '1756b2a7-f5ac-4671-8546-b47b144ddafb';
$baseURL = 'https://apidata.mos.ru/v1/datasets/1148/rows';
$maxLimit = 500;
$updateInterval = 120;

ini_set('max_execution_time', 0);

function fetchDataFromAPI($skip, $limit, $apiKey, $baseURL) {
    $params = [
        '$top' => $limit,
        '$skip' => $skip,
        'api_key' => $apiKey
    ];
    $url = $baseURL . '?' . http_build_query($params);
    $response = file_get_contents($url);

    if ($response !== false) {
        $data = json_decode($response, true);
        return $data;
    } else {
        die('Не удалось получить данные с API.');
    }
}

function updateDatabase($conn, $data)
{
    // Очистка таблицы перед обновлением
    mysqli_query($conn, "TRUNCATE TABLE films");

    // Загрузка новых данных в базу данных MySQL
    $stmt = mysqli_prepare($conn, "INSERT INTO films (ID, CommonName, SeriesAmount, global_id, FilmType, FrameFormat, Filmino, Duration, Year, ProducingCountry, FilmStudio, IsColor, AgeRestrictions, CopyQuality, DigitalVersion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die('Ошибка подготовки запроса: ' . mysqli_error($conn));
    }

    foreach ($data as $item) {
        $rowData = [
            'ID' => $item['Cells']['ID'],
            'CommonName' => $item['Cells']['CommonName'],
            'SeriesAmount' => $item['Cells']['SeriesAmount'],
            'global_id' => $item['Cells']['global_id'],
            'FilmType' => $item['Cells']['FilmType'],
            'FrameFormat' => $item['Cells']['FrameFormat'],
            'Filmino' => $item['Cells']['Filmino'],
            'Duration' => $item['Cells']['Duration'][0]['Duration'],
            'Year' => $item['Cells']['Year'],
            'ProducingCountry' => $item['Cells']['ProducingCountry'][0]['ProducingCountry'],
            'FilmStudio' => $item['Cells']['FilmStudio'][0]['FilmStudio'],
            'IsColor' => $item['Cells']['IsColor'],
            'AgeRestrictions' => $item['Cells']['AgeRestrictions'],
            'CopyQuality' => $item['Cells']['CopyQuality'],
            'DigitalVersion' => $item['Cells']['DigitalVersion'],
        ];

        $rowData = array_map(function ($value) {
            return is_string($value) ? $value : $value;
        }, $rowData);

        $params = array('');
        foreach ($rowData as $key => &$value) {
            $params[0] .= 's';
            $params[] = &$value;
        }

        call_user_func_array(array($stmt, 'bind_param'), $params);

        $result = mysqli_stmt_execute($stmt);

        if (!$result) {
            die('Ошибка выполнения запроса: ' . mysqli_error($conn));
        }
    }

    mysqli_stmt_close($stmt);

    // SQL запрос для очистки и вставки уникальных значений filmType
    $truncateAndInsertQuery = "
        TRUNCATE TABLE filmino;
        INSERT INTO filmino (name)
        SELECT DISTINCT Filmino FROM films WHERE Filmino IS NOT NULL;
    ";

    $result = mysqli_multi_query($conn, $truncateAndInsertQuery);

    if (!$result) {
        die('Ошибка выполнения запроса для filmType: ' . mysqli_error($conn));
    }
}

function exportToCSV($data, $filename) {
    $csvFile = new SplFileObject($filename, 'w');

    $headers = [
        'ID', 'CommonName', 'SeriesAmount', 'global_id', 'FilmType',
        'FrameFormat', 'Filmino', 'Duration', 'Year', 'ProducingCountry',
        'FilmStudio', 'IsColor', 'AgeRestrictions', 'CopyQuality', 'DigitalVersion',
    ];
    $csvFile->fputcsv($headers);

    foreach ($data as $item) {
        $rowData = [
            $item['Cells']['ID'],
            $item['Cells']['CommonName'],
            $item['Cells']['SeriesAmount'],
            $item['Cells']['global_id'],
            $item['Cells']['FilmType'],
            $item['Cells']['FrameFormat'],
            $item['Cells']['Filmino'],
            $item['Cells']['Duration'][0]['Duration'],
            $item['Cells']['Year'],
            $item['Cells']['ProducingCountry'][0]['ProducingCountry'],
            $item['Cells']['FilmStudio'][0]['FilmStudio'],
            $item['Cells']['IsColor'],
            $item['Cells']['AgeRestrictions'],
            $item['Cells']['CopyQuality'],
            $item['Cells']['DigitalVersion'],
        ];
        $csvFile->fputcsv($rowData);
    }

    $csvFile = null;
}

$conn = mysqli_connect($db_host, $db_user, $db_password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$totalData = array();
$skip = 0;

do {
    $data = fetchDataFromAPI($skip, $maxLimit, $apiKey, $baseURL);

    if ($data !== false) {
        $totalData = array_merge($totalData, $data);

        if (count($data) < $maxLimit) {
            break;
        }

        $skip += $maxLimit;
    } else {
        die('Ошибка получения данных из API.');
    }
} while (true);

updateDatabase($conn, $totalData);
exportToCSV($totalData, 'filmsdata.csv');

mysqli_close($conn);

sleep($updateInterval);

header("Location: {$_SERVER['PHP_SELF']}");
exit();
?>
