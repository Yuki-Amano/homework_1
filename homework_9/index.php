<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <style>
        form {
            width: 20%;
            border: 1px solid black;
            padding: 20px;
            margin: 20px auto;
        }
        label, input {
            display: block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h3>Авторизуйтесь или войдите как гость, введя только имя:</h3>
<form action="authorize.php" method="post">
    <label>Ваше имя <input name="login" required></label>
    <label>Пароль <input type="password" name="password"></label>
    <input type="submit" name="submit" value="Войти">
</form>
</body>
</html>