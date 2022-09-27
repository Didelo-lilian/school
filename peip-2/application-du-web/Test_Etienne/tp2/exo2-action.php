<?php

	include("exo2.inc.php");
	$key = $_GET[ "codepays" ];

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 2 - Exo 2</title>
		<meta name="author" content="Etienne Barbieri">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="css/tp2.css">
	</head>
	<body>
		<h1>TP 2 - Exo 2</h1>
		<hr>
		
		<p>
			<h2>
<?php 
				echo getCountryName($key,$INFO);
?>
			</h2>
<?php
			echo getCountryImage($key,$INFO);
?>
		</p>
		<p>
			<h3>
				Capitale :
<?php
				echo getCapitalName($key,$INFO);
?>
			</h3>
<?php
			echo getCapitalImage($key,$INFO);
?>
		</p>
	</body>
</html>
