<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 3 - Exo 2</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="../css/tp3.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<h1>TP 3 - Exo 2</h1>
	<hr>

	<h2>Authentification</h2>

	<form action="dosignin.php" method="post">
		Votre login
		<br>
		<input type="text" name="login" required>
		<br><br>
		Votre mot de passe
		<br>
		<input type="password" name="password" required>
		<br><br>
		<input type="submit" value="Se connecter">
		<input type="reset" value="Annuler">
	</form>
</body>

</html>