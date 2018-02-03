<?php
define('MAIN', true);
//header("Content-Type: text/html; charset=utf-8");
include 'core.php';
if (isPOST()) {
    $login = getParam('login');
    $psw = md5(getParam('password'));
    if (isset($_REQUEST["btnReg"])) {
        //регистрация
        userRegistration($login, $psw);
    } elseif (isset($_REQUEST["btnEnt"])) {
        //авторизация
        if (login($login, $psw)) {
            header('Location:tasks.php');
            die();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
<ul>
    <?php foreach (getErrors() as $error) { ?>
        <li style="color:red"><?= $error ?></li>
    <?php }
    clearErrors(); ?>
</ul>
<form method="POST">

    <h4>Авторизуйтесь или введите данные для регистрации </h4>
    <p>

        <label for="login">Логин </label>
        <input required id="login" name="login"/>
    </p>
    <p>
        <label for="password">Пароль </label>
        <input required type="password" id="password" name="password"/>
        <button type="submit" name="btnEnt">Вход</button>
        <button type="submit" name="btnReg">Регистрация</button>
    </p>

</form>
</body>
</html>

