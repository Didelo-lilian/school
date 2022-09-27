<?php

include("exo5.inc.php");

// à compléter


?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 2 - Exo 5</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/tp2.css">
</head>

<body>
	<h1>TP 2 - Exo 5</h1>
	<hr>

	<table>
		<tr>
			<th>ID</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Trimestre 1</th>
			<th>Trimestre 2</th>
			<th>Trimestre 3</th>
			<th>Moyenne</th>
		</tr>
		<?php
		table_content($_GET['nom'], $STUDENT_FILE, $SCORE_FILE);
		?>
	</table>

	<a class="bouton" href="exo5-formulaire.html">Nouvelle recherche</a>
</body>

</html>