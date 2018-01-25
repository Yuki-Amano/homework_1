<?php
abstract class Product {
    public $name;
    public $price;
    protected $weight;
    protected $discount = 0;
    protected $delivery = 250;
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
    protected function setWeight($weight)
    {
        $this->weight = $weight;
    }
    protected function setDiscount()
    {
        $this->discount = 0;
    }
    protected function getPrice() {
        if ($this->discount !== 0) {
            $this->delivery = 300;
        }
        $newPrice = $this->price - ($this->price * $this->discount / 100) + $this->delivery;
        return $newPrice;
    }
}