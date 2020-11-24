<?php
include 'init.php';
$cart = new Cart();
$cart->delete($_GET['id']);
header('Location: cart.php');
?>