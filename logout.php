<?php
require_once 'config.php';

// Очищаем сессию
$_SESSION = [];
session_destroy();

// Перенаправляем на главную
redirect_to('index.php');
?>