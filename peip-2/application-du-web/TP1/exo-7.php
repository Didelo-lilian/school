<?php

# retourne le nom du jour de la semaine
# correspondant à '$week', le  numéro du
# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
function jour($week)
{
	$jour = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
	return $jour[$week];
}

# retourne le nom du mois correspondant à '$month',
# le  numéro du mois (1 -> janvier, 2 -> février, ...)
function mois($month)
{
	$mois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
	return $mois[intval($month)];
}

$day = date("j");
$jour = jour(date("w"));
$mois = mois(date("n"));
$year = date("Y");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 1 - Exo 7</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 7</h1>
	<hr>
	<?php
	date_default_timezone_set('Europe/Paris');
	$jour = date('d');
	$strjour = jour(date('w'));
	$strmois = mois(date('m'));
	$annee = date('Y');

	echo "<h2>Nous sommes le $strjour $jour $strmois $annee  </h2>";
	?>
</body>

</html>