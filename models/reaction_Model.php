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
        $ins = $db->prepare('INSERT INTO REACTION (type, postid, userid) VALUES (?, ?, ?, NOW())');
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

function countReactionByName($postid, $name){
	$db = connectDB();
    $req = $db->prepare('SELECT COUNT(*) FROM REACTION WHERE postid = ? AND type = ?');
    $req->execute(array($postid, $name));
	$tab = $req->fetch();
	return $tab[0];
}

function getLastReactionUser($userid, $number_reaction){
	$db = connectDB();
	$req = $db->prepare('SELECT * FROM REACTION WHERE userid = ? ORDER BY date LIMIT 0,?');
	$req->execute(array($userid, $number_reaction));
	return $req->fetch();
}