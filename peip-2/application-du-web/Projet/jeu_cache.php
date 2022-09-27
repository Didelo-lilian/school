<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Jeu Caché</title>
  <meta name="author" content="SOLER Lilian">
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/jeu_cache.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <?php include("php/favicon.php"); ?>
  <script src="js/jeu_cache.js"></script>
</head>

<body>
  <nav>
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="formulaire_jeu.php">Jeu</a></li>
      <li><a href="classement.php">Classement</a></li>
      <li style="float:right"><a href="about.php">About</a></li>
    </ul>
  </nav>
  <h1>Jeu Caché</h1>

  <hr>
  <div id="jeu">
    <p>
      Votre proposition :
      <input id="proposition" type="number" />
      <input type="button" value="Vérifier" onclick="verifier();" />
    </p>
    <p id="message">
      C'est parti...
    </p>
  </div>
  <div id="question">
    <span>Encore une partie ?</span>
    <input type="button" value="Oui" onclick="jouerEncore(true);" />
    <input type="button" value="Non" onclick="jouerEncore(false);" />
  </div>
  <p id="stat">
    Nombre de parties : <span id="nbParties">0</span>
    <br />
    Nombre moyen d'essais : <span id="nbMoyenEssais">0</span>
    <br />
    Meilleur jeu : <span id="meilleurJeu">0</span>
  </p>
</body>

</html>