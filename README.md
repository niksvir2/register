
---

# 🌐 niksvir — Авторизация и Регистрация

Простой и адаптивный интерфейс на **HTML/CSS/JS** с поддержкой **PHP и MySQL** для регистрации и авторизации пользователей.

---

## 📁 Структура проекта

```plaintext
/auth_site/
│── index.php          # Главная страница
│── register.php       # Страница регистрации
│── login.php          # Страница авторизации
│── logout.php         # Выход из системы
│── dashboard.php      # Защищенная страница (доступна после авторизации)
│── config.php         # Конфигурация и "база данных"
└── style.css          # Стили для страниц
```

---

## 🚀 Как использовать

1. **Клонируйте репозиторий:**

   ```bash
   git clone https://github.com/niksvir2/register
   ```

2. **Создайте базу данных в MySQL:**

   ```sql
   CREATE DATABASE niksvir;
   USE niksvir;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL
   );
   ```

3. **Настройте подключение к базе данных в `db.php`:**

   ```php
   <?php
   $host = 'localhost';
   $db   = 'temperi';
   $user = 'root';
   $pass = ''; // или свой пароль

   $conn = new mysqli($host, $user, $pass, $db);

   if ($conn->connect_error) {
       die("Ошибка подключения: " . $conn->connect_error);
   }
   ?>
   ```

4. **Запустите локальный сервер:**

   - С помощью XAMPP / OpenServer / MAMP
---

## ✨ Возможности

- 🔄 Переключение между формами входа и регистрации
- ✅ Валидированные поля
- 🎨 Стильный и адаптивный интерфейс

---
