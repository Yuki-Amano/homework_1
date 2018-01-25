<?php
class Order
{
    public $cart;
    public function __construct(Cart $cart) {
        $this->cart = $cart;
    }
    public function printPrice() {
        echo 'Общая стоимость: ' . $this->cart->getTotal();
    }
    public function printList() {
        $list = [];
        foreach($this->cart->products as $product) {
            $list[] = $product['name'];
        }
        echo 'Список товаров: ' . implode(', ', $list);
    }
    public function printAll() {
        foreach($this->cart->products as $product) {
            echo 'Название товара: ' . $product['name'] . ', цена: ' . $product['price'];
        }
        echo 'Общая стоимость: ' . $this->cart->getTotal();
    }
}