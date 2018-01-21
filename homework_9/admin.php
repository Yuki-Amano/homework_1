<?php
  session_start();
  if(!isset($_COOKIE['login']) || !isset($_COOKIE['password'])) {
    header('HTTP/1.1 403 Forbidden');
    exit;
}
  
  
  if (isset($_POST['upload'])) {
    $path = pathinfo('tests/'.$_FILES['dataFile']['name']);

    if (is_file($path['dirname'].'/'.$path['basename'])) {
      echo 'Такой файл уже есть!';
    } elseif ($path['extension'] === 'json') {
      if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $path['dirname'].'/'.$path['basename'])) {
        echo 'Файл загружен!';
        header("Location: list.php");

      } else {
        echo 'Ошибка! Попробуйте еще раз!';
      }
    } else {
      echo 'Ваш файл должен быть в формате JSON';
    }
  }
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Пройди тест!</title>
    <style>
        form {
            text-align: left;
            width: 30%;
            margin: 10% auto;
        }
        input {
            display: block;
            margin-bottom: 10px;
        }
        a {
            margin-left: 35%;
        }
    </style>
</head>
<body>
<h3>Все тесты в JSON-формате:</h3>
<pre>
  [
    {
      "question": "...",
      "answers": [
        {
          "answer": "...",
          "right": true/false
        },
        ...
      ]
    },
    ...
  ]
</pre>

<form method="POST" enctype="multipart/form-data">
  <label for="fileInput">Выберите файл:</label>
  <input id="fileInput" type="file" name="dataFile"/>
  <input type="submit" name="upload" value="Загрузить тест"/>
</form>
<a href="list.php">Доступные тесты</a>
</body>
</html>


