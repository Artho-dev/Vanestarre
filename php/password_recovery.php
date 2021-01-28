<?php
    include_once '../models/password_Model.php';
include_once '../models/Model.php';

    if (isset($_POST['mail']) && !empty($_POST['mail'])) {

        if (preg_match('/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/', $_POST['mail'])) {
            $mail = $_POST['mail'];
            $user = getUserByEmail($_POST['mail']);

            $req = requestPasswordRequestByUserId($userid);
            if ($req->rowCount() != 0) {
                insertPasswordRequest($userid);
                $req = requestPasswordRequestByUserId($userid)->fetch();

                $id = $req['userid'];
                $code = $req['code'];
                $name = $user['name'];

                //On génère le lien de récupération
                $website = 'loicganne.alwaysdata.net';
                $modification_url = 'http://'.$website.'/php/reset_password.php?id='.$id.'&code='.$code;

                //On génère le message du mail (possiblement à écrire en HTML plus tard)
                $mail_message = 'Coucou '. $name .', tu as oublié ton mot de passe ?' . PHP_EOL . PHP_EOL;
                $mail_message .= 'Voici un lien qui te permettra de le modifier: ' . $modification_url . PHP_EOL . PHP_EOL;
                $mail_message .= 'A très bientôt sur Vanéstarre!';

                //On envoie le lien confirmation par email
                mail($mail, 'Vanéstarre: Réinitialisation du Mot de Passe', $mail_message);
            }
            else {
                //TODO Remplacer le requête existance et renvoyer un mail.
            }

            //TODO Renvoyer vers une page
        }
        else {
            die('Erreur: Requête Invalide');
        }
    }
    else {
        die('Erreur: Session Invalide');
    }