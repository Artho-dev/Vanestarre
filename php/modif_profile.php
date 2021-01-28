<?php

include_once '../models/Model.php';

require_once '../header.php';
require_once 'connexion_handler.php';

if(isset($sessionid, $_POST['username'], $_POST['name'], $_POST['mail'], $_POST['birthdate'], $_POST['description']) && $sessionid != 0) {
    if (!empty($_POST['username']) && !empty($_POST['name']) && !empty($_POST['mail']) && !empty($_POST['birthdate'])) {
        $userid = $sessionid;

        $username = (string) $_POST['username'];
        $name = (string) $_POST['name'];
        $mail = (string) $_POST['mail'];
        $birthday = $_POST['birthdate'];
        $bio = (string) $_POST['description'];

        $user = getUserById($userid);
        $profile = getProfile($userid);

        if($username != $user['username']) {
            if(!updateUsername($userid, $username)){
                //error
            }
        }

        if($name != $user['name']) { updatePseudo($userid, $name); }

        if($mail != $user['mail']) {
            if(!updateMail($userid, $mail)){
                //error
            }
        }

        if($birthday != $user['birthday']) { updateBirthday($userid, $birthday); }

        if($bio != $profile['description']) { updateBio($userid, $bio); }
    }
    header('location: ../profil.php');
}
else {
    die('Erreur Fatale');
}

