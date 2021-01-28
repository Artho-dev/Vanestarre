<?php
include_once '../models/password_Model.php';

if (isset($_GET['id'], $_GET['code']) && !empty($_GET['id']) && !empty($_GET['code'])) {
    $req = requestPasswordRequestByUserId($_GET['id']);
    if ($req->rowCount() != 0 && $req->fetch()['code'] == $_GET['code']) {
        //TODO On affiche la page pour changer le mot de passe
        echo 'Changer de mot de passe:';
    }
    else {
        die('Erreur: Requête Invalide');
    }
}
else {
    die('Erreur: Requête Invalide');
}