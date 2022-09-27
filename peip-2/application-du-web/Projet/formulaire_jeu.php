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
  <title>Site de Jeu : Choix thème Jeu du Pendu</title>
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

  <section>
    <article>
      <h3>Règle du jeu:</h3>
      <p> Le but du jeu est simple : deviner toute les lettres qui doivent composer un mot, éventuellement avec un nombre limité de tentatives et des thèmes fixés à l'avance. A chaque fois que le joueur devine une lettre, celle-ci est affichée. Dans le cas contraire, le dessin d'un pendu se met à apparaître…</p>
    </article>
    <hr>
    <article>
      <h3>Jouer</h3>

      <form action="jeu.php" method="post">
        <label for="theme-select">Choisissez un thème:</label>

        <select name="theme" id="theme-select">
          <option value="">--Veuillez choisir un thème--</option>
          <option value="pays">Pays/Ville</option>
          <option value="animals">Animaux</option>
          <option value="sport">Sport</option>
          <option value="marque">Marque</option>
          <option value="eat">Nourriture</option>
        </select>

        <input type="submit" value="Jouer" />

      </form>
    </article>
  </section>
  <br>
  </div>
</body>

</html>