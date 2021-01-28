<?php
include_once 'utils.inc.php';
include_once 'models/Model.php';

require_once 'header.php';
require_once 'php/connexion_handler.php';

if ($sessionid != 0){
    $roles = array( 'member' => 'Membre Vanestarre', 'admin' => '(Super) Administrateur' );


    $user = getUserById($sessionid);
    $user_name = $user['name'];
    $user_username = $user['username'];
    $user_mail = $user['mail'];
    $user_birth = $user['birth_date'];
    $user_country = $user['country'];
    $user_role = $user['role'];

    $config = getConfiguration();
    $config_page = $config['post_per_page'];
    $config_min_reaction = $config['min_reaction'];
    $config_max_reaction = $config['max_reaction'];

    $profil = getProfile($sessionid);
    $profil_bio = $profil['description'];
    $profil_picture = $profil['picture'];

    require_once 'profil_View.php';
}
else {
    die('Erreur: Session Invalide');
}


?>
