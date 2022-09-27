<?php
$INFO = file("exo2-3/data.csv");

//// ici on doit remplir le tableau $INFO à partir des données contenues dans le fichier 'exo2-3/data.csv'


// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function makeRadio($info, $name)
{
	$res = '<div>';
	for ($i = 0; isset($info[$i]); $i++) {
		$name_country = explode(",", $info[$i])[0];
		$j = $i + 1;
		$res .= "<fieldset><input type='radio' name='" . $name . "' value='" . $j . "'>" . $name_country .
			"</fieldset>";
	}
	$res .= '</div>';
	return $res;
}

// retourne le nom du pays de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCountryName($key, $info)
{
	$key = intval($key) - 1;
	$res = explode(",", $info[$key]);
	return $res[0];
}

// retourne le nom de la capitale de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'	
function getCapitalName($key, $info)
{
	$key = intval($key) - 1;
	$res = explode(",", $info[$key]);
	return $res[2];
}
// retourne l'élément HTML IMG qui est l'image
// du pays de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'	
function getCountryImage($key, $info)
{
	$key = intval($key) - 1;
	$res = explode(",", $info[$key]);
	$key += 1;
	return "<img class='exo2-3' src='exo2-3/" . $res[1] . "' alt='" . getCountryName($key, $info) . "' title='" . getCountryName($key, $info) . "'>";
}

// retourne l'élément HTML IMG qui est l'image
// de la capitale de clef '$key'
// '$key' est la clef dp nt la valeur est
// l'information dans le tableau associatif '$info'
function getCapitalImage($key, $info)
{
	$key = intval($key) - 1;
	$res = explode(",", $info[$key]);
	$key += 1;
	return "<img class='exo2-3' src='exo2-3/" . $res[3] . "' alt='" . getCountryName($key, $info) . "' title='" . getCountryName($key, $info) . "'>";
}
