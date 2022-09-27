<?php
session_start();
// à compléter

# retourne une chaîne de caractères indiquant
# le résultat, où '$x' et '$y' sont les nombres
# dont il fallait deviner la valeur du produit
# et '$user' la valeur proposée par l'utilisateur
function resultat($x, $y, $user)
{
	$res = $x * $y;
	if ($user == $res) {
		return "Bravo, vous avez raison, " . $x . " x " . $y . " = " . $res . " !";
	} else {
		return "Faux, " . $x . " x " . $y . " = " . $res . " et non " . $user;
	}
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 3 - Exo 1</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="../css/tp3.css">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<h1>TP 3 - Exo 1</h1>
	<hr>

	<h2>Multiplication</h2>
	<p>
		<?php
		// à compléter
		echo resultat($_SESSION['first_number'], $_SESSION['second_number'], $_GET['utilisateur'])
		?>
	</p>
	<p>
		<a href="formulaire.php">Autre multiplication</a>
	</p>
</body>

</html>