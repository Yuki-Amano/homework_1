<?php
$x = rand(0,100);
echo "Число $x";
$y = 1;
$z = 1;
while ($y != $x || $y <= $x){
	if ($y > $x) {
		echo "<br>Задуманное число НЕ входит в числовой ряд"; break;
	}
	else {
		if ($y == $x) {
			echo "<br>Задуманное число входит в числовой ряд"; break;
		}
	else {
			$w = $y;
			$y = $y + $z;
			$z = $w;
		}
	}
}
?>


