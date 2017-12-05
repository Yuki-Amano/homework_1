<?php

$url = "http://api.openweathermap.org/data/2.5/weather?id=569696&lang=en&units=metric&APPID=2e77775921c19b99e404f4084be3a1c3";


$contents = file_get_contents($url);
$clima=json_decode($contents);

$temp=$clima->main->temp;
$humidity=$clima->main->humidity;
$speed=$clima->wind->speed;
$icon=$clima->weather[0]->icon.".png";
$today = date("F j, Y, g:i a");
 

echo "Сегодня в солнечной Чувашии (Чебоксары)" . " - " .$today . "<br>";
echo "Температура воздуха: " . $temp ."&deg;C<br>";
echo "Влажность воздуха: " . $humidity ."%<br>";
echo "Скорость ветра: " . $speed ." м/с<br>";
echo "<img src='http://openweathermap.org/img/w/" . $icon ."'/ >";
?>