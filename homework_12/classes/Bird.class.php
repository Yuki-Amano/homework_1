<?php
abstract class Bird extends \Product {
    protected $weight;
    protected $wings = 2;
    protected $alive = true;
    public function voice() {
        echo  'Птица издает звуки';
    }
    public function shootWing() {
        $this->wings--;
    }
    public function shoot() {
        $this->alive = false;
    }
    public function __construct($name, $price, $weight)
    {
        parent::__construct($name, $price);
        $this->weight = $weight;
    }
}