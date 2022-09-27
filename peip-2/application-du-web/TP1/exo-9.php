<?php

# retourne la chaîne '$s' normalisée
# (toutes les lettres en minuscule sauf la première)
function normalize($s)
{
	return ucfirst(strtolower($s));
}

# Teste si les prénom et nom sont bien renseignés et
# retourne le tableau des messages d'erreurs
# (tableau vide s'il n'y a pas d'erreur)
function check_input()
{
	$res = array();
	if (!isset($_GET['nom'])) {
		array_push($res, "Le nom n'est pas rempli \r\n");
	}
	if (!isset($_GET['prenom'])) {
		array_push($res, "Le prénom n'est pas rempli \r\n");
	}
	return $res;
}

# retourne le code HTML (une chaîne de caractères) 
# d'une liste "<ul><li>..</li>..</ul>", les
# éléments de liste contenant les erreurs
# contenues dans le tableau '$errors' 
function display_errors($errors)
{
	if (isset($errors)) {
		echo '<p> Les erreurs sont :</p><ul>';
		for ($i = 0; $i < count($errors); $i++) {
			echo "<li>" . $errors[$i] . "</li>";
		}
		echo '</ul>';
	}
}

# retourne le code HTML (une chaîne de caractères) 
# d'un heading "<h2>...</h2>" contenant le message
# de bienvenu en anglais
function display_welcome($h, $c, $p, $n)
{
	$res = "<h2>";
	if ($h < 12) {
		$res .= "Good Morning ";
	} else if ($h < 18) {
		$res .= "Good Afternoon ";
	} else {
		$res .= "Good evening ";
	}
	$res .= htmlspecialchars($_GET['civilite']) . " " . normalize(htmlspecialchars($_GET['nom'])) . " " . normalize(htmlspecialchars($_GET['prenom'])) . " ,welcome to Polytech!!";

	echo $res;
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>TP 1 - Exo 9</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 9</h1>
	<hr>
	<?php
	date_default_timezone_set('Europe/Paris');
	if (check_input() != array()) {
		display_errors(check_input());
	} else {
		$h = date('H');
		$c = $_GET['civilite'];
		$p = $_GET['prenom'];
		$n = $_GET['nom'];
		display_welcome($h, $c, $p, $n);
	}
	?>
</body>

</html>