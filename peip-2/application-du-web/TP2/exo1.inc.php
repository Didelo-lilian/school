<?php

$JOUR = [
	"lang1" => ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"],
	"lang2" => ["Domenica", "Lunedì",	"Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"],
	"lang3" => ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"]
];

$MOIS = [
	"lang1" => ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"],
	"lang2" => ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
	"lang3" => ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
];

$LANGUE = ["lang1" => "français", "lang2" => "italien", "lang3" => "anglais"];

// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function makeRadio($keyval, $name)
{
	$res = '<div>';
	foreach ($keyval as $key => $val) {
		$res .= "<fieldset><input type='radio' name='" . $name . "' value='" . $key . "'> $val
			</fieldset>";
	}
	$res .= '</div>';
	return $res;
}

// retourne une chaîne de caractères qui donne
// la date dans la langue déterminée par le code '$langue'
function makeDate($langue, $jour, $mois)
{
	$jour_str = $jour[$langue][date('w')]; //jours de la semaine de 0 à 6 (Dimanche à Lundi)
	$jour_int = date('d');
	$mois_str = $mois[$langue][date('n') - 1]; //Mois sans les zéros initiaux et -1 car les mois commencent à 1
	$annee_int = date('Y');
	return  $jour_str . " " . $jour_int . " " . $mois_str . " " . $annee_int;
}
