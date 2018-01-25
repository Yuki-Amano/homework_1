<?php
spl_autoload_register(function ($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR , $class);
    $path = 'classes' . DIRECTORY_SEPARATOR . $class . '.class.php';
    include $path;
});

$tv = new homeApp\TV('TV1', 50000, '50', true);
$pen = new stationery\Pen('pen1', 50);
$cart1 = new buy\Cart;
$cart1->addToCart($tv);
$cart1->addToCart($tv);
$cart1->addToCart($pen);
$order = new buy\Order($cart1);
$order->printPrice();
$order->printList();
$order->printAll();