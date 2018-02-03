<?php

function isGET()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function getParam($paramName, $default = null)
{
    return !empty($_REQUEST[$paramName]) ? $_REQUEST[$paramName] : $default;
}

function getBooks($isbn = '', $name = '', $author = '')
{
    //$pdo = new PDO("mysql:host=localhost;dbname=global", "root", ""); // у меня на localhost так работает
    ////для university.netology
    define('DB_HOST', 'localhost');
    define('DB_USER', 'kondratieva');
    define('DB_PASS', 'neto1408');
    define('DB_NAME', 'global');
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PASS);
    //
    $sth = $pdo->prepare('SELECT * FROM books WHERE isbn LIKE :isbn AND name LIKE :name AND author LIKE :author');
    $sth->bindValue(':isbn', "%{$isbn}%");
    $sth->bindValue(':name', "%{$name}%");
    $sth->bindValue(':author', "%{$author}%");
    $sth->execute();
//$sth->execute(array('isbn' => $isbn,'name'=> $name,'author'=>$author));
    $res = $sth->fetchAll();
//var_dump($res);
    $sth->closeCursor();
    return $res;
}