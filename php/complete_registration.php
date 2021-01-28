<?php

include_once '../models/Model.php';

if(isset($_GET['id'], $_GET['code']) && !empty($_GET['id']) && !empty($_GET['code'])) {
    $id = (int) $_GET['id'];
    $code = (int) $_GET['code'];

    //On vérifie que la demande d'inscription existe
    if (requestRegisterConfirmationRequestByUseridAndCode($id, $code)->rowCount() != 0) {
        //On passe l'attribut isTemporary de l'utilisateur à false
        setUserTemporaryById($id, false);

        //On supprime le tuple d'inscription de la BDD
        deleteRegisterConfirmationRequest($id, $code);

        require_once '../index.php';
    }
    else {
        die('Erreur Fatale : Requête inexistante');
    }
}

