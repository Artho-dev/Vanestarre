<?php
function insertPasswordRequest($userid) {
    $db = connectDB();
    try {
        $ins = $db->prepare('INSERT INTO PSWD_FORGOTTEN (userid) VALUES (?)');
        $ins->execute(array($userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function requestPasswordRequestByUserId($userid) {
    $db = connectDB();

    $req = $db->prepare('SELECT * FROM PSWD_FORGOTTEN WHERE userid = ?');
    $req->execute(array($userid));
    return $req;
}