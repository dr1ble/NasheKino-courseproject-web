<?php

session_start();

require_once __DIR__ . '/config.php';

function debug($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function redirect(string $path)
{
    header("Location: $path");
    die();
}

function setValidationError(string $fieldName, string $message): void
{
    $_SESSION['validation'][$fieldName] = $message;
}

function hasValidationError(string $fieldName): bool
{
    return isset($_SESSION['validation'][$fieldName]);
}

function validationErrorAttr(string $fieldName): string
{
    return isset($_SESSION['validation'][$fieldName]) ? 'aria-invalid="true"' : '';
}

function validationErrorMessage(string $fieldName): string
{
    $message = $_SESSION['validation'][$fieldName] ?? '';
    unset($_SESSION['validation'][$fieldName]);
    return $message;
}

function setOldValue(string $key, mixed $value): void
{
    $_SESSION['old'][$key] = $value;
}

function old(string $key)
{
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function uploadFile(array $file, string $prefix = ''): string
{
    $uploadPath = __DIR__ . '/../uploads';

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileName = $prefix . '_' . time() . ".$ext";

    if (!move_uploaded_file($file['tmp_name'], "$uploadPath/$fileName")) {
        die('Ошибка при загрузке файла на сервер');
    }

    return "uploads/$fileName";
}

function setMessage(string $key, string $message): void
{
    $_SESSION['message'][$key] = $message;
}

function hasMessage(string $key): bool
{
    return isset($_SESSION['message'][$key]);
}

function getMessage(string $key): string
{
    $message = $_SESSION['message'][$key] ?? '';
    unset($_SESSION['message'][$key]);
    return $message;
}

function getPDO(): PDO
{
    try {
        return new \PDO('mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    } catch (\PDOException $e) {
        die("Connection error: {$e->getMessage()}");
    }
}

function findUser(string $email): array|bool
{
    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function countUserScore(string $user_id): array|bool
{
    try {
        $pdo = getPDO();

        $sql = "SELECT 
                    user_id,
                    COUNT(DISTINCT test_id) AS unique_tests,
                    SUM(score) AS total_score
                FROM 
                    user_test_results
                WHERE 
                    (user_id, score) IN (
                        SELECT 
                            user_id, MAX(score)
                        FROM 
                            user_test_results
                        GROUP BY 
                            user_id, test_id
                    )
                    AND user_id = :user_id
                GROUP BY 
                    user_id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Проверка, пустой ли набор результатов
            if (!$result) {
                // Возвращаем значения по умолчанию
                return [
                    'user_id' => $user_id,
                    'unique_tests' => 0,
                    'total_score' => 0,
                ];
            }

            return $result;
        } else {
            // Запись ошибки в лог или обработка по необходимости
            error_log("Ошибка выполнения SQL-запроса: " . implode(" ", $stmt->errorInfo()));

            // Возвращаем значения по умолчанию
            return [
                'user_id' => $user_id,
                'unique_tests' => 0,
                'total_score' => 0,
            ];
        }
    } catch (PDOException $e) {
        // Запись исключения в лог или обработка по необходимости
        error_log("Исключение PDO: " . $e->getMessage());

        // Возвращаем значения по умолчанию
        return [
            'user_id' => $user_id,
            'unique_tests' => 0,
            'total_score' => 0,
        ];
    }
}


function getTestIdByFilm(string $film): ?int
{
    try {
        $pdo = getPDO();

        $sql = "SELECT id FROM tests WHERE film_name = :film LIMIT 1";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':film', $film, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && isset($result['id'])) {
                return (int) $result['id'];
            }
        }

        return null;
    } catch (PDOException $e) {
        // Запись исключения в лог или обработка по необходимости
        error_log("Исключение PDO: " . $e->getMessage());
        return null;
    }
}


// $testTitle = "Афоня";
// $testId = getTestIdByfILM($testTitle);

// if ($testId !== null) {
//     echo "ID теста '{$testTitle}': {$testId}";
// } else {
//     echo "Тест с названием '{$testTitle}' не найден.";
// }

function getCategories(): ?array
{
    try {
        $pdo = getPDO();

        $sql = "SELECT name FROM filmino";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                $categories = array_column($results, 'name');
                return $categories;
            }
        }

        return null;
    } catch (PDOException $e) {
        // Запись исключения в лог или обработка по необходимости
        error_log("Исключение PDO: " . $e->getMessage());
        return null;
    }
}

function getFilmCountByCategory(): ?array
{
    try {
        $pdo = getPDO();

        $sql = "SELECT COALESCE(filmino, 'Категория не указана') AS category, COUNT(*) AS film_count FROM films GROUP BY filmino";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($results) {
                $filmCounts = [];
                foreach ($results as $row) {
                    $filmCounts[$row['category']] = (int) $row['film_count'];
                }
                return $filmCounts;
            }
        }

        return null;
    } catch (PDOException $e) {
        // Запись исключения в лог или обработка по необходимости
        error_log("Исключение PDO: " . $e->getMessage());
        return null;
    }
}

function currentUser(): array|false
{
    $pdo = getPDO();

    if (!isset($_SESSION['user'])) {
        return false;
    }

    $userId = $_SESSION['user']['id'] ?? null;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->execute(['id' => $userId]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
}

function logout(): void
{
    unset($_SESSION['user']['id']);
    redirect('/');
}

function checkAuth(): void
{
    if (!isset($_SESSION['user']['id'])) {
        redirect('/');
    }
}

function checkGuest(): void
{
    if (isset($_SESSION['user']['id'])) {
        redirect('/login.php');
    }
}
function is_authenticated(): bool
{
    if (isset($_SESSION['user']['id'])) {
        return true;
    } else {
        return false;
    }
}



// $user = currentUser();
// $stats = countUserScore($user['id']);

// if ($result !== false) {
//     // Вывод результатов
//     echo "User ID: {$result['user_id']}\n";
//     echo "Unique Tests: {$result['unique_tests']}\n";
//     echo "Total Score: {$result['total_score']}\n";
// } else {
//     echo "Ошибка выполнения запроса.\n";
// }
