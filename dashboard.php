<?php
require_once 'config.php';
require_login();

// Получаем данные текущего пользователя
$user = find_user_by_username($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Личный кабинет</h1>
        <p>Добро пожаловать, <strong><?= htmlspecialchars($user['username']) ?></strong>!</p>
        <p>Ваш email: <strong><?= htmlspecialchars($user['email']) ?></strong></p>
        <p>Дата регистрации: <strong><?= htmlspecialchars($user['created_at']) ?></strong></p>
        
        <p><a href="logout.php">Выйти</a></p>
    </div>
</body>
</html>
