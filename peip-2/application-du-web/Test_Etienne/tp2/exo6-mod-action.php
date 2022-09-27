<?php
	include("exo6.inc.php");
	
	$students_fr = student_array($STUDENT_FILE);
	$scores_fr = score_array($SCORE_FILE);
	update_student_array($students_fr, $_GET['id'], strtolower($_GET['nom']), strtolower($_GET['prenom']));
	update_score_array($scores_fr, $_GET['id'], $_GET['score1'], $_GET['score2'], $_GET['score3']);
	save_array($students_fr, $STUDENT_FILE);
	save_array($scores_fr, $SCORE_FILE); 
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 2 - Exo 6</title>
		<meta name="author" content="Etienne Barbieri">
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/tp2.css">
	</head>
	<body>
        <h1>TP 2 - Exo 6</h1>
        <hr>

		<h2>Modification(s) effectuée(s)</h2>
		<a class="bouton" href="exo6-formulaire.html">Nouvelle recherche</a>
	</body>
</html>
