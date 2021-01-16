<?php

//Connexion à la base de donnée
function connectDB() {
    try {
        $db = new PDO('mysql:host=mysql-loicganne.alwaysdata.net;dbname=loicganne_vanestarre;charset=utf8', 'loicganne_root', '!!oojrbd2');
        return $db;
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

//Setters

function insertUser($username, $name, $mail, $password, $birthdate, $country) {
    $db = connectDB();

    $ins = $db->prepare('INSERT INTO USER (userid, username, name, mail, password, $birthdate, $country) VALUES (?, ?, ?, ?, SHA1(?), ?, ?)');
    $ins->execute(array($username, $name, $mail, $password, $birthdate, $country));
}

function insertRegisterConfirmationRequest($userid) {

}

//Getters

function requestRegisterConfirmationRequestByUserid($userid) {
    $db = connectDB();

    $req = $db->prepare('SELECT type, userid, postid FROM REACTION WHERE userid = ?');
    $req->execute(array($userid));
    return $req;
}

function getPosts($limit) {
    $db = connectDB();

    $posts = $db->prepare('SELECT postid, senderid, message, has_image, image, creation_date FROM POST ORDER BY creation_date DESC LIMIT 0, ?');
    $posts ->execute(array($limit));

    return $posts;
}

function getPost($postId)
{
    $db = connectDB();

    $req = $db->prepare('SELECT postid, senderid, message, has_image, image, creation_date FROM POST WHERE postid = ?');
    $req->execute(array($postId));
    return $req->fetch();
}

function getUserById($userid) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid, username, name, mail, birth_date, country, role FROM USER WHERE userid = ?');
    $req->execute(array($userid));
    return $req->fetch();
}

function getUserByUsername($username) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid, username, name, mail, birth_date, country, role FROM USER WHERE username = ?');
    $req->execute(array($username));
    return $req->fetch();
}