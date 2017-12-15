<?php
$data = file_get_contents('./data-user.json');
$userdata = json_decode($data, true);
?>	

	<html>
	<head>
		<title>Записная книжка</title>
	</head>
	<body>
		<table>
			<tr>
				<td>Имя</td>
				<td>Фамилия</td>
				<td>Адрес</td>
				<td>Телефон</td>
			</tr>
			<?php foreach ($userdata as $items) { ?>
			<tr>
				<td><?= $items['firstName']; ?></td>
				<td><?= $items['lastName']; ?></td>
				<td><?= $items['address']; ?></td>
				<td><?= $items['phoneNumber']; ?></td>
			</tr>
			<?php } ?>
		</table>
	</body>
	</html>
   
