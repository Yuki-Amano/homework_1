<?php
define('MAIN', true);
//header("Content-Type: text/html; charset=utf-8");
include 'core.php';
//var_dump($_REQUEST);
//var_dump($_SESSION);
$userId = $_SESSION['id'];
$login = $_SESSION['login'];
if (isPost()) {
    if ((int)getParam("sort_by", 0) > 0) {
        $ord = (int)getParam("sort_by", 4);
    }
    if (isset($_REQUEST["btnSort"])) {
        // $ord =(int) getParam("sort_by", 1);
    } elseif (!is_null(getParam("save")) && !is_null((getParam("description")))) {
        taskIns(getParam("description"), $userId);
    } elseif ((int)getParam("isDone", -1) > 0) {
        statusClose((int)getParam("isDone"));
    } elseif ((int)getParam("delete", -1) > 0) {
        TaskDel((int)getParam("delete"));
    } elseif (((int)getParam("assign", -1) > 0) && ((int)getParam("assignedUser", 0) > 0)) {
        TaskAssign((int)getParam("assign"), (int)getParam("assignedUser", 0));
    } elseif (getParam("update", '') <> '') {
        $id = (int)getParam("update");
        $txt = getParam("descr")[$id];
        TaskUpd((int)$id, $txt);
    }
} else {
    $ord = 4;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Дом.задание 4.3</title>
</head>
<body>
<h2>TODO</h2>

<form method="POST">
    <div style="float: left; ">
        <fieldset style="border: 0">
            <label for="sort_by">Сортировать по:</label>
            <select name="sort_by">
                <option value="4" <?= setSelected(4, $ord) ?>>Дате добавления</option>
                <option value="3" <?= setSelected(3, $ord) ?>>Статусу</option>
                <option value="2" <?= setSelected(2, $ord) ?>>Описанию</option>
            </select><br/>
            <button type="submit" name="btnSort">Сортировать</button>
        </fieldset>
    </div>

    <div style="float: left; margin-left: 5px;">
        <label for="description">Добавить задачу:</label>
        <input type="text" name="description" placeholder="Описание задачи" value=""/><br/>
        <input type="submit" name="save" value="Сохранить"/><br/>
    </div>
    <div style="float: left; margin-left: 10px; ">
        <fieldset>
            <legend>Выбрать исполнителя</legend>
            <select name="assignedUser" title="Выбрать исполнителя">
                <option value=0>Не задано</option>
                <?php foreach (UserList() as $record) { ?>
                    <option value=<?= $record['id'] ?>><?= $record['login'] ?></option>
                <?php } ?>
            </select>
        </fieldset>
    </div>
    <div style="clear: both"></div>
    <b>Созданные <?= $login ?> задачи </b>
    <table border="1" cellpadding="5">
        <tr>
            <th>Статус</th>
            <th>Дата добавления</th>
            <th>Описание</th>
            <th>Исполнитель</th>
            <th></th>
        </tr>
        <?php foreach (getUserTasks($ord, $userId) as $record) { ?>
            <tr <?= getBgcolor($record['is_done']) ?>>
                <td>
                    <?= getTextStatus($record['is_done']) ?>
                </td>
                <td><?= $record['date_added'] ?></td>
                <td><input title="Описание" type="text" size="32" name="descr[<?= $record['id'] ?>]"
                           value='<?= $record['description'] ?>'/>
                    <button type="submit" name="update"
                            value="<?= $record['id'] ?>" <?= getDisablClose((int)$record['is_done']) ?>>Изменить
                    </button>
                </td>
                <td><?= $record['ass_user'] ?>
                    <button type="submit" name="assign"
                            value="<?= $record['id'] ?>" <?= getDisablClose((int)$record['is_done']) ?>>Назначить
                    </button>
                </td>
                <td>
                    <button type="submit" name="delete" value=<?= $record['id'] ?>>Удалить</button>
                </td>
            </tr>
        <?php } ?>
    </table>
    <b>Назначенные <?= $login ?> задачи </b>
    <table border="1" cellpadding="5">
        <tr>
            <th>Отметка выполнения</th>
            <th>Дата добавления</th>
            <th>Описание</th>
            <th>Автор</th>
        </tr>
        <?php foreach (getAssignedTasks($ord, $userId) as $record) { ?>
            <tr <?= getBgcolor($record['is_done']) ?>>
                <td>
                    <button type="submit" name="isDone"
                            value=<?= $record['id'] ?> <?= getDisablClose((int)$record['is_done']) ?>>закрыть
                    </button>
                    <?= getTextStatus($record['is_done']) ?>
                </td>
                <td><?= $record['date_added'] ?></td>
                <td><?= $record['description'] ?></td>
                <td><?= $record['auth'] ?></td>
            </tr>
        <?php } ?>
    </table>
</form>
<div>
    <a href="logout.php">Выход</a>
</div>
</body>
</html>