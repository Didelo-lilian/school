<?php
$USERS_FILE = 'users.csv';
$EXCEL_FILE = 'excel.csv';
$CHOICES_FILE = 'choices.csv';

function normalize($nom)
{
  return ucfirst(strtolower($nom));
}

function csv_to_array($file)
{
  $res = [];
  foreach (file($file, FILE_IGNORE_NEW_LINES) as $line) {
    $line = explode(';', trim($line));
    $id = $line[0];
    array_shift($line);
    $info = $line;
    $res[$id] = $info;
  }
  return $res;
}

function table_content($id, $users_array, $excel_array, $choices_array)
{
  $ids_school = $choices_array[$id];
  $res = "<h2> Prévision de l'admission de : " . normalize($users_array[$id][0]) . " " . normalize($users_array[$id][1]) . "<br>
              Classé(e) : " . $users_array[$id][2] . " sur 1874";

  $res .= "<table>
  <tr>
    <th>Nom de l'établissement</th>
    <th>Nombre de premier Voeu dans l'Excel</th>
    <th>Nombre de premier Voeu prévisionnels</th>
    <th>Nombre de premier Voeu devant l'élève</th>
    <th>Nombre de place disponible min</th>
    <th>Nombre de place disponible max</th>
    <th>Admission</th>
  </tr>";

  foreach ($ids_school as $id_school) {
    $first_wish = round($excel_array[$id_school][1] * (1874 / 1080),);
    $real_first_wish = round(($first_wish * $users_array[$id][2] / 1874), 0);
    $place = $real_first_wish + 1;
    $place_attente = $place - $excel_array[$id_school][2];
    if ($place <= $excel_array[$id_school][2]) {
      $admission = 'Admis à la ' . $place . ' place(s)';
    } else {
      $admission = 'En attente à la ' . $place_attente . ' place(s)';
    }

    $res .= '<tr>
	            <td>' . normalize($excel_array[$id_school][0]) . '</td>
              <td>' . $excel_array[$id_school][1] . '</td>
              <td>' . $first_wish . '</td>
              <td>' . $real_first_wish . '</td>
              <td>' . $excel_array[$id_school][2] . '</td>
              <td>' . $excel_array[$id_school][3] . '</td>
              <td>' . $admission . '</td>';
  }
  $res .= "</table>
  <br><hr>";
  return $res;
}

function tables_content($name, $users_file, $excel_file, $choices_file)
{
  $users_array = csv_to_array($users_file);
  $excel_array = csv_to_array($excel_file);
  $choices_array = csv_to_array($choices_file);

  $ids = check_name($name, $users_array);

  if ($name != 'rien' && $name != '') {
    if (count($ids) == 0) {
      echo "L'élève demandé n'est pas dans les bases de données.";
    } else {
      foreach ($ids as $id) {
        echo table_content($id, $users_array, $excel_array, $choices_array);
      }
    }
  } else {
    $id = 0;
    foreach ($users_array as $user) {
      echo table_content($id, $users_array, $excel_array, $choices_array);
      $id += 1;
    }
  }
}

function check_name($name, $users_array)
{
  $ids = [];
  $id = 0;
  foreach ($users_array as $id => $user) {
    if ($user[1] == $name || $user[2] == $name) {
      $ids[] = $id;
    }
    $id += 1;
  }
  return $ids;
}
