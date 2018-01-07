<a href="list.php">Test List</a>

<?php
  $files = glob('tests/*.json');
  $filename = $files[$_GET['index']];

  $jsonData = file_get_contents($filename);
  $questions = json_decode($jsonData, true);

  if (isset($filename)) : ?>
    <h3><?= str_replace(array('tests/', '.json'), '',$filename) ?></h3>
    <form method="POST">
      <?php foreach ($questions as $question_key => $question) : ?>
        <fieldset>
          <legend><?= $question['question'] ?></legend>
          <?php foreach ($question['answers'] as $key => $item) : ?>
            <input type="radio" name="<?= 'radio-'.$question_key ?>" value="<?= $item['right'] ?>" id="<?= $key ?>"/>
            <label for="<?= $key ?>"><?= $item['answer'] ?></label>
          <?php endforeach; ?>
        </fieldset>
      <?php endforeach; ?>
      <button type="submit" name="check">Check</button>
    </form>
  <?php endif;

  if (isset($_POST['check'])) {
    $score = array_sum($_POST);
    echo 'Score: '.$score;
  }