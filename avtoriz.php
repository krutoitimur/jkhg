<?php

    include 'avtoriz.html';

$host = 'localhost'; // Хост базы данных
$db = 'database'; // Имя базы данных
$user = 'username'; // Пользователь базы данных
$password = 'password'; // Пароль базы данных

// Установка соединения с базой данных
$connection = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Получение данных из POST-запроса
$login = $_POST['login'];
$password = $_POST['password'];
$nickname = $_POST['nickname'];

// Подготовка SQL-запроса для вставки данных в таблицу
$query = "INSERT INTO Person (login, password, nickname) VALUES (:login, :password, :nickname)";
$statement = $connection->prepare($query);
$statement->bindParam(':login', $login);
$statement->bindParam(':password', $password);
$statement->bindParam(':nickname', $nickname);

// Выполнение SQL-запроса
$statement->execute();

// Закрытие соединения с базой данных
$connection = null;

// Отправка ответа клиенту
echo "Данные сохранены в базе данных";
?>
