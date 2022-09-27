<?php
session_start();

$WORDS_FILE = '../csv/dico.csv';

function words_array($words_file)
{
  $res = [];
  foreach (file($words_file, FILE_IGNORE_NEW_LINES) as $line) {
    $l = explode(',', trim($line));
    $word = $l[0];
    $clue = $l[1];
    $res[] = array($word, $clue);
  }
  return $res;
}

$words_array = words_array($WORDS_FILE);
$words_array_length = count($words_array);
$word_index = rand(0, $words_array_length);
$random_word = $words_array[$word_index][0];
$random_word_clue = $words_array[$word_index][1];

$_SESSION["random_word"] = $random_word;
$_SESSION["random_word_clue"] = $random_word_clue;

$rep = [];
$rep["random_word"] = $random_word;
$rep["random_word_clue"] = $random_word_clue;
$rep_json = json_encode($rep);

echo $rep_json;
