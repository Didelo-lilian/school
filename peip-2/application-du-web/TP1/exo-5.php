<?php

# retourne le code HTML (une chaîne de caractères)
# d'une table 10x10 contenant les 10 tables de
# multiplication
function table($N)
{
	$res = "<table class='exo6'>";
	for ($i = 1; $i <= $N; $i++) {
		$res .= "<tr>";
		for ($j = 1; $j <= $N; $j++) {
			if ($i == $j) {
				$result = $i * $j;
				$res .= "<td><span style=\"color: red;\"><strong>$i</strong> x $j égale $result</span></td>";
			} else {
				$result = $i * $j;
				$res .= "<td><strong>$i</strong> x $j égale $result</td>";
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
	<title>TP 1 - Exo 5</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 5</h1>
	<hr>
	<?php
	if (isset($_GET['number'])) {
		if (is_numeric($_GET['number'])) {
			$n = $_GET['number'];
			$res = table($n);
			echo "$res";
		}
	}

	?>
</body>

</html>