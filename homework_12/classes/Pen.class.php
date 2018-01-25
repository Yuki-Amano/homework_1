<?php
class Pen extends WritingInstrument implements Writable {
    public function refill($newColor) {
        $this->color = $newColor;
        $this->capacity = 10;
    }
    public function write() {
        if ($this->capacity === 0) {
            echo 'Замените ручку';
            exit;
        }
        $this->capacity--;
    }
    public function __construct($name, $price) {
        parent::__construct($name, $price);
    }
}