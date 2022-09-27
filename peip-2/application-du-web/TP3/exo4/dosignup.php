<?php
session_start();
// à compléter
// Ce script vérifie les paramètres envoyés par l'utilisateur
// et, si ces paramètres sont corrects, réalise le signup puis
// redirige l'utilisateur vers le script "signin.php",
// sinon, redirige directement l'utilisateur vers le script
// "signin.php" avec le bon message d'erreur en paramètre

function users_array($users_file)
{
    $res = [];
    $users = file($users_file, FILE_IGNORE_NEW_LINES);
    foreach ($users as $line) {
        $l = explode(",", trim($line));
        $login = $l[0];
        $mdp = $l[1];
        $res[] = array($login, $mdp);
    }
    return $res;
}

function redirection($file)
{
    $location = 'Location: ' . $file;
    header($location);
    exit();
}

function check_alpha($str)
{
    // On cherche tt les caractères autre que [A-z]
    preg_match("/([^A-Za-z\s])/", $str, $result);
    // si on trouve des caractère autre que A-z
    if (!empty($result)) {
        return false;
    }
    return true;
}


function check_info($info, $info_index, $users_array)
{
    $res = false;
    foreach ($users_array as $infos) {
        if ($infos[$info_index] == $info) {
            $res = true;
        }
    }
    return $res;
}

function check_login_password($user_search, $user_password1, $user_password2, $users_array)
{
    $location = 'signup.php';
    if (!check_alpha($user_search)) {
        $location .= '?badsignup=1';
        redirection($location);
    }
    if (check_info($user_search, 0, $users_array)) {
        $location .= '?badsignup=2';
        redirection($location);
    }
    if (strlen($user_password1) < 4) {
        $location .= '?badsignup=3';
        redirection($location);
    }
    if ($user_password1 != $user_password2) {
        $location .= '?badsignup=4';
        redirection($location);
    }
    return true;
}

function update_users_array($users_array, $user_search, $user_password)
{
    $users_array[] = array($user_search, $user_password);
    return $users_array;
}


function save_array($array, $file)
{
    $content = '';
    foreach ($array as $infos) {
        if (count($infos) != 0) {
            foreach ($infos as $info) {
                $content .= $info . ',';
            }
        }
        $content = rtrim($content, ",");
        $content .= "\n";
    }
    file_put_contents($file, $content);
}

function update_users_file($users_array, $user_search, $user_password, $users_file)
{
    $new_users_array = update_users_array($users_array, $user_search, md5($user_password));
    save_array($new_users_array, $users_file);
}

$USERS_FILE = 'users.csv';
$users_array = users_array($USERS_FILE);

check_login_password($_POST['login'], $_POST['password1'], $_POST['password2'], $users_array);
update_users_file($users_array, $_POST['login'], $_POST['password1'], $USERS_FILE);
header('Location: signin.php');
