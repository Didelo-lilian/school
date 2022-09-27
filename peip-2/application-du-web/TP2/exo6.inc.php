<?php

// retourne une chaîne de caractères identique
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
	foreach (file($score_file, FILE_IGNORE_NEW_LINES) as $line) {
		$line = explode(';', trim($line));
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
		$somme += floatval($note);
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
	$res .= '<td>' . $id . '</td><td>' . normalize($info[1]) . '</td><td>' . normalize($info[0]) . '</td>';
	foreach ($score as $note) {
		$res .= '<td>' . $note . '</td>';
	}
	$res .= '<td>' . average($score) . '</td>';
	$res .= '<td><a href="exo6-mod-formulaire.php?id=' . $id . '">Modifier</a></td>';
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
// retourne le contenu de l'élément HTML FORM
// pour comprendre ce que cette fonction doit générer
// regardez le code source HTML du fichier exemple fourni
function form_content($id, $students, $scores)
{
	$students_array = Student_array($students);
	$scores_array = Score_array($scores);
	$info = $students_array[$id];
	$score = 	$scores_array[$id];
	echo '<td>' . $id . '</td>
	<td>
		<input type="text" name="prenom" value="' . $info[0] . '">
	</td>
	<td>
		<input type="text" name="nom" value="' . $info[1] . '">
	</td>';
	$i = 1;
	foreach ($score as $note) {
		echo '<td>
		<input type="text" name="score' . $i . '" value="' . $note . '">
	</td>';
		$i += 1;
	}
	echo '<td>' . average($score) . '</td>
	<td>
		<input type="submit" value="Valider">
	</td>
	<input type="hidden" name="id" value="' . $id . '">';
}

// sauve le tableau associatif '$array' dans le
// fichier '$file' au format CSV. Le tableau est de
// la forme [ ID => INFO ] où INFO est un tableau de
// valeurs (associatif ou pas)
function save_array($array, $file)
{
	$content = '';
	foreach ($array as $id => $infos) {
		$content .= $id . ';';
		if (count($infos) != 0) {
			foreach ($infos as $info) {
				$content .= $info . ';';
			}
		}
		$content = rtrim($content, ";");
		$content .= "\n";
	}
	file_put_contents($file, $content);
}

// modifie le contenu du tableau '$students' en associant les
// valeurs '$firstnme' et '$lastname' aux clefs 'prenom' et 'nom'
// pour la clef '$id'
function update_student_array(&$students, $id, $firstname, $lastname)
{
	$students[$id] = array($lastname, $firstname);
}

// modifie le contenu du tableau '$scores' en associant les
// valeurs '$score1', '$score2' et '$score3' à la clef '$id'	
function update_score_array(&$scores, $id, $score1, $score2, $score3)
{
	$scores[$id] = array($score1, $score2, $score3);
}

$STUDENT_FILE = "exo5-6/students.csv";
$SCORE_FILE = "exo5-6/scores.csv";
