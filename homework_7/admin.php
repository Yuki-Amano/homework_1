<h3>JSON format:</h3>
<pre>
  [
    {
      "question": "...",
      "answers": [
        {
          "answer": "...",
          "right": true/false
        },
        ...
      ]
    },
    ...
  ]
</pre>

<form method="POST" enctype="multipart/form-data">
  <label for="fileInput">Select File:</label>
  <input id="fileInput" type="file" name="dataFile"/>
  <input type="submit" name="upload" value="Upload"/>
</form>

<?php
  if (isset($_POST['upload'])) {
    $path = pathinfo('tests/'.$_FILES['dataFile']['name']);

    if (is_file($path['dirname'].'/'.$path['basename'])) {
      echo 'File Exist';
    } elseif ($path['extension'] === 'json') {
      if (move_uploaded_file($_FILES['dataFile']['tmp_name'], $path['dirname'].'/'.$path['basename'])) {
        echo 'File saved!';
        header("Location: list.php");

      } else {
        echo 'Error!';
      }
    } else {
      echo 'Need JSON file';
    }
  }
?>
