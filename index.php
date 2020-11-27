<?php
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
        <input name="login" type="text"><br>
        <input name="password"><br>
        <input type="submit" value="Войти"><br>
    </form>
    <?php
    foreach ($users as $key=>$user) {
        if ($_GET['login'] ==$user[$key]['login'] && $_GET['password'] == $user[$key]['password']) {
            echo "<a href=cart.php>Перейти в корзину</a>";
        }
    }
    var_dump($_GET);?>
</div>
</body>
</html>