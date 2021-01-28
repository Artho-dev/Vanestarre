<?php
include_once 'Model.php';

function updateNbPage($value) {
    $db = connectDB();

    try {
        $ins = $db->prepare('UPDATE CONFIGURATION SET post_per_page = ?;');
        $ins->execute(array($value));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updateMinAlert($value) {
    $db = connectDB();

    try {
        $ins = $db->prepare('UPDATE CONFIGURATION SET min_reaction = ?;');
        $ins->execute(array($value));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updateMaxAlert($value) {
    $db = connectDB();

    try {
        $ins = $db->prepare('UPDATE CONFIGURATION SET max_reaction = ?;');
        $ins->execute(array($value));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}