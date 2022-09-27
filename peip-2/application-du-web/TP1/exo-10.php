<?php
# retourne le nom du jour de la semaine
# correspondant à '$week', le  numéro du
# jour de la semaine (0 -> dimanche, 1 -> lundi, ...)
function jour($week)
{
	$jour = ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"];
	return $jour[$week];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 1 - Exo 10 - a</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 10 - a</h1>
	<hr>
	<h2>
		<?php
		if (checkdate($_GET['mois'], $_GET['jour'], $_GET['annee'])) {
			if ($_GET['jour'] < 10) {
				$j = '0' . $_GET['jour'];
			} else {
				$j = $_GET['jour'];
			}
			if ($_GET['mois'] < 10) {
				$m = '0' . $_GET['mois'];
			} else {
				$m = $_GET['mois'];
			}

			$a = $_GET['annee'];
			$j_str = jour(date("w"));


			echo "Le " . $j . "/" . $m . "/" . $a . " est un " . $j_str;
		} else {
			echo 'La date saisit n\'existe pas';
		}

		?>
	</h2>
</body>

</html>