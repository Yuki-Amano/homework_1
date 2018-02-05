<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
</head>
<body>

<?php
error_reporting(E_ALL);

$servername = "localhost";
$dbname = "global";
$username = "kondratieva";
$password = "neto1408";

$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
if (!$pdo)
{
    die('Could not connect');
}


//Создать новую таблицу через php;
$table = 'contacts';
$columnsArr = ['id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY',
                'first_name VARCHAR(150) NOT NULL',
                'last_name VARCHAR(150) NOT NULL',
                'city VARCHAR(150) NOT NULL',
                'street_address VARCHAR(150) NOT NULL',
                'country VARCHAR(250) NOT NULL',
                'email VARCHAR(50) NOT NULL UNIQUE',
                'phone_number INT(25) NOT NULL'];
$columns = implode(', ', $columnsArr);

try {
    $sql = "CREATE TABLE IF NOT EXISTS $table ( " . $columns . ' )';
    $pdo->exec($sql);
    echo "Таблица $table создана успешно.<br>";
}
catch (Exception $e) {
    echo 'Что-то тут не так: ',  $e->getMessage();
}


?>
<a href="list.php">Список таблиц</a>
</body>
</html>