<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<title>TP 1 - Exo 12</title>
	<meta name="author" content="SOLER Lilian">
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link rel="stylesheet" href="css/tp1.css">
</head>

<body>
	<h1>TP 1 - Exo 12</h1>
	<hr>
	<?php

	/*function check_result($user,$computor){
			if($user == $computor){
				return '1';
			} else if ($user < $computor){
				return '0';
			} else {
				return '2';
			}
		} */

	function display_form($computor, $try)
	{
		echo "<form action=\"exo12.php\" method=\"post\">
		<br><br>
		Votre proposition : <input type=\"text\" name=\"user\" required />
		<br><br>
		<input name=\"computor\" type=\"hidden\" value=\"$computor\"><input name=\"try\" type=\"hidden\" value=\"$try\">		
		<input type=\"submit\" value=\"Envoyer\" />
		</form>";
	}

	if (!isset($_POST['computor'])) {
		$computor = rand(1, 100);
		$try = 1;
		echo "<h2>Je pense à un nombre compris entre 1 et 100... à vous de le deviner !</h2>";
		display_form($computor, $try);
	}


	if (isset($_POST['user'])) {
		echo '<h2>Vous proposez ' . $_POST['user'] . ' : </h2>';
		$try = $_POST['try'] + 1;
		$user = $_POST['user'];
		$computor = $_POST['computor'];

		if ($user == $computor) {
			$res = "1";
		} else if ($user < $computor) {
			$res = "0";
		} else {
			$res = "2";
		}

		if ($res == '1') {
			echo '<h3>Bravo, vous avez trouvé en ' . $_POST['try'] . ' essai(s) !';
			unset($computor, $try, $user, $res, $_POST['user'], $_POST['try'], $_POST['computor']);
			echo '<p><a class="bouton" href="exo12.php">Rejouer</a></p>';
		} else if ($res == '0') {
			echo 'Trop petit, essayez encore...';
			display_form($computor, $try);
		} else {
			echo 'Trop grand, essayez encore...';
			display_form($computor, $try);
		}
	}


	?>
</body>

</html>