<?php
session_start();
header('Location: cart.php');
include 'cart.php';
include 'class_cart.php';
function delete()
{
    foreach ($a->cart as $key => $value) {
        if ($value['id'] == $id) {
            unset($this->cart[$key]);
        }
    }$this->calc();
}

?>