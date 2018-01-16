<?php
if (isset($_POST['check'])) {
$score = array_sum($_POST);
$text= 'Поздравляем, ' . $_POST["myName"].'! Вы заработали '.$score.' баллов!';

$img = imagecreatefromjpeg('CertificateBackgrounds3.jpg');
$x=55;
$y=100;
$TextColor  = ImageColorAllocate($img, 255, 105, 180); 
$font = 'src/roboto.ttf';
imagettftext ($img, 15, 0, $x, $y, $TextColor, $font, $text);
imagePng($img, "1.png");
header( 'Content-type: image/png' );
imagepng($img);
imagedestroy($img);
}
?>