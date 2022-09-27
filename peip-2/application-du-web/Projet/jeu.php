<?php
session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Esteban/Zia">
  <link rel="stylesheet" type="text/css" href="css/jeu.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <?php include("php/favicon.php"); ?>
  <script src="js/simpleajax.js"></script>
  <script src="js/jeu_.js"></script>
  <title>Site de Jeu : Jeu du Pendu</title>
</head>

<body>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a class="active" href="formulaire_jeu.php">Jeu</a></li>
      <li><a href="classement.php">Classement</a></li>
      <li style="float:right"><a href="about.php">About</a></li>
    </ul>
  </nav>

  <h2>Jeu du Pendu crée par Esteban et Lilian</h2>
  <div id="app">

  </div>
  <br>

</body>

</html>