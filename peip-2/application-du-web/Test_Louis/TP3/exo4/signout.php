<?php
    // à compléter
    // dans cette partie, on détruit la session
    // et on redirige l'utilisateur vers la page de login
    session_unset($_SESSION['users'],$_SESSION['login'],$_SESSION['password'],$_SESSION['connection']);
	session_destroy();
	session_regenerate_id(TRUE);
	header('Location: signin.php');
?>
