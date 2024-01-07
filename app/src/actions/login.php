<?php

require_once __DIR__ . '/../helpers.php';

$login = $_POST['login'] ?? null;
$password = $_POST['password'] ?? null;

if (empty($login)) {
    setOldValue('login', $login);
    setValidationError('login', 'Неверный логин');
    setMessage('error', 'Ошибка валидации');
    redirect('../../../index.php');
}

$user = findUser($login);

if (!$user) {
    setMessage('error', "Пользователь $login не найден");
    redirect('../../../index.php');
}

if (!password_verify($password, $user['password'])) {
    setMessage('error', 'Неверный пароль');
    redirect('../../index.php');
}

$_SESSION['user']['id'] = $user['id'];

redirect('/home.php');