<?php

include 'models/Model.php';

if (isset($_POST['action']) && $_POST['action'] == 'register') {

    //Vérification de la non-existance et de la justesse de chaque variable
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }

    if (isset($_POST['publicname'])) {
        $name = $_POST['publicname'];
    }

    if (isset($_POST['mail'])) {
        $mail = $_POST['mail'];
    }

    if (isset($_POST['password'], $_POST['password_confirm']) && $_POST['password_confirm'] == $_POST['password']) {
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
    }

    if (isset($_POST['birthdate'])) {
        $birthdate = $_POST['birthdate'];
    }

    if (isset($_POST['country'])) {
        $country = $_POST['country'];
    }
    else {
        $country = 'Non Spécifié';
    }

    if (isset($_POST['conditions'])) {
        $conditions = $_POST['conditions'];
    }

    if ($username != "" && $name != "" && $password != "" && $password_confirm != "" && isset($mail, $birthdate, $conditions)) {

        //Charger la vue de la page confirmation email
        require 'confirm_inscription_View.php';

        //setUser($username, $name, $mail, $password, $birthdate, $country);

        //Envoie de confirmation par email
        $confirmation_url = '**INSERER UN URL**';

        $mail_message = 'Coucou '. $name .', bienvenue sur MON réseau-social: Vanéstarre!' . PHP_EOL . PHP_EOL;
        $mail_message .= 'Voici un lien qui te permettra de confirmer ton email: ' . $confirmation_url . PHP_EOL . PHP_EOL;
        $mail_message .= 'A très bientôt sur Vanéstarre!';

        mail($mail, 'Vanéstarre: Confirmation d\'E-mail', $mail_message);
    }
    else {
        //Recharger la vue de la page inscription
        require 'inscription.php';
    }

}
else {
    echo 'Une erreur est survenue...';
}