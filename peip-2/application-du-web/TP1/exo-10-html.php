<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 1 - Exo 10 - b</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<?php

	# retourne le code HTML (une chaîne de caractères)
	# correspondant à un élément SELECT dont l'attriobut
	# 'name' vaut '$name' et contenant '$max' éléments
	# OPTION
	function select($name, $max)
	{
		$res = "<select name=\"$name\">";
		for ($i = 1; $i <= $max; $i++) {
			$res .= "<option value=\"$i\">$i</option>";
		}
		$res .= "</select>";
		return $res;
	}
	?>
	<h1>TP 1 - Exo 10 -b </h1>
	<hr>
	<form action="exo10.php" method="get">
		Jour :
		<?php
		echo select('jour', 31);
		?>
		<br><br>
		Mois :
		<?php
		echo select('mois', 12);
		?>
		<br><br>
		Année : <input type="text" name="annee" required />
		<br><br>
		<input type="submit" value="Envoyer" />
	</form>
</body>

</html>