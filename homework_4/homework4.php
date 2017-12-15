<?php

$cache_file = 'cache.txt';
$cache_time = 3600; 

$city_id = 569696;

$url = "http://api.openweathermap.org/data/2.5/weather?id=$city_id&lang=en&units=metric&APPID=2e77775921c19b99e404f4084be3a1c3";

if (file_exists($cache_file) &&(time() - $cache_time) < filemtime($cache_file)) {
    $contents = file_get_contents($cache_file);
    $clima=json_decode($contents);
}

else {
$contents = file_get_contents($url);
$clima=json_decode($contents, true);
file_put_contents($cache_file, $contents);
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Прогноз погоды</title>
</head>

<body>
	<h1>Сегодня в солнечной Чувашии (Чебоксары) <?php echo date('d.m.o G:i') ?></h1>

	<table>
		<tr>
		    <td>Температура воздуха</td>
		    <td><?= $clima['main']['temp'] ?>°C</td>
		</tr>        
                <tr>
                    <td>Влажность</td>
                    <td><?= $clima['main']['humidity'] ?> %</td>
                </tr>
                <tr>
                    <td>Восход</td>
                    <td><?= date('G:i',$clima['sys']['sunrise']) ?> </td>
                </tr>
                <tr>
                    <td>Закат</td>
                    <td><?= date('G:i',$clima['sys']['sunset']) ?> </td>
                </tr>
    </table>
	
<img src="http://openweathermap.org/img/w/<?= $clima['weather']['0']['icon'] ?>.png">

</body>
</html>
