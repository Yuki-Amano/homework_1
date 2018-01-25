<?php
class Cart
{
    public $products = array();
    public function addToCart(\Product $product) {
        $this->products[] = $product;
    }
    public function deleteFromCart($productName) {
        foreach($this->products as $key=>$product) {
            if ($product['name'] === $productName) {
                array_splice($this->products, $key, 1);
                break;
            }
        }
    }
    public function getTotal() {
        $total = 0;
        foreach($this->products as $product) {
           $total += $product['price'];
        }
        return $total;
    }
}