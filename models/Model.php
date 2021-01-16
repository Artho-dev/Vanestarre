<?php

//Script en rapport avec les requêtes sur la BDD

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
    try {
    $ins = $db->prepare('INSERT INTO USER (username, name, mail, password, birth_date, country) VALUES (?, ?, ?, SHA1(?), ?, ?)');
    $ins->execute(array($username, $name, $mail, $password, $birthdate, $country));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function insertRegisterConfirmationRequest($userid) {
    $db = connectDB();

    try {
        $ins = $db->prepare('INSERT INTO INSCRIPTION_CONFIRMATION (userid) VALUES (?)');
        $ins->execute(array($userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

//Getters

function requestRegisterConfirmationRequestByUserid($userid) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid, code FROM INSCRIPTION_CONFIRMATION WHERE userid = ?');
    $req->execute(array($userid));
    return $req;
}

function getPosts() {
    $db = connectDB();

    $posts = $db->query('SELECT * FROM POST ORDER BY creation_date DESC LIMIT 0, 6');
    //$posts ->execute(array($limit));

    return $posts;
}

function getPost($postId)
{
    $db = connectDB();

    $req = $db->prepare('SELECT * FROM POST WHERE postid = ?');
    $req->execute(array($postId));
    return $req->fetch();
}

function getUserById($userid) {
    $db = connectDB();

    $req = $db->prepare('SELECT * FROM USER WHERE userid = ?');
    $req->execute(array($userid));
    return $req->fetch();
}

function getUserByUsername($username) {
    $db = connectDB();

    $req = $db->prepare('SELECT * FROM USER WHERE username = ?');
    $req->execute(array($username));
    return $req->fetch();
}