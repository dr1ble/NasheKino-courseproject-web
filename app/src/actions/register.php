<?php

require_once __DIR__ . '/../helpers.php';

// Выносим данных из $_POST в отдельные переменные

$avatarPath = null;
$full_name = $_POST['full_name'] ?? null;
$login = $_POST['login'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirmation = $_POST['password_confirmation'] ?? null;
$avatar = $_FILES['avatar'] ?? null;

// Выполняем валидацию полученных данных с формы

if (empty($full_name)) {
    setValidationError('full_name', 'Неверное имя');
}

if (empty($login)) {
    setValidationError('login', 'Поле логина не заполненно');
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    setValidationError('email', 'Указана неправильная почта');
}

if (empty($password)) {
    setValidationError('password', 'Пароль пустой');
}

if ($password !== $passwordConfirmation) {
    setValidationError('password', 'Пароли не совпадают');
}

if (!empty($avatar)) {
    $types = ['image/jpeg', 'image/png'];

    if (!in_array($avatar['type'], $types)) {
        setValidationError('avatar', 'Изображение профиля имеет неверный тип');
    }

    if (($avatar['size'] / 1000000) >= 1) {
        setValidationError('avatar', 'Изображение должно быть меньше 1 мб');
    }
}

// Если список с ошибками валидации не пустой, то производим редирект обратно на форму

if (!empty($_SESSION['validation'])) {
    setOldValue('full_name', $full_name);
    setOldValue('login', $login);
    setOldValue('email', $email);
    redirect('/register.php');
}

//  Загружаем аватарку, если она была отправлена в форме

if (!empty($avatar)) {
    $avatarPath = uploadFile($avatar, 'avatar');
}

$pdo = getPDO();

$query = "INSERT INTO users (full_name, login, email, avatar, password) VALUES (:full_name, :login, :email, :avatar, :password)";

$params = [
    'full_name' => $full_name,
    'login' => $login,
    'email' => $email,
    'avatar' => $avatarPath,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];

$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (\Exception $e) {
    die($e->getMessage());
}

redirect('/');