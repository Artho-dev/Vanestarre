<?php
include_once '../models/password_Model.php';

if (isset($_GET['id'], $_GET['code']) && !empty($_GET['id']) && !empty($_GET['code'])) {
    include_once '../header.php';
    $id = $_GET['id'];
    $code = $_GET['code'];

    $req = requestPasswordRequestByUserId($_GET['id']);
    if ($req->rowCount() != 0 && $req->fetch()['code'] == $_GET['code']) {
        $_SESSION['vanestarre']['reset_id'] = $id;
        $_SESSION['vanestarre']['reset_code'] = $code;
        require_once '../reset_password_View.php';
    }
    else {
        die('Erreur: Requête Invalide');
    }
}
else {
    die('Erreur: Requête Invalide');
}