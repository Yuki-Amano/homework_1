<?php
if (isset($_COOKIE['login'])) {
    setcookie('login', '', time()-1);
}
if (isset($_COOKIE['password'])) {
    setcookie('password', '', time()-1);
}

 $userList = json_decode(file_get_contents('{login}.json'));

 if($_POST['submit']){
    session_start();
 $login = $_POST['login'];
 $password = $_POST['password'];

 if($password !== '') {
    foreach ($userList->users as $user) {
        if ($login === $user->login && $password === $user->password) {
                    setcookie('login', $user->login, time() + 60 * 60);
                    setcookie('password', $user->password, time() + 60 * 60);
                    $_SESSION['id'] = $user->login;
                    header('Location: list.php');
                    exit;
            }
        }
        echo 'Имя пользователя и пароль не совпадают. Попробуйте еще раз.';
    } else {
        $_SESSION['id'] = $login;
        header('Location: list.php');
        exit;
    }
}
?>






 

