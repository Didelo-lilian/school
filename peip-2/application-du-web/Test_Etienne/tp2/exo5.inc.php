<?php

	// retiourne une chaîne de caractères identique
	// à '$nom' mais avec tous les caractères en
	// minuscule et avec la première lettre en majuscule
	function normalize($nom) {
		return ucfirst(strtolower($nom));		
    }
    
	// lit le fichier '$student_file' et retourne un tableau
	// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
	// où ID est l'identifiant, PRENOM le prénom et
	// NOM le nom de l'étudiant
	function student_array($student_file) {
		$result = [];
		foreach (file($student_file, FILE_IGNORE_NEW_LINES) as $line) {
			$l = explode(';', trim($line));
			$id = $l[0];
			$prenom = $l[1];
			$nom = $l[2];			
			$result[$id] = array($nom, $prenom);
		}
		return $result;		
	}
	
	// lit le fichier '$score_file' et retourne un tableau
	// associatif de la forme [ ID => [ NOTE1, NOTE2, NOTE3 ], ... ]
	// où ID est l'identifiant, et NOTE1, NOTE2 et NOTE3 les trois
	// notes obtenues par l'étudiant
	function score_array($score_file) {
		$result = [];
		foreach (file($score_file) as $line) {
			$line = explode(';', $line);
			$id = $line[0];
			array_shift($line);
			$notes = $line;
			$result[$id] = $notes;
		}
		return $result;		
	}
	
	// retourne la moyenne des valeurs
	// contenues dans le tableau '$tabnotes'
	function average($tabnotes) {
		$somme = 0;
		$notes = 0;
		foreach ($tabnotes as $note) {
			$somme = $somme + $note;
			$notes = $notes + 1;
		}
	return round($somme / $notes, 2);		
    }
    
    // retourne le TR adéquat qui contient successivement dans
	// les sept TD successifs l'identifiant, le prénom, le nom,
	// les trois notes et la moyenne de ces notes
	function student_score($id,$info,$score) {
		$result = '<tr>';
		$result .= '<td>' . $id . '</td><td>' . normalize($info[1]) . '</td><td>' . normalize($info[0]);
		foreach ($score as $note) {
			$result .= '<td>' . $note . '</td>';
		}
		$result .= '<td>' . average($score) . '</td>';
		$result .= '</tr>';
		return $result;		
    }
    
    // retourne les TR adéquats qui contiennent successivement
    // les informations des étudiants sélectionnés suivant la
    // valeur de '$name' :
    // - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
    // - si '$name' est la chaîne vide, l'étudiant est sélectionné
    function table_content($name,$students,$scores) {
		$students_fr = student_array($students);
		$scores_fr = score_array($scores);
		$ids = verif_name($name, $students_fr);

		if ($name != 'rien' && $name != '') {
			if (count($ids) == 0) {
				echo "L'élève demandé n'est pas dans les bases de données.";
			} else {
				foreach ($ids as $id) {
					$info = $students_fr[$id];
					$score = $scores_fr[$id];
					echo student_score($id, $info, $score);
				}
			}
		} else {
			$ids = obtenir_ids($students_fr);
			foreach ($ids as $id) {
				$info = $students_fr[$id];
				$score = $scores_fr[$id];
				echo student_score($id, $info, $score);
			}
		}		
    }

	function verif_name($name, $students_fr){
		$ids = [];
		foreach ($students_fr as $id => $student) {
			if ($student[0] == $name || $student[1] == $name) {
				$ids[] = $id;
			}
		}
		return $ids;
	}

	function obtenir_ids($students_fr){
		$ids = [];
		foreach ($students_fr as $id => $student) {
			$ids[] = $id;
		}
		return $ids;
	}
    
    $STUDENT_FILE = "exo5-6/students.csv";
    $SCORE_FILE = "exo5-6/scores.csv";

?>
