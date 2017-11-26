<!DOCTYPE html>
<html>
 <head>
   <title>Страница пользователя</title>
   <meta charset="utf-8">
 	<style>
 		dl {
 			display: table-row;
 		}
 		dt, dd {
 			display: table-cell;
 			padding: 5px 10px;
 		}
 	</style>
 </head>
<body>
	<?php>
$name = 'Ника';
$age = '28';
$mail = 'nikpnd@gmail.com';
$city = 'Чебоксары';
$about = 'преподавательствую в школе) учу мелких и больших';
	?>
	<h1>Страница пользователя <?php echo $name ?></h1>
	<dl>
            <dt>Имя</dt>
            <dd><?php echo $name ?></dd>
        </dl>
    <dl>
            <dt>Возраст</dt>
            <dd><?php echo $age ?></dd>
        </dl>
    <dl>
            <dt>Адрес электронной почты</dt>
            <dd><a href="nikpnd@gmail.com"><?php echo $mail ?></a></dd>
        </dl>
    <dl>
            <dt>Город</dt>
            <dd><?php echo $city ?></dd>
        </dl>
    <dl>
            <dt>О себе</dt>
            <dd><?php echo $about ?></dd>
        </dl>
    </body>
    </html>

