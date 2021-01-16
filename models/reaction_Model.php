<?php

include_once 'Model.php';

//reaction types : 'love', 'cute', 'style', 'swag'

function requestReactionsFromPostAndType($postid, $type) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid, postid FROM REACTION WHERE type = ? AND postid = ?');
    $req->execute(array($type, $postid));
    return $req;
}

function getReactionAmountByMemberAndType($userid, $postid, $type): int {
    $db = connectDB();

    $req = $db->prepare('SELECT type, userid, postid FROM REACTION WHERE postid = ? AND userid = ? AND type = ?');
    $req->execute(array($postid, $userid, $type));
    return $req->rowCount();
}

function requestReaction($userid, $postid) {
    $db = connectDB();

    $req = $db->prepare('SELECT type, userid, postid FROM REACTION WHERE postid = ? AND userid = ?');
    $req->execute(array($postid,$userid));
    return $req;
}

function insertReaction($userid, $postid, $type) {
    $db = connectDB();

    try {
        $ins = $db->prepare('INSERT INTO REACTION (type, postid, userid) VALUES (?, ?, ?)');
        $ins->execute(array($type, $postid, $userid));
    }
    catch (Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function deleteReaction($userid, $postid) {
    $db = connectDB();

    $del = $db->prepare('DELETE FROM REACTION WHERE postid = ? AND userid = ?');
    $del->execute(array($postid, $userid));
}