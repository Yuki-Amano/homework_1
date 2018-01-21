<?php
class Car {
    private $color = 'white';
    public function repaint($newColor) {
        $this->color = $newColor;
    }
    public function getColor() {
        return $this->color;
    }
    public function setWheelCount($number) {
        $this->wheelCount = $number;
    }
}

$car1 = new Car;
$car1->repaint('green');
$car2 = new Car;
$car2->setWheelCount(3);

class TV {
    private $size;
    private $isSmart;
    private $price;
    public function setPrice($newPrice) {
        $this->price = $newPrice;
    }
    public function __construct($size, $isSmart, $price) {
        $this->size = $size;
        $this->isSmart = $isSmart;
        $this->price = $price;
    }
}

$tv1 = new TV(40, true, 10);
$tv1->setPrice(5);
$tv2 = new TV(50, false, 7);
$tv2->setPrice(5);

class Pen {
    private $color = 'blue';
    private $capacity = 10;
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
$pen1->repaint('red');
$pen2 = new Pen;
$pen2->write();

class Duck {
    private $gender;
    private $weight;
    private $wings = 2;
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

$duck1 = new Duck('male', 2);
$duck1->shoot();
$duck2 = new Duck('female', 2);
$duck2->shootWing();

class Stuff {
    private $name;
    private $price;
    private $discount = 0;
    public function declareSale($discount) {
        $this->discount = $discount;
        $newPrice = $this->price - ($this->price * $this->discount / 100);
        return $newPrice;
    }
    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }
}

$stuff1 = new Stuff('Спиннер', 10);
$stuff1->declareSale(10);
$stuff2 = new Stuff('Йо-йо', 15);




$newsArray = [
    ['headline', 'text'],
    ['headline', 'text'],
    ['headline', 'text'],
    ['headline', 'text']
];

class News {
    private $headline;
    private $text;
    public function __construct($array, $id)
    {
        $this->headline = $array[$id][0];
        $this->text = $array[$id][1];
    }
    public function printNews() {
        echo '<h2>' . $this->headline . '</h2>';
        echo '<p>' . $this->text . '</p>';
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>News</title>
</head>
<body>
<?php
    foreach ($newsArray as $id=>$newsItem) {
        $item = new News($newsArray, $id);
        $item->printNews();
    }
?>
</body>
</html>