<?php
include("index_action_inc.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 2 - Exo 5</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="index.css">
</head>

<body>
	<h1>TP 2 - Exo 5</h1>
	<hr>
	<?php
	$USERS_FILE = 'users.csv';
	$EXCEL_FILE = 'excel.csv';
	$CHOICES_FILE = 'choices.csv';

	tables_content(strtolower($_GET['nom']), $USERS_FILE, $EXCEL_FILE, $CHOICES_FILE);
	?>
	</table>

	<a class="bouton" href="index.php">Nouvelle recherche</a>
</body>

</html>