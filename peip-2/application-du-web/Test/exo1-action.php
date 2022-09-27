<?php

	include("exo1.inc.php");
	
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 2 - Exo 1</title>
		<meta name="author" content="Marc Gaetano">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp2.css">
	</head>
	<body>
		<h1>TP 2 - Exo 1</h1>
		<hr>

		<h2>
<?php
	echo makeDate($_GET[ "langue" ],$JOUR,$MOIS);
?>
		</h2>
	</body>
</html>
