<?php

	// retourne une chaîne de caractères identique
	// à '$nom' mais avec tous les caractères en
	// minuscule et avec la première lettre en majuscule
	function normalize($nom) {

		return ucfirst(mb_strtolower($nom));
		
    }
    
	// lit le fichier '$student_file' et retourne un tableau
	// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
	// où ID est l'identifiant, PRENOM le prénom et
	// NOM le nom de l'étudiant
	function student_array($student_file) {

		$student =file ($student_file);
	

		$INFO = [];

		for($i =0; $i<19;$i++){

			$elements = explode(";", $student[$i]);
			$INFO[$elements[0]]= array($elements[1],$elements[2]);
		}

		return $INFO;
		
	}
	
	// lit le fichier '$score_file' et retourne un tableau
	// associatif de la forme [ ID => [ NOTE1, NOTE2, NOTE3 ], ... ]
	// où ID est l'identifiant, et NOTE1, NOTE2 et NOTE3 les trois
	// notes obtenues par l'étudiant
	function score_array($score_file) {

		$score =file ($score_file);
		
	
		$INFO = [];


		for($i =0; $i<19;$i++){

			$elements = explode(";", $score[$i]);
			$INFO[$elements[0]]= array($elements[1],$elements[2],$elements[3]);
		}
		return $INFO;
		
	}
	
	// retourne la moyenne des valeurs
	// contenues dans le tableau '$tabnotes'
	function average($tabnotes) {

		$total =0;

		for($i=0;$i<count($tabnotes);$i++){

			$total = $total + (int)$tabnotes[$i];

		}
		$moyenne = $total/count($tabnotes);
		return $moyenne;
		
    }
    
    // retourne le TR adéquat qui contient successivement dans
	// les sept TD successifs l'identifiant, le prénom, le nom,
    // les trois notes, la moyenne de ces notes et le lien
    // pour pouvoir modifier les informations de l'étudiant
	function student_score($id,$info,$score) {

			$resulat ='<tr>'.
	          '<td>'.
	         	 $id.
	         '</td>'.
	         '<td>'.
	         	normalize($info[$id][0]).
	          '</td>'.
	          '<td>'.
	         	 normalize($info[$id][1]).
	         '</td>'.
	          '<td>'.
	        	 $score[$id][0]  .       
	          '</td>'.
	          '<td>'.
	        	 $score[$id][1] .
	          '</td>'.
	          '<td>'.
	         	 $score[$id][2] .
	          '</td>'.
	          '<td>'.
	         	  average($score[$id]).
	         '</td>'.
	         '<td>'.
	         	  "<a href=\"exo6-mod-formulaire.php?id=".$id."\">Modifier</a>".
	         '</td>'.

             '</tr>';
    return $resulat ;

		
    }
    
    // retourne les TR adéquats qui contiennent successivement
    // les informations des étudiants sélectionnés suivant la
    // valeur de '$name' :
    // - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est la chaîne vide, l'étudiant est sélectionné
    function table_content($name,$students,$scores) {


    	$trouvé =false ;
    	$sortie = ' ';

    	for ($i=1001;$i<1020;$i++){

    		if(!$name == null ){

    			if($students[$i][0]==$name || $students[$i][1]==$name){

    				$trouvé = true ;
    				$sortie =$sortie. student_score($i,$students,$scores);	
    		
    			}

    		}else {
    			$trouvé = true ;
    			$sortie =$sortie. student_score($i,$students,$scores);
    		}

    	}
    	if($trouvé ==false){
    			return "étudiant non trouvé éssayez une nouvelle recherche  ";
    	}

    	else{return $sortie;}
       
    }

	// retourne le contenu de l'élément HTML FORM
	// pour comprendre ce que cette fonction doit générer
    // regardez le code source HTML du fichier exemple fourni
    function form_content($id,$students,$scores) {

    	$resulat ="<td>"
    			. $id.
    			"</td>".
				"<td>".
					"<input type=\"text\" name=\"prenom\" value=\"".$students[$id][0]."\">".
				"</td>".
				"<td>".
					"<input type=\"text\" name=\"nom\" value=\"".$students[$id][1]."\">".
				"</td>".
				"<td>".
					"<input type=\"text\" name=\"score1\" value=\"".$scores[$id][0]."\">".
				"</td>".
				"<td>".
					"<input type=\"text\" name=\"score2\" value=\"".$scores[$id][1]."\">".
				"</td>".
				"<td>".
					"<input type=\"text\" name=\"score3\" value=\"".$scores[$id][2]."\">".
				"</td>".
				"<td>".
				average($scores[$id]).
				"</td>".
				"<td>".
					"<input type=\"submit\" value=\"Valider\">".
				"</td>".
				"<input type=\"hidden\" name=\"id\" value=\"".$id."\">"  ;

		return $resulat;
       
    }

    // sauve le tableau associatif '$array' dans le
	// fichier '$file' au format CSV. Le tableau est de
	// la forme [ ID => INFO ] où INFO est un tableau de
	// valeurs (associatif ou pas)
	function save_array($array, $file) {
		
		file_put_contents($file, $array);
	}

	// modifie le contenu du tableau '$students' en associant les
	// valeurs '$firstnme' et '$lastname' aux clefs 'prenom' et 'nom'
	// pour la clef '$id'
    function update_student_array(&$students,$id,$firstname,$lastname) {

    	for($i =1001;$i<1020;$i++){

    		$students[$i] = array( $firstname , $lastname);


    	}
      
    }

	// modifie le contenu du tableau '$scores' en associant les
	// valeurs '$score1', '$score2' et '$score3' à la clef '$id'	
    function update_score_array(&$scores,$id,$score1,$score2,$score3) {

    	for($i =1001;$i<1020;$i++){

    		$students[$i] = array ($score1, $score2 , $score3 );


    	}
	  
    }
    
    $STUDENT_FILE = "exo5-6/students.csv";
    $SCORE_FILE = "exo5-6/scores.csv";

?>
