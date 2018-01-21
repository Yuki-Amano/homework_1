<?php
  session_start();
  $id = $_SESSION['id'];

  $tests = glob('tests/*.json');

if ($_GET['action']=='delete' && $_GET['id']) {
  if (!empty($tests)) {
    unlink($tests[$_GET['id']]);
  }
}

if (empty($tests)) :
  echo 'Тест не найден <br>';
  endif;

if ((isset($_COOKIE['login']) && isset($_COOKIE['password']))):
  $id = 0;
  foreach ($tests as $test) : ?>
    <form action="test.php" method="GET">
        <label for="open"><?= str_replace(array('tests/', '.json'), '',$test) ?></label>
        <input type="hidden" name="index" value="<?= array_search($test, $tests) ?>"/>
        <button type="submit">Открыть</button>
        <a href="./list.php?action=delete$id=<?= $id ?>">Удалить тест</a>
        <? $id++; ?>
    </form>
    <?php endforeach;
echo '<a class="add" href="admin.php">Добавить тест</a>';  
  else :
    foreach ($tests as $test) : ?>
    <form action="test.php" method="GET">
        <label for="open"><?= str_replace(array('tests/', '.json'), '',$test) ?></label>
        <input type="hidden" name="index" value="<?= array_search($test, $tests) ?>"/>
        <button type="submit">Открыть</button>
      </form>
    <?php endforeach;
  endif;
?>

<?
