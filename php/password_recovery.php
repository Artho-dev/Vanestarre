<?php
    include_once '../models/password_Model.php';
    include_once '../models/Model.php';

    if (isset($_POST['mail'], $_POST['forgot_password']) && $_POST['forgot_password'] == 'mail') {

        if (preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $_POST['mail']) && requestUserByEmail($_POST['mail'])->rowCount() != 0 && !empty($_POST['mail'])) {

            $user = getUserByEmail($_POST['mail']);
            $userid = $user['userid'];

            $req = requestPasswordRequestByUserId($userid);
            if ($req->rowCount() != 0) {
                deletePasswordRequest($userid);
            }
            insertPasswordRequest($userid);
            $req = requestPasswordRequestByUserId($userid)->fetch();

            $id = $req['userid'];
            $code = $req['code'];
            $name = $user['name'];

            //On génère le lien de récupération
            $website = 'loicganne.alwaysdata.net';
            $modification_url = 'http://'.$website.'/php/reset_password_View.php?id='.$id.'&code='.$code;

            //On génère le message du mail (possiblement à écrire en HTML plus tard)
            $mail_message = 'Coucou '. $name .', tu as oublié ton mot de passe ?' . PHP_EOL . PHP_EOL;
            $mail_message .= 'Voici un lien qui te permettra de le modifier: ' . $modification_url . PHP_EOL . PHP_EOL;
            $mail_message .= 'Si vous n\'êtes pas à l\'origine de cette demande, veuillez nous contacter.' . PHP_EOL;
            $mail_message .= 'A très bientôt sur Vanéstarre!';

            //On envoie le lien confirmation par email
            mail($_POST['mail'], 'Vanéstarre: Changement de mot de passe', $mail_message);

            //TODO Renvoyer vers une page

        }
        else {
            $invalid_mail = true;
            header ('location: ../forgotten_password.php');
        }
    }
    else {
        die('Erreur: Session Invalide');
    }