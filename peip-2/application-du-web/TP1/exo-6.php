<?php

# retourne le code HTML (une chaîne de caractères)
# d'une table '$n'x'$n' représentant un échiquier
# alternant cases blanches et noires
function table($N)
{
	$res = "<h2>Echiquier $N x $N </h2></br><table class='exo7'>";
	for ($i = 1; $i <= $N; $i++) {
		$res .= "<tr>";
		for ($j = 1; $j <= $N; $j++) {
			$parité = $i % 2;
			if ($j % 2 == $parité) {
				$res .= '<td class="noir"></td>';
			} else {
				$res .= '<td class="blanc"></td>';
			}
		}
		$res .= "</tr>";
	}
	$res .= "</table>";
	return $res;
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TP 1 - Exo 6</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 6</h1>
	<hr>
	<?php
	if (isset($_GET['number'])) {
		if (is_numeric($_GET['number'])) {
			$n = $_GET['number'];
			$res = table($n);
			echo "$res";
		}
	} else {
		$res = table(8);
		echo "$res";
	}
	?>


</body>

</html>