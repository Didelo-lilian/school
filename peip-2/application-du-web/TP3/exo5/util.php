<?php


// Etant donnés la langue ($lang qui vaut "fr", "en" ou "it")
// et la page ($page qui vaut "index", "products" ou "contact")
// cette fonction retourne un tableau associatif contenant tous
// les couples (clef,information) contenus dans le fichier
// correspondant
function get_content($lang, $page)
{
	$res = [];
	$file = $lang . '/' . $page . '.txt';
	foreach (file($file, FILE_IGNORE_NEW_LINES) as $line) {
		$l = explode('#', trim($line));
		$type_of_content = $l[0];
		$content = $l[1];
		$res[$type_of_content] = $content;
	}
	return $res;
}

// à compléter
// Dans cette partie, il faut
// - démarrer/reprendre une session
// - stocker dans le tableau $_SESSION
//   la langue
// Par défaut, la langue est le français
session_start();

if (isset($_GET['lang'])) {
	$_SESSION['lang'] = $_GET['lang'];
} else {
	if (!isset($_SESSION['lang'])) {
		$_SESSION['lang'] = 'fr';
	}
}
