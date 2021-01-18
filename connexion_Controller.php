<?php

include_once 'models/Model.php';

if (isset($_POST['login']) && ($_POST['login'] == 'login_page' || $_POST['login'] == 'login_home')) {

    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];
    $sessionid = 0;
    $invalid_login = false;

    //On vérifie si le login est un username
    if (isset($login_username, $login_password) && !empty($login_username) && !empty($login_password)) {
        if (preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $login_username)) {
            $req = requestUserByEmailAndPassword($login_username, $login_password);
            if ($req->rowCount() != 0) {
                $user = $req->fetch();
                $sessionid = $user['userid'];
            } else {
                $invalid_login = true;
            }
        }
        //On vérifie si le login est un email
        elseif (preg_match('/[a-z0-9]+/', $login_username)) {
            $req = requestUserByUsernameAndPassword($login_username,$login_password);
            if ($req->rowCount() != 0) {
                $user = $req->fetch();
                $sessionid = $user['userid'];
            }
            else {
                $invalid_login = true;
            }
        }
        else {
            $invalid_login = true;
        }
    }
    else {
        $invalid_login = true;
    }

    if ($invalid_login) {
        if ($_POST['login'] == 'login_page') {
            require_once 'inscription.php';
        }
        elseif ($_POST['login'] == 'login_home') {
            require_once 'index.php';
        }
    }
    else {
        session_start();
        $_SESSION['vanestarre']['userid'] = $user['userid'];
        $_SESSION['vanestarre']['password'] = $login_password;
        header('Location:index.php');
    }
}
else {
    die('Erreur Fatale : Formulaire Invalide');
}