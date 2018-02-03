<?php
header("Content-Type: text/html; charset=utf-8");
include 'functions.php';
if (isGET()) {
    $isbn = getParam('isbn', '');
    $name = getParam('name', '');
    $author = getParam('author', '');
} else {
    $isbn = '';
    $name = '';
    $author = '';
}
//echo '$isbn:'.$isbn."<br />";
//echo '$name:'.$name."<br />";
//echo '$author:'.$author."<br />";
//var_dump(getBooks($isbn ,$name ,$author ));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Дом.задание 4.1</title>
</head>
<body>
<h1>Библиотека успешного человека</h1>

<form method="GET">
    <input type="text" name="isbn" placeholder="ISBN" value='<?= $isbn ?>'/>
    <input type="text" name="name" placeholder="Название книги" value='<?= $name ?>'/>
    <input type="text" name="author" placeholder="Автор книги" value='<?= $author ?>'/>
    <input type="submit" value="Поиск"/>
</form>

<table border="1" cellpadding="5">
    <tr>
        <th>Название</th>
        <th>Автор</th>
        <th>Год выпуска</th>
        <th>Жанр</th>
        <th>ISBN</th>
    </tr>

    <?php foreach (getBooks($isbn, $name, $author) as $record) { ?>
        <tr>
            <td><?= $record['name'] ?></td>
            <td><?= $record['author'] ?></td>
            <td><?= $record['year'] ?></td>
            <td><?= $record['genre'] ?></td>
            <td><?= $record['isbn'] ?></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>