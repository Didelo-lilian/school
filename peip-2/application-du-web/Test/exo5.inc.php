<?php
$STUDENT_FILE = "exo5-6/students.csv";
$SCORE_FILE = "exo5-6/scores.csv";

// retiourne une chaîne de caractères identique
// à '$nom' mais avec tous les caractères en
// minuscule et avec la première lettre en majuscule
function normalize($nom)
{
	return ucfirst(strtolower($nom));
}

// lit le fichier '$student_file' et retourne un tableau
// associatif de la forme [ ID => [ PRENOM , NOM ], ... ]
// où ID est l'identifiant, PRENOM le prénom et
// NOM le nom de l'étudiant
function student_array($student_file)
{
	$res = [];
	foreach (file($student_file, FILE_IGNORE_NEW_LINES) as $line) {
		$l = explode(';', trim($line));
		$id = $l[0];
		$nom = $l[2];
		$prenom = $l[1];
		$res[$id] = array($nom, $prenom);
	}
	return $res;
}

// lit le fichier '$score_file' et retourne un tableau
// associatif de la forme [ ID => [ NOTE1, NOTE2, NOTE3 ], ... ]
// où ID est l'identifiant, et NOTE1, NOTE2 et NOTE3 les trois
// notes obtenues par l'étudiant
function score_array($score_file)
{
	$res = [];
	foreach (file($score_file) as $line) {
		$line = explode(';', $line);
		$id = $line[0];
		array_shift($line);
		$notes = $line;
		$res[$id] = $notes;
	}
	return $res;
}

// retourne la moyenne des valeurs
// contenues dans le tableau '$tabnotes'
function average($tabnotes)
{
	$somme = 0;
	$notes = 0;
	foreach ($tabnotes as $note) {
		$somme += $note;
		$notes += 1;
	}
	return round($somme / $notes, 2);
}

// retourne le TR adéquat qui contient successivement dans
// les sept TD successifs l'identifiant, le prénom, le nom,
// les trois notes et la moyenne de ces notes
function student_score($id, $info, $score)
{
	$res = '<tr>';
	$res .= '<td>' . $id . '</td><td>' . normalize($info[1]) . '</td><td>' . normalize($info[0]);
	foreach ($score as $note) {
		$res .= '<td>' . $note . '</td>';
	}
	$res .= '<td>' . average($score) . '</td>';
	$res .= '</tr>';
	return $res;
}

// retourne les TR adéquats qui contiennent successivement
// les informations des étudiants sélectionnés suivant la
// valeur de '$name' :
// - si '$name' est le prénom de l'étudiant, l'étudiant est sélectionné
// - si '$name' est le nom de l'étudiant, l'étudiant est sélectionné
// - si '$name' est la chaîne vide, l'étudiant est sélectionné
function table_content($name, $students, $scores)
{
	$students_array = student_array($students);
	$scores_array = score_array($scores);
	$ids = check_name($name, $students_array);

	if ($name != 'rien' && $name != '') {
		if (count($ids) == 0) {
			echo "L'élève demandé n'est pas dans les bases de données.";
		} else {
			foreach ($ids as $id) {
				$info = $students_array[$id];
				$score = 	$scores_array[$id];
				echo student_score($id, $info, $score);
			}
		}
	} else {
		$ids = get_ids($students_array);
		foreach ($ids as $id) {
			$info = $students_array[$id];
			$score = 	$scores_array[$id];
			echo student_score($id, $info, $score);
		}
	}
}

function check_name($name, $students_array)
{
	$ids = [];
	foreach ($students_array as $id => $student) {
		if ($student[0] == $name || $student[1] == $name) {
			$ids[] = $id;
		}
	}
	return $ids;
}

function get_ids($students_array)
{
	$ids = [];
	foreach ($students_array as $id => $student) {
		$ids[] = $id;
	}
	return $ids;
}
