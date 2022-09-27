<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TP 1 - Exo 1</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 1</h1>
	<hr>
	<?php
	date_default_timezone_set('Europe/Paris');
	$hours = date('H');
	$minutes = date('i');
	$seconds = date('s');

	echo "<h2>Il est $hours heure(s), $minutes minute(s) et $seconds seconde(s) </h2>"
	?>

</body>

</html>