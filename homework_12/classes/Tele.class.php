<?php
abstract class Tele extends \Product {
    public function turnOn()
    {
        echo 'Включен';
    }
    public function turnOff()
    {
        echo 'Выключен';
    }
}