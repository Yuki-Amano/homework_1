<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ДЗ: Yandex Geo</title>
</head>
<body>
<form method="post">
    <input name="address" placeholder="Адрес">
    <input type="submit" value="Найти">
</form>
</body>
</html>

<?php
error_reporting(E_ALL);
include 'vendor/autoload.php';
$api = new \Yandex\Geo\Api();
if ($_POST) {
    $query = $_POST['address'];
    $api->setQuery($query);
    $api->load();
    $response = $api->getResponse();
    $points = [];
    // Список найденных точек
    $collection = $response->getList();
    foreach ($collection as $item) {
        $address = [];
        $address['address'] = $item->getAddress(); // вернет адрес
        $address['lat'] = $item->getLatitude(); // широта
        $address['long'] = $item->getLongitude(); // долгота
        $points[] = $address;
    }
    foreach ($points as $point) {
        echo '<a href="map.html?lat=' . $point['lat'] . '&long=' . $point['long'] . '">' . $point['address'] . '</a><br>';
    }
}
?>