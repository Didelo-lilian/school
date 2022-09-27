<?php
$a = rand(1, 10);
$b = rand(1, 10);
function display_calcul($a, $b)
{
	echo "Combien font $a x $b ?";
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 1 - Exo 11</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 11</h1>
	<hr>
	<form action="exo-11-action.php" method="get">
		<?php
		display_calcul($a, $b);
		?>
		<br><br>
		Résultat : <input type="text" name="resultat" required />
		<br><br>
		<?php
		echo "<input name=\"a\" type=\"hidden\" value=\"$a\"><input name=\"b\" type=\"hidden\" value=\"$b\">";
		?>
		<input type="submit" value="Envoyer" />

	</form>

</body>

</html>