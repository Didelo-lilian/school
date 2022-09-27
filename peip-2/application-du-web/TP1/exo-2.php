<?php

# retourne le nom du jour de la semaine
# correspondant à '$week', le  numéro du
# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
function jour($week)
{
	switch ($week) {
		case 0:
			return "dimanche";
			break;
		case 1:
			return "lundi";
			break;
		case 2:
			return "mardi";
			break;
		case 3:
			return "mercredi";
			break;
		case 4:
			return "jeudi";
			break;
		case 5:
			return "vendredi";
			break;
		case 6:
			return "samedi";
			break;
	}
}

# retourne le nom du mois correspondant à '$month',
# le  numéro du mois (1 -> janvier, 2 -> février, ...)
function mois($month)
{
	switch ($month) {
		case 1:
			return "janvier";
			break;
		case 2:
			return "fevrier";
			break;
		case 3:
			return "mars";
			break;
		case 4:
			return "avril";
			break;
		case 5:
			return "mai";
			break;
		case 6:
			return "juin";
			break;
		case 7:
			return "juillet";
			break;
		case 8:
			return "août";
			break;
		case 9:
			return "septembre";
			break;
		case 10:
			return "octobre";
			break;
		case 11:
			return "novembre";
			break;
		case 12:
			return "decembre";
			break;
	}
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TP 1 - Exo 2</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 2</h1>
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