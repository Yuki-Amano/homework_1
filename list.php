<?php
  $tests = glob('tests/*.json');

  if (!empty($tests)) :
    foreach ($tests as $test) : ?>
      <form action="test.php" method="GET">
        <label for="open"><?= str_replace(array('tests/', '.json'), '',$test) ?></label>
        <input type="hidden" name="index" value="<?= array_search($test, $tests) ?>"/>
        <button type="submit">Open</button>
      </form>
    <?php endforeach;
  else :
    echo 'No tests found';
  endif;
?>
<a href="admin.php">Add test</a>
