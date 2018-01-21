<?
  session_start();
  $id = $_SESSION['id'];





  $files = glob('tests/*.json');
  $filename = $files[$_GET['index']];
  /*$myName = $_POST['myName'];*/

  $jsonData = file_get_contents($filename);
  $questions = json_decode($jsonData, true);

  

  if (isset($filename)) : ?>
    <h3><?= str_replace(array('tests/', '.json'), '',$filename) ?></h3>
    <form method="POST" action='diplom.php'>
      <?php foreach ($questions as $question_key => $question) : ?>
        <fieldset>
          <legend><?= $question['question'] ?></legend>
          <?php foreach ($question['answers'] as $key => $item) : ?>
            <input type="radio" name="<?= 'radio-'.$question_key ?>" value="<?= $item['right'] ?>" id="<?= $key ?>"/>
            <label for="<?= $key ?>"><?= $item['answer'] ?></label>
          <?php endforeach; ?>
        </fieldset>
      <?php endforeach; ?>
      <button type="submit" name="check">Отправить на проверку!</button>
    </form>
  <?php endif;


?>
