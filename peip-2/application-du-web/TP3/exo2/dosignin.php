<?php
session_start();
// à compléter
// Dans cette partie, on teste le login et le mot de passe :
// - on teste si le login proposé existe bien 
// - on teste si le mot de passe correspond
// En cas de succès, on redirige l'utilisateur vers page1.php
// En cas d'échec, on redirige l'utilisateur vers la page de login

function users_array($users_file)
{
	$res = [];
	foreach (file($users_file, FILE_IGNORE_NEW_LINES) as $line) {
		$l = explode(',', trim($line));
		$user = $l[0];
		$password = $l[1];
		$res[] = array($user, $password);
	}
	return $res;
}

function check_user_password($user_search, $password, $users_file)
{
	$res = false;
	$users = users_array($users_file);
	foreach ($users as $info) {
		if ($info[0] == $user_search) {
			if ($info[1] == $password) {
				$res = true;
			}
		}
	}
	return $res;
}

$USERS_FILE = 'users.csv';

if (check_user_password($_POST['login'], $_POST['password'], $USERS_FILE)) {
	$_SESSION['is_connected'] = true;
	$_SESSION['login'] = $_POST['login'];
	$location = 'Location: page1.php';
	header($location);
} else {
	$location = 'Location: signin.php';
	header($location);
}
