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

        $picture = null;
        if($_FILES['image_file']['error'] == 0){
            $imageFileName = $_FILES['image_file']['name'];
            $imageTmpName = $_FILES['image_file']['tmp_name'];
            $imageExt = explode('.',$imageFileName);
            $imageExtension = strtolower(end($imageExt));
            $imageNewName = "profile_picture_". $userid . "." . $imageExtension;
            $imageDestination = 'profil_picture/'. $imageNewName;
            $imageSize = $_FILES['image_file']['size'];

            if ($imageSize > 500000 ){
                $errorMsg = "Fichier trop volumineux (500 Ko maximum)";
            }

            $picture = $imageDestination;
            move_uploaded_file($imageTmpName,"../" . $imageDestination);

        }

        updateImage($userid,$picture);


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

        if($birthday != $user['birth_date']) { updateBirthday($userid, $birthday); }

        if($bio != $profile['description']) { updateBio($userid, $bio); }
    }
    header('Location: '.$_SERVER['HTTP_REFERER']);
}
else {
    die('Erreur Fatale');
}

