<?php
class Transport {
    protected $color;
    protected $wheelCount;
    public function getColor()
    {
        return $this->color;
    }
    public function setColor($color)
    {
        $this->color = $color;
    }
    public function getWheelCount()
    {
        return $this->wheelCount;
    }
    public function setWheelCount($wheelCount)
    {
        $this->wheelCount = $wheelCount;
    }
}

interface Drivable
{
    public function startEngine();
    public function stopEngine();
    public function drive();
    public function brake();
}

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
}

$car1 = new Car;
$car1->setColor('green');
$car2 = new Car;
$car2->getSeats();

class Tele {
    protected $price;
    public function getPrice()
    {
        return $this->price;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
}

interface Watchable {
    public function turnOn();
    public function turnOff();
    public function watch();
}

class TV  extends Tele implements Watchable {
    private $screenSize;
    private $isSmart;
    public function __construct($screenSize, $isSmart, $price) {
        $this->screenSize = $screenSize;
        $this->isSmart = $isSmart;
        $this->price = $price;
    }
    public function turnOn()
    {
        echo 'Включили';
    }
    public function turnOff()
    {
        echo 'Выключили';
    }
    public function watch()
    {
        echo 'Смотрим';
    }
}

$tv1 = new TV(40, true, 10);
$tv1->setPrice(5);
$tv2 = new TV(50, false, 7);
$tv2->setPrice(5);

class WritingInstrument  {
    protected $color;
    protected $capacity;
}

interface Writable {
    public function write();
}

class Pen extends WritingInstrument implements Writable {
    public function repaint($newColor) {
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
}

$pen1 = new Pen;
$pen1->repaint('pink');
$pen2 = new Pen;
$pen2->write();
$pen2->repaint('green');

interface Huntable {
    public function shoot();
}

class Bird implements Huntable {
    protected $gender;
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
    public function __construct($gender, $weight)
    {
        $this->gender = $gender;
        $this->weight = $weight;
    }
}

class Duck extends Bird {
   public function voice () {
       echo 'Кря!';
   }
}

$duck1 = new Duck('male', 2);
$duck1->shoot();
$duck2 = new Duck('female', 2);
$duck2->voice();

abstract class Product {
    protected $name;
    protected $price;
    protected $weight;
    protected $discount = 0;
    protected $delivery = 250;
    public function __construct($price, $weight)
    {
        $this->price = $price;
        $this->weight = $weight;
    }
    abstract function setName($name);
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

class Product1 extends Product {
    public function setName($name)
    {
        $this->name = $name;
        echo 'Продукт 1: ' . $name;
        return $this;
    }
}

class Product2 extends Product {
    public function setName($name)
    {
        $this->name = $name;
        echo 'Продукт 2: ' . $name;
        return $this;
    }
}

class Product3 extends Product {
    public function setName($name)
    {
        $this->name = $name;
        echo 'Продукт 2: ' . $name;
        return $this;
    }
    public function setDiscount()
    {
        if ($this->weight > 10) {
            $this->discount = 10;
        } else {
            $this->discount = 0;
        }
    }
}