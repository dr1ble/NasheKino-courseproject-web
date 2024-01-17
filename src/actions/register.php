<?php

require_once __DIR__ . '/../helpers.php';

$avatarPath = null;
$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$passwordConfirmation = $_POST['password_confirmation'] ?? null;
$avatar = $_FILES['avatar'] ?? null;

if (empty($name)) {
    setValidationError('name', 'Неверное имя');
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

if (!empty($_SESSION['validation'])) {
    setOldValue('name', $name);
    setOldValue('email', $email);
    redirect('/register.php');
}

if (!empty($avatar)) {
    $avatarPath = uploadFile($avatar, 'avatar');
}

$pdo = getPDO();

$query = "INSERT INTO users (name, email, avatar, password, role) 
          SELECT :name, :email, :avatar, :password, :role 
          WHERE NOT EXISTS (SELECT 1 FROM users WHERE email = :email)";

$params = [
    'name' => $name,
    'email' => $email,
    'avatar' => $avatarPath,
    'password' => password_hash($password, PASSWORD_DEFAULT),
    'role' => 0, 
];

$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);

    if ($stmt->rowCount() === 0) {
        setValidationError('email', 'Пользователь с такой почтой уже зарегистрирован');
        redirect('/register.php');
    } else {
        // Редирект на профиль после успешной регистрации
        $user = findUser($email);
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['email'] = $user['email'];
        $_SESSION['user']['role'] = $user['role'];
        redirect('/profile.php');
    }
} catch (\Exception $e) {
    die($e->getMessage());
}
