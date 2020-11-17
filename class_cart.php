<?php
session_start();

class Cart
{
    //атрибуты
    public $items = [];//элементы корзины
    public $sum;//сумма элементов в корзине
    public $discount;//сумма с учетом скидки
    public $count;//количество элементов
    //метод
    public function __construct()
    {
        $this->setCount();
        $this->setDiscount();
        $this->setItems();
        $this->setSum();
        $this->items = $_SESSION['items'];
    }
    public function add($id, $quantity, $price)
    {
        $this->items[$id] = ['id' => $id, 'quantity' => $quantity, 'price' => $price];
            foreach ($this->items as $key => $value) {
                if ($value['id'] == $id) {
                    $this->count += $this->items[$key]['quantity'];
                } else {
                    $this->items[$id] = ['id' => $id, 'quantity' => $quantity, 'price' => $price * $quantity];
                }
            }$this->calc();
        }

    public function calc()
    {
        $this->sum = 0;
        $this->count = 0;
        $this->discount = 0;
        if (!empty($this->items)) {
        foreach ($this->items as $key => $value) {
            $this->sum = $value['price']*$value['quantity'];
            $this->count += $value['quantity'];
        }
        }
        if ($this->sum > 2000) {
            $this->discount = $this->sum * 0.07;
        }
        if ($this->count > 10) {
            $this->discount = $this->sum * 0.1;
        }
        $this->sum = $this->sum - $this->discount;
        return;
    }
    public function setSum()
    {
        $this->sum = $this->cart['sum'];
    }
    public function setItems()
    {
        $this->items = $this->cart['items'];
    }
    public function setDiscount()
    {
        $this->discount = $this->cart['discount'];
    }
    public function setCount()
    {
        $this->count = $this->cart['count'];
    }
    public function getItems()
    {
        return $this->items;
    }
    public function getSum()
    {
        return $this->sum;
    }
    public function getDiscount()
    {
        return $this->discount;
    }
    public function getCount()
    {
        return $this->count;
    }
    public function __destruct()
    {
        $_SESSION['items'] = $this->items;
    }
}

?>