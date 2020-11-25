<?php
session_start();
include_once 'init.php';
$cart = new Cart();
$products = Cart::getAllProducts();
if ($_GET['product']>0){
    $id = $_GET['product'];
    $quantity=$_GET['quantity'];
    $cart->add($id,$quantity);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Ваша корзина</title>
</head>
<body style="background-color: #dbd5d5">
<div style="color: #fc9a02">
<?php
    if ($cart->sum>0) {?>
    К оплате <?php echo $cart->sum; ?><br><br>
    <table border="2">
            <tr>
                <td>id</td>
                <td>Название</td>
                <td>Количество</td>
            </tr>
        <?php
        foreach ($cart->items as $key => $product) { ?>
        <tr>
                <td>
                    <?php echo $key ?></td>
                <td>
                     <?php echo $product['name']; ?>
                </td>
                <td>
                    <?php echo $product['quantity'] ?></td>
                <td>
                    <a href=/delete.php?id=<?php echo $key;?>>Удалить</a>
                </td>
        </tr>
     <?php   } ?>
    </table>
    <?php } else {
        ?>
    Ваша корзина пуста
    <?php } ?>
    <form action="" method="GET">
        <select name="product">
            <option value="0">Choose your items</option>
            <?php
            foreach ($products as $key => $product) {
                echo '<option value="' . $key . '">' . $product['name'] . '</option>';
            }
            ?>
        </select><br>
        Количество:<br>
        <input name="quantity" type="text"><br>
        <input type="submit" name="" value="Add to cart">
    </form>
</div>
</body>
</html>
