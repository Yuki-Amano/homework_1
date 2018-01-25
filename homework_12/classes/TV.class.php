<?php
class TV extends Tele implements Watchable {
    private $screenSize;
    private $isSmart;
    public function __construct($name, $price, $screenSize, $isSmart) {
        parent::__construct($name, $price);
        $this->screenSize = $screenSize;
        $this->isSmart = $isSmart;
    }
    public function turnOn()
    {
        echo 'Телевизор включен';
    }
    public function turnOff()
    {
        echo 'Телевизор выключен';
    }
    public function watch()
    {
        echo 'Смотрим';
    }
}