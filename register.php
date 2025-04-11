<?php
require_once 'config.php';

header('Content-Type: application/json');

$errors = [];
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

// Валидация
if (empty($username)) {
    $errors[] = 'Имя пользователя обязательно';
} elseif (strlen($username) < 3) {
    $errors[] = 'Имя пользователя должно быть не менее 3 символов';
}

if (empty($email)) {
    $errors[] = 'Email обязателен';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Некорректный email';
}

if (empty($password)) {
    $errors[] = 'Пароль обязателен';
} elseif (strlen($password) < 6) {
    $errors[] = 'Пароль должен быть не менее 6 символов';
}

if ($password !== $confirm_password) {
    $errors[] = 'Пароли не совпадают';
}

// Проверка существования пользователя
if (find_user_by_username($username)) {
    $errors[] = 'Пользователь с таким именем уже существует';
}

if (empty($errors)) {
    $user_data = [
        'id' => count($fake_db['users']) + 1,
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'created_at' => date('Y-m-d H:i:s')
    ];

    if (add_user($user_data)) {
        $_SESSION['user_id'] = $user_data['id'];
        $_SESSION['username'] = $user_data['username'];
        echo json_encode(['success' => true]);
        exit;
    } else {
        $errors[] = 'Ошибка при регистрации. Попробуйте позже.';
    }
}

echo json_encode(['success' => false, 'errors' => $errors]);
?>