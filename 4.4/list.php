<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список таблиц текущей базы</title>
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

//В каждую таблицу можно зайти
$tableList = $pdo->query("SHOW TABLES")->fetchAll();
foreach ($tableList as $table) {
    echo '<a href="table.php?name=' . $table[0] . '">' . $table[0] . '</a><br>';
}



?>
</body>
</html>
