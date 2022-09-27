<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 3 - Exo 4</title>
		<meta name="author" content="Louis Hattiger">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="../css/tp3.css">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<h1>TP 3 - Exo 4</h1>
		<hr>
	
		<h2>Inscription</h2>

		<form action="dosignup.php" method="post">
			Choisissez votre login (uniquement des lettres minuscules ou majuscules)
			<br>
			<input type="text" name="login" required>
			<br><br>
			Choisissez votre mot de passe (minimum 4 caractères)
			<br>
			<input type="password" name="password1" required>
			<br>
			Répétez votre mot de passe
			<br>
			<input type="password" name="password2" required>
			<br><br>
			<input type="submit" value="S'inscrire">
			<input type="reset" value="Annuler">
		</form>
<?php
    // à compléter
    // Dans cette partie, si le paramètre "badsignup" est présent, on affiche
    // le message d'erreur adéquat, par exemple :
    // - si le paramètre vaut 1 : "le login ne contient pas que des lettres"
    // - si le paramètre vaut 2 : "le login est déjà utilisé"
    // - si la paramètre vaut 3 : "le mot de passe a moins de 4 caractères"
    // - si la paramètre vaut 4 : "le mot de passe et la vérification sont différents"
	$errors = array("le login ne contient pas que des lettres",
					"le login est déjà utilisé",
					"le mot de passe a moins de 4 caractères",
					"le mot de passe et la vérification sont différents");

	if (isset($_GET['badsignup'])){
		print($errors[$_GET['badsignup']-1]);
	}
	

?>
	</body>
</html>
