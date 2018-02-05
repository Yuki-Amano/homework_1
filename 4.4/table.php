<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Список таблиц текущей базы</title>
    <style>
        table {
            margin-top: 20px;
            border-collapse: collapse;
        }
        td, th {
            border: 1px solid black;
            padding: 5px 10px;
            text-align: center;
        }
    </style>
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



if (isset($_GET)) {
    $table = htmlspecialchars($_GET['name']);

    //Добавить возможность удалить поле, изменить тип и название.
    $allowedActions = ['Изменить название', 'Изменить тип', 'Удалить поле'];
    if (isset($_POST['action'])) {
        if(array_search($_POST['action'], $allowedActions) !== false) {
            if ($_POST['action'] === 'Изменить название') {
                echo '<form method="post">
                        <input type="hidden" name="name" value="' . $_POST['field_name'] . '">
                        <input type="hidden" name="type" value="' . $_POST['field_type'] . '">
                        <input name="new_name" value="' . $_POST['field_name'] . '">
                        <input type="submit" name="change_name" value="Изменить название поля ' . $_POST['field_name'] . '">
                      </form>';
            } elseif ($_POST['action'] === 'Изменить тип') {
                echo '<form method="post">
                        <input type="hidden" name="name" value="' . $_POST['field_name'] .  '">
                        <input type="hidden" name="type" value="' . $_POST['field_type'] . '">
                        <input name="new_type" value="' . $_POST['field_type'] . '">
                        <input type="submit" name="change_type" value="Изменить тип поля ' . $_POST['field_name'] . '">
                      </form>';
            } elseif ($_POST['action'] === 'Удалить поле') {
                $del = "ALTER TABLE $table DROP COLUMN " . $_POST['field_name'];
                $pdo->exec($del);
            }
        }
    }
    if (isset($_POST['change_name'])) {
        $name = htmlspecialchars($_POST['name']);
        $new_name = htmlspecialchars($_POST['new_name']);
        $type = htmlspecialchars($_POST['type']);

        $change_name = "ALTER TABLE $table CHANGE $name $new_name $type";
        $pdo->exec($change_name);
    }
    if (isset($_POST['change_type'])) {
        $name = htmlspecialchars($_POST['name']);
        $type = htmlspecialchars($_POST['new_type']);

        $change_type = "ALTER TABLE $table CHANGE $name $name $type";
        $pdo->exec($change_type);
    }

    //и увидеть название и тип поля.
    $describe = $pdo->query("DESCRIBE $table");
    $table_fields = $describe->fetchAll();

    echo '<table><tr><th>Название поля</th><th>Тип</th><th>Действия</th></tr>';
    foreach ($table_fields as $field) {
        echo '<tr>
                <td>' . $field['Field'] . '</td>
                <td>' . $field['Type'] . '</td>
                <td>
                    <form method="post">
                        <input type="hidden" name="field_name" value="' . $field['Field'] . '">
                        <input type="hidden" name="field_type" value="' . $field['Type'] . '">
                        <select name="action">
                            <option>Изменить название</option>
                            <option>Изменить тип</option>
                            <option>Удалить поле</option>
                        </select>
                        <input type="submit" value="Применить">
                    </form>
                </td>
              </tr>';
    }
    echo '</table>';
}
?>
<br>
<a href="list.php">К списку таблиц</a>
</body>
</html>
