<?php
    // à compléter
    // Ce script vérifie les paramètres envoyés par l'utilisateur
    // et, si ces paramètres sont corrects, réalise le signup puis
    // redirige l'utilisateur vers le script "signin.php",
    // sinon, redirige directement l'utilisateur vers le script
    // "signin.php" avec le bon message d'erreur en paramètre
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
	
	function check_info($info,$info_index,$session){
		$res = false;
		foreach ($session as $infos){
			if ($infos[$info_index] == $info){
				$res = true;
			}
		}
		return $res;
	}

	function check_login_mdp($user_login,$user_mdp1,$user_mdp2,$session){ // $file
		$location = 'Location: signup.php';
		if (!is_string($user_login)){
			$location .= '?badsignup=1';
			header($location);
		}
		if (check_info($user_login,0,$session)){
			$location .= '?badsignup=2';
			header($location);
		}
		if (strlen($user_mdp) < 4){
			$location .= '?badsignup=3';
			header($location);
		}
		if ($user_mdp1 != $user_mdp2){
			$location .= '?badsignup=4';
			header($location);
		}
		return true;	
	}

	function save_array($array, $file) {
	    $content = '';
	    foreach ($array as $infos) {
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

	function update_user_file($user_file,$user_login,$user_password){
		update_user_array($user_file,$user_login,$user_password);
		save_array($user_file);
	}

	if (check_login_mdp($_POST['login'],$_POST['password1'],$_POST['password2'],$_SESSION['users'])){
		update_user_array($user_file,$_POST['login'],$_POST['password1']);
	}


?>
