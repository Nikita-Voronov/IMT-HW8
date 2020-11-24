<?php

class Cart
{
    //атрибуты
    public $items;//элементы корзины
    public $sum;//сумма элементов в корзине
    public $discount;//сумма с учетом скидки
    public $count;//количество элементов

    //метод
    public function __construct()
    {
        $this->items = $_SESSION['items'];
        $this->calc();
    }

    public static function getAllProducts()
    {
        return [
            4 => ['name' => 'Книга', 'price' => 100],
            12 => ['name' => 'Диск', 'price' => 50],
            32 => ['name' => 'Флешка', 'price' => 240]
        ];
    }

    public static function getProductById($id)
    {
        $products = self::getALLProducts();
        $product = $products[$id];
        return isset($products[$id]) ? $products[$id] : null;
    }

    public function add($id, $quantity)
    {
        $product = self::getProductById($id);
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] += $quantity;
        } else {
            $this->items[$id] = ['quantity' => $quantity] + $product;
        }
        $this->calc();
    }
    public function delete($id) {
        if (isset($this->items[$id])){
            unset($this->items[$id]);
        }
        $this->calc();
    }

    public function calc()
    {
        $this->sum = 0;
        $this->count = 0;
        $this->discount = 0;
        if (empty($this->items)) {
            return;
        }
        foreach ($this->items as $key => $value) {
            $this->sum += $value['price'] * $value['quantity'];
            $this->count += $value['quantity'];
        }
        if ($this->sum > 2000) {
            $this->discount = $this->sum * 0.07;
        }
        if ($this->count > 10) {
            $this->discount = $this->sum * 0.1;
        }
        $this->sum = $this->sum - $this->discount;
    }



    public function __destruct()
    {
        $_SESSION['items'] = $this->items;
    }
}

?>