<a href="list.php">Список тестов</a>
<a href="admin.php">Загрузить тест</a>


<?php
  $files = glob('tests/*.json');
  $filename = $files[$_GET['index']];
  $myName = $_POST['myName'];

  $jsonData = file_get_contents($filename);
  $questions = json_decode($jsonData, true);

  if (!file_exists($filename)) {
    header('HTTP/1.1 404 Not Found');
    exit;
}

  if (isset($filename)) : ?>
    <h3><?= str_replace(array('tests/', '.json'), '',$filename) ?></h3>
    <form method="POST" action='diplom1.php'>
      <input placeholder="Ваше имя" name="myName">
      <?php foreach ($questions as $question_key => $question) : ?>
        <fieldset>
          <legend><?= $question['question'] ?></legend>
          <?php foreach ($question['answers'] as $key => $item) : ?>
            <input type="radio" name="<?= 'radio-'.$question_key ?>" value="<?= $item['right'] ?>" id="<?= $key ?>"/>
            <label for="<?= $key ?>"><?= $item['answer'] ?></label>
          <?php endforeach; ?>
        </fieldset>
      <?php endforeach; ?>
      <button type="submit" name="check">Проверяем!</button>
    </form>
  <?php endif;


?>

