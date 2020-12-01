<?php
session_start();
include_once 'users.php';

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="'utf-8">
    <title>Страница входа</title>
</head>
<body>
<p align="center">Введите данные</p>
<div align="center">
    <form action="" method="GET">
        <input name="login" type="text" placeholder="Имя"><br>
        <input name="password" type="password" placeholder="Пароль"><br>
        <input type="submit" value="Войти"><br>
    </form>
    <?php
    foreach ($users as $key=>$user) {
        if ($_GET['login'] == $user['login'] && $_GET['password'] == $user['password']) {
            echo "Добро пожаловать ".$user['name'].'<br>';
            echo "<a href=cart.php>Перейти в корзину</a>";
        }
        }


    ?>
</div>
</body>
</html>