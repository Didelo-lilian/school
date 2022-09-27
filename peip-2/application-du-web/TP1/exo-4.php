<?php

# si '$N' est premier, retourne '$N'
# sinon retourne le plus petit diviseur
# de '$N'. Par exemple :
# - premier(13) -> 13
# - premier(35) -> 5
function premier($N)
{
	$res = 1;
	for ($i = 1; $i < $N; $i++) {
		if ($N % $i == 0) {
			$res = $i;
		}
	}
	return $res;
}

# retourne une chaîne de caractères du type :
# - "Le nombre N est premier" si '$N' est premier
# - "Le nombre N n'est pas premier car multiple de D"
#   si '$N' est divisible par un nombre D (et donc, pas premier)
function resultat($N)
{
	$last_diviseur = premier($N);
	if ($last_diviseur == 1) {
		return "Le nombre $N est premier !";
	} else {
		return "Le nombre $N n'est pas premier il est divisible par $last_diviseur !";
	}
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TP 1 - Exo 4</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 4</h1>
	<hr>
	<?php
	$n = $_GET['nombre'];
	if ($n == 0) {
		//il n'y a pas de nombre;
	} else {
		$res = resultat($n);
		echo "<h2> $res </h2>";
	}

	?>
	<a class="bouton" href="exo4.html">Autre test</a>
</body>

</html>