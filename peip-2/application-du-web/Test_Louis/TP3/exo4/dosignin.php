<?php
	session_start();
	// à compléter
	// Dans cette partie, on teste le login et le mot de passe :
	// - on teste si le login proposé existe bien 
	// - on teste si le mot de passe correspond
	// En cas de succès :
	// - si le paramètre "goto" existe, on redirige l'utilisateur vers le script
	//   qui est la valeur de ce paramètre
	// - sinon on redirige l'utilisateur vers "page1.php"
	// En cas d'échec, on redirige l'utilisateur vers la page de login
	
	function users($users_file){
		$res = [];
		$tableau = file($users_file,FILE_IGNORE_NEW_LINES);
		foreach ($tableau as $line){
			$l = explode(",",trim($line));
			$login = $l[0];
			$mdp = $l[1];
			$res[] = array($login,$mdp);
		}
		return $res;
	}

	$user_file = 'users.csv';
	$_SESSION['users'] = users($user_file);

	function check_login_mdp($user_login,$user_mdp,$session){
		$res = false;
		foreach ($session as $info){
			if ($info[0] == $user_login){
				if($info[1] == md5($user_mdp)){
					$res = true;
				}
			}
		}
		return $res;
	}

	if (check_login_mdp($_POST['login'],$_POST['password'],$_SESSION['users'])){
		$_SESSION['connection'] = true;
    	$_SESSION['login'] = $_POST['login'];
    	session_unset($_POST['login'],$_POST['password'],$_POST['badlogin']);
    	$location = 'Location: page'.$_GET['goto'].'php';
		header($location);
	}
	else {
		$location = 'Location: signin.php?goto='.$_GET['goto'];
		if (isset($_POST['login'])){
			$location .= '?badlogin=true';
		}	
		header($location);
	}

?>
