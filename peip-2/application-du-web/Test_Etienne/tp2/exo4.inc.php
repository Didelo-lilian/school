<?php
    
    // remplit les tableaux '$day', '$month' et '$lang'
    // à partir des informations contenues dans les fichiers
    // '*.txt' contenus dans le répertoire '$folderpath'
    function fillArrays($folderpath,&$day,&$month,&$lang) {
        $files = scandir($folderpath); 

        $lang = array(
            "lang1" => file($folderpath . '/' . $files[2])[0],
            "lang2" => file($folderpath . '/' . $files[3])[0],
            "lang3" => file($folderpath . '/' . $files[4])[0],
            "lang4" => file($folderpath . '/' . $files[5])[0],);

        $day = array(
            "lang1" => file($folderpath . '/' . $files[2])[1],
            "lang2" => file($folderpath . '/' . $files[3])[1],
            "lang3" => file($folderpath . '/' . $files[4])[1],
            "lang4" => file($folderpath . '/' . $files[5])[1],);

        $month = array(
            "lang1" => file($folderpath . '/' . $files[2])[2],
            "lang2" => file($folderpath . '/' . $files[3])[2],
            "lang3" => file($folderpath . '/' . $files[4])[2],
            "lang4" => file($folderpath . '/' . $files[5])[2],);
    }

    // pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
	function makeRadio($keyval,$name) {
        $result = '<div>';
        foreach ($keyval as $key => $val) {
            $result .= "<fieldset><input type='radio' name='" . $name . "' value='" . $key . "'> $val </fieldset>";
        }
        $result .= '</div>';
        return $result;    
    }

    // retourne une chaîne de caractèresult qui donne
    // la date dans la langue déterminée par le code '$langue'    
    function makeDate($langue,$jour,$mois) {
        $jour_fr = explode(',', $jour[$langue])[date('w')]; 
        $jour_num = date('d');
        $mois_fr = explode(',', $mois[$langue])[date('n') - 1]; 
        $annee_num = date('Y');
        return  $jour_fr . " " . $jour_num . " " . $mois_fr . " " . $annee_num; 
    }

    $LANGUE = [];
    $JOUR = [];
    $MOIS = [];

    fillArrays("exo4",$JOUR,$MOIS,$LANGUE);
?>
