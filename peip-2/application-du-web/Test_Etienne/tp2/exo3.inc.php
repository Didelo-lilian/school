<?php
	
    // pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
	function makeRadio($info,$name) {
		$result = '<div>';
		for ($i = 0; isset($info[$i]); $i++) {
			$nom_pays = explode(",", $info[$i])[0];
			$j = $i + 1;
			$result .= "<fieldset><input type='radio' name='" . $name . "' value='" . $j . "'>" . $nom_pays . "</fieldset>";
		}
		$result .= '</div>';
		return $result;
	}
	
	// retourne le nom du pays de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'
	function getCountryName($key,$info) {
		$key = intval($key) - 1;
		$result = explode(",", $info[$key]);
		return $result[0];
	}
	
	// retourne le nom de la capitale de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'	
	function getCapitalName($key,$info) {
		$key = intval($key) - 1;
		$result = explode(",", $info[$key]);
		return $result[2];
	}
	
	// retourne l'élément HTML IMG qui est l'image
	// du pays de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'	
	function getCountryImage($key,$info) {
		$key = intval($key) - 1;
		$result = explode(",", $info[$key]);
		$key = $key + 1;
		return "<img class='exo2-3' src='exo2-3/" . $result[1] . "' alt='" . getCountryName($key, $info) . "' title='" . getCountryName($key, $info) . "'>";
	}
	
	// retourne l'élément HTML IMG qui est l'image
	// de la capitale de clef '$key'
	// '$key' est la clef dp nt la valeur est
	// l'information dans le tableau associatif '$info'
	function getCapitalImage($key,$info) {
		$key = intval($key) - 1;
		$result = explode(",", $info[$key]);
		$key = $key + 1;
		return "<img class='exo2-3' src='exo2-3/" . $result[3] . "' alt='" . getCountryName($key, $info) . "' title='" . getCountryName($key, $info) . "'>";
	}

	$INFO = file("exo2-3/data.csv");
	//// ici on doit remplir le tableau $INFO à partir des données contenues dans le fichier 'exo2-3/data.csv'	
?>
