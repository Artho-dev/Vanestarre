<?php

include 'models/Model.php';

if (isset($_POST['action']) && $_POST['action'] == 'register') {

    //Vérification de la non-existance et de la justesse de chaque variable
    if (isset($_POST['username']) && preg_match($_POST['username'], '[a-z0-9]+')) $username = $_POST['username'];

    if (requestUserByUsername($username)->rowCount() != 0) $username = -1;

    if (isset($_POST['publicname'])) $name = $_POST['publicname'];

    if (isset($_POST['mail']) && preg_match($_POST['mail'],'^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$')) $mail = $_POST['mail'];

    if (requestUserByEmail($mail)->rowCount() != 0) $mail = -1;

    if (isset($_POST['password'], $_POST['password_confirm']) && strlen($_POST['password']) > 7) {
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
    }

    if (isset($_POST['birthdate'])) $birthdate = $_POST['birthdate'];

    if (isset($_POST['country'])) $country = $_POST['country'];
    else $country = 'Non Spécifié';

    if (isset($_POST['conditions'])) {
        $conditions = $_POST['conditions'];
    }
    else {
        $conditions = 'refused';
    }

    if (isset($username, $name, $password, $password_confirm, $mail, $birthdate, $conditions) && $username != "" && $username != -1 && $name != "" && $mail != -1 && $password != "" && $password_confirm != "" && $conditions == 'accepted' && $password == $password_confirm) {

        //Ajout du l'utilisateur dans la base de donnée en tant qu'utilisateur temporaire
        insertUser($username, $name, $mail, $password, $birthdate, $country);
        $user = getUserByUsername($username);

        //On vérifie que l'utilisateur est bien un utilisateur temporaire.
        if($user['isTemporary']) {
            //On vérifie si une relation de confirmation d'inscription existe déjà
            $req = requestRegisterConfirmationRequestByUserid($user['userid']);
            if ($req->rowCount() == 0) {
                //On crée une nouvelle relation de confirmation d'inscription qu'on récupère dans $req
                insertRegisterConfirmationRequest($user['userid']);
                $req = requestRegisterConfirmationRequestByUserid($user['userid'])->fetch();

                $id = $req['userid'];
                $code = $req['code'];

                //On génère le lien de confirmation
                $website = 'loicganne.alwaysdata.net';
                $confirmation_url = 'http://'.$website.'/php/complete_registration.php?id='.$id.'&code='.$code;

                //On génère le message du mail (possiblement à écrire en HTML plus tard)
                $mail_message = 'Coucou '. $name .', bienvenue sur MON réseau-social: Vanéstarre!' . PHP_EOL . PHP_EOL;
                $mail_message .= 'Voici un lien qui te permettra de confirmer ton email: ' . $confirmation_url . PHP_EOL . PHP_EOL;
                $mail_message .= 'A très bientôt sur Vanéstarre!';

                //On envoie le lien confirmation par email
                mail($mail, 'Vanéstarre: Confirmation d\'E-mail', $mail_message);
            }
            else {
                die('Erreur: Tuple dupliqué.');
            }
        }
        else {
            die('Erreur: Utilisateur non autorisé.');
        }
        //Charger la vue de la page confirmation email
        require 'confirm_inscription_View.php';
    }
    else {
        //Recharger la vue de la page inscription
        require 'inscription.php';
    }

}
else {
    echo 'Une erreur est survenue...';
}