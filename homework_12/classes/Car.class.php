<?php
class Car extends Transport implements Drivable {
    protected $color = 'white';
    protected $wheelCount = 4;
    private $seats = 5;
    public function getSeats()
    {
        return $this->seats;
    }
    public function startEngine()
    {
        echo 'Завелась';
    }
    public function stopEngine()
    {
        echo 'Заглушили';
    }
    public function drive()
    {
        echo 'Поехали';
    }
    public function brake()
    {
        echo 'Остановились';
    }
    public function __construct($name, $price) {
        parent::__construct($name, $price);
    }
}