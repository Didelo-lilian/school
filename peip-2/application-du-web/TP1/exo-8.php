<?php

# retourne un tableau à deux éléments [ C , N ] où :
# - C est une chaîne de caractères de la forme
#   "n1, n2, n3, n4, n5" où n1, n2,..., n5
#   sont cinq nombres triés croissant tirés au hasard
#   dans l'intervalle [1, 49]
# - N un nombre tiré au hasard dans l'intervalle [1, 10]
function loto()
{
	$C_array = array();
	for ($i = 1; $i <= 5; $i++) {
		$new_number = rand(1, 49);
		while (in_array($new_number, $C_array)) {
			$new_number = rand(1, 49);
		}
		array_push($C_array, $new_number);
	}
	sort($C_array);
	$C = implode(",", $C_array);
	$N = rand(1, 10);
	array($C, $N);
	return array($C, $N);
}



?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 1 - Exo 8</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 8</h1>
	<hr>
	<h2>Loto Flash</h2>

	<p>
		<?php
		$res = loto();
		echo "Les cinq numéros : $res[0] - Le numéro chance : $res[1]";
		?>
	</p>
	<p>
		<a class="bouton" href="exo8.php">Un autre Loto Flash</a>
	</p>
</body>

</html>