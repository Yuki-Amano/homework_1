<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Телефонная книга</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sx-12"><small>Задание 2.1</small>
        <h1 class="text-center text-capitalize">Телефонная книга</h1>        
    <table class="table table-striped">
      <?php
function getuserdata()
{
    $data = file_get_contents('./data-user.json', true);
    $userdata = json_decode($data, true);
    return $userdata ;
}
?>
    <thead>
        <tr>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Адрес</th>
            <th>Телефон</th>
        </tr>
    </thead>
    <tbody>
    <?php  foreach ( getuserdata() as $item ) {   ?>
        <tr>
            <td><?= $item['firstName'] ?></td>
            <td><?= $item['lastName'] ?></td>
              <td><?= $item['address'] ?></td>
            <td><?= $item['phoneNumber'] ?></td>
        </tr>
<?php
continue;
return;  }	
?>
    </tbody>
    </table>
  </div>
  </div>
  </div>
</body>
</html>