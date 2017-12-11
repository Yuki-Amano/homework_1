<?php
	
	$uploadDir = './tests';
	
	if (isset($_POST['upload'])) 
	{
	
	header('Content-Type: text/html; charset=UTF-8');

	
    // Определяем загружаемый файл
   	$type = pathinfo($_FILES['files']['name']);
	$name = $uploadDir .'/'. uniqid('files_') .'.'. $type['extension'];
	move_uploaded_file($_FILES['files']['tmp_name'],$name);

	echo "<p>Файл успешно загружен на сервер</p>";
	}

?>

