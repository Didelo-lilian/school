<?php

$debut = microtime(true);



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

print_r(csv_to_array('foreach.csv'));
foreach (csv_to_array('foreach.csv') as $line) {
  foreach ($line as $value) {
    echo $value;
  }
}



$fin = microtime(true);



$delai = $fin - $debut;



echo "Le temps écoulé est de ‘.$delai.’ millisecondes.";
