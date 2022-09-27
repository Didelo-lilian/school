<?php
	include("exo6.inc.php");
	
    // à compléter


	
    
    $students = update_student_array($students, $_GET['id'],$_GET['prenom'],$_GET['nom']);



    $scores =update_score_array($scores,$_GET['id'],$_GET['score1'],$_GET['score2'],$_GET['score3']);

    save_array($students , $STUDENT_FILE);
    save_array($scores, $SCORE_FILE);
    
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>TP 2 - Exo 6</title>
		<meta name="author" content="Claire Marini G2">
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
