<?php
session_start();
header('Location: cart.php');
include 'cart.php';
include 'class_cart.php';
function delete()
{
    foreach ($a->items as $key => $value) {
        if ($value[$key] == $key) {
            unset($this->items[$key]);
        }
    } $this->calc();
}

?>