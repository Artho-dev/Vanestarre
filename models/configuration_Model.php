<?php
include_once 'Model.php';

function getNbPage() {
    $db = connectDB();

    $req = $db->prepare('SELECT post_per_page FROM CONFIGURATION WHERE id = 1');
    $req-> execute();
    return (int) $req->fetch()['post_per_page'];
}

function updateNbPage($value) {
    $db = connectDB();

    try {
        $ins = $db->prepare('UPDATE CONFIGURATION SET post_per_page = ? WHERE id = 1;');
        $ins->execute(array($value));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updateMinAlert($value) {
    $db = connectDB();

    try {
        $ins = $db->prepare('UPDATE CONFIGURATION SET min_reaction = ? WHERE id = 1;');
        $ins->execute(array($value));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updateMaxAlert($value) {
    $db = connectDB();

    try {
        $ins = $db->prepare('UPDATE CONFIGURATION SET max_reaction = ? WHERE id = 1;');
        $ins->execute(array($value));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}