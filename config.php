<?php
session_start();

// Заглушка для базы данных (вместо реальной БД)
$fake_db = [
    'users' => [
        // Пример пользователя (логин => данные)
        'admin' => [
            'id' => 1,
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT), // Хеш пароля
            'created_at' => '2023-01-01 00:00:00'
        ]
    ]
];

// Функции для работы с "базой данных"

// Поиск пользователя по логину
function find_user_by_username($username) {
    global $fake_db;
    return $fake_db['users'][$username] ?? null;
}

// Добавление нового пользователя
function add_user($user_data) {
    global $fake_db;
    $username = $user_data['username'];
    if (isset($fake_db['users'][$username])) {
        return false; // Пользователь уже существует
    }
    $fake_db['users'][$username] = $user_data;
    return true;
}

// Редирект
function redirect_to($path) {
    header("Location: $path");
    exit;
}

// Проверка авторизации
function require_login() {
    if (!isset($_SESSION['user_id'])) {
        redirect_to('login.php');
    }
}
?>