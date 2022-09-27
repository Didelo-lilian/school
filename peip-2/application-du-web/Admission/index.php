<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>TP 2 - Exo 6</title>
  <meta name="author" content="SOLER Lilian">
  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
</head>

<body>
  <h1>Prévision Admission</h1>
  <hr>

  <form action="index_action.php" method="get">
    <div>
      <label for='name'>Entrez un nom ou un prénom d'étudiant, ou rien pour voir tous les étudiants : </label>
      <br>
      <input type="text" name="nom">
    </div>
    <div>
      <label for='option_select'>Choisir un type de prévision :</label>
      <br>
      <select id="option-select">
        <option value="">--Veuillez choisir une option--</option>
        <option value="hard">Dure</option>
        <option value="medium">Moyenne</option>
        <option value="easy">Facile</option>
      </select>
    </div>
    <input type="submit" value="Rechercher">
  </form>
</body>

</html>