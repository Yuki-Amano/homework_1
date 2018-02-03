<?php

function isPOST()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGET()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function getParam($paramName, $default = null)
{
    return !empty($_REQUEST[$paramName]) ? $_REQUEST[$paramName] : $default;
}

//2_4
function logout()
{
    return session_destroy();

}

function setErrors($msg)
{
    $_SESSION['error'][] = $msg;
}

function getErrors()
{
    return isset($_SESSION['error']) ? $_SESSION['error'] : [];
}

function clearErrors()
{
    unset($_SESSION['error']);
}

//
function getPDO()
{
    $opt = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    );

//    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PASS);
//4.2
    $pdo = new PDO("mysql:host=localhost;dbname=kondratieva;charset=UTF8", "kondratieva", "neto1408");
    return $pdo;

}

function getUserTasks($sort = 1, $userId)
{
    $pdo = getPDO();
    $qw = 'SELECT t.id,description,is_done,date_added,u.login AS ass_user
          FROM task  t
          LEFT JOIN user  u ON u.id = t.assigned_user_id
          WHERE t.user_id =:user_id
          ORDER BY :sort';

    $sth = $pdo->prepare($qw);
    $sth->bindValue(':sort', $sort, PDO::PARAM_INT);
    $sth->bindValue(':user_id', (int)$userId, PDO::PARAM_INT);
    $sth->execute();

    $res = $sth->fetchAll();
    $sth->closeCursor();
    return $res;
}

function getAssignedTasks($sort = 1, $userId)
{
    $pdo = getPDO();
    $qw = 'SELECT t.id,description,is_done,date_added,u.login AS auth
           FROM task  t ,user  u
           WHERE
           t.assigned_user_id =:user_id AND
           t.assigned_user_id=u.id
           ORDER BY :sort';

    $sth = $pdo->prepare($qw);
    $sth->bindValue(':sort', $sort, PDO::PARAM_INT);
    $sth->bindValue(':user_id', (int)$userId, PDO::PARAM_INT);
    $sth->execute();

    $res = $sth->fetchAll();
    $sth->closeCursor();
    return $res;
}

function taskIns($txt, $userId)
{
    if (empty($txt)) {
        return false;
    }
    $qw = 'INSERT INTO task (description,is_done,date_added,user_id) VALUES (:txt,0,SYSDATE(),:user_id)';
    $pdo = getPDO();
    $sth = $pdo->prepare($qw);
    $sth->bindValue(':txt', $txt);
    $sth->bindValue(':user_id', (int)$userId, PDO::PARAM_INT);
    return $sth->execute();
}

function statusClose($id)
{
    $qw = 'UPDATE task SET is_done = 1 WHERE id=:id';
    $pdo = getPDO();
    $sth = $pdo->prepare($qw);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    return $sth->execute();
}

function TaskUpd($id, $txt)
{
    $qw = 'UPDATE task SET description = :txt WHERE id=:id';
    $pdo = getPDO();
    $sth = $pdo->prepare($qw);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->bindValue(':txt', $txt);
    return $sth->execute();
}

function TaskDel($id)
{
    $qw = 'DELETE FROM task WHERE id=:id';
    $pdo = getPDO();
    $sth = $pdo->prepare($qw);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    return $sth->execute();
}

function getTextStatus($st)
{
    return ((int)$st == 0) ? 'в работе' : 'закрыто';
}

function getBgcolor($st)
{
    return ((int)$st == 0) ? '' : 'bgcolor="#d3d3d3"';
}

function getDisablClose($st)
{
    return ((int)$st == 0) ? '' : 'disabled';
}

function setSelected($st, $ord)
{
    return ((int)$st == (int)$ord) ? 'selected' : ' ';
}

//4.3
function userExists($login, $password = null)
{
    $id = -1;
    $qw = 'SELECT id FROM user WHERE login=:login AND ((password =:password) OR (:password IS NULL))';
    $pdo = getPDO();
    $sth = $pdo->prepare($qw);
    $sth->bindValue(':login', $login, PDO::PARAM_STR);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);
    $sth->execute();
    $res = $sth->fetchAll();
    if (count($res) == 1) {
        $id = $res[0]['id'];
    }
    $sth->closeCursor();

    return $id;
}

function userIns($login, $password)
{
    $id = -1;
    $pdo = getPDO();
    $sth = $pdo->prepare('INSERT INTO user (login ,password) VALUES (:login ,:password)');
    $sth->bindValue(':login', $login, PDO::PARAM_STR);
    $sth->bindValue(':password', $password, PDO::PARAM_STR);

    //$sth->execute();
    if ($sth->execute()) {
        $id = $pdo->lastInsertId();
    }
    return $id;
}

function userList()
{
    $qw = 'SELECT id,login FROM user ORDER BY login';
    $pdo = getPDO();
    $sth = $pdo->prepare($qw);
    $sth->execute();
    $res = $sth->fetchAll();
    $sth->closeCursor();
//    var_dump($res);
    return $res;
}

function TaskAssign($id, $userId)
{
    $qw = 'UPDATE task SET assigned_user_id = :user_id WHERE id=:id';
    $pdo = getPDO();
    $sth = $pdo->prepare($qw);
    $sth->bindValue(':id', $id, PDO::PARAM_INT);
    $sth->bindValue(':user_id', $userId, PDO::PARAM_INT);

    return $sth->execute();
}

function userRegistration($login, $password)
{
    $id = userExists($login);
    if ((int)$id > 0) {
        setErrors('Пользователь ' . $login . '  уже существует');
        return false;
    }
    $id = userIns($login, $password);
    if ((int)$id < 1) {
        setErrors('Ошибка при регистрации пользователя ' . $login);
        return false;
    }
    return true;
}

function login($login, $password)
{
    $id = userExists($login, $password);
    if ((int)$id < 1) {
        setErrors('Пользователь ' . $login . ' с таким паролем не существует');
        return false;
    } else {
        $_SESSION['id'] = $id;
        $_SESSION['login'] = $login;
        return true;
    }
}


