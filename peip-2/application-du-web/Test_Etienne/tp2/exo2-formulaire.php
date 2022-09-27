<?php

	include("exo2.inc.php");

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
		
		<form action="exo2-action.php" method="get">
			Choisissez un pays :
<?php
			echo makeRadio($INFO,"codepays");
?>
			<input type="submit" value="Afficher les informations">
		</form>
	</body>
</html>
