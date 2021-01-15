<?php

function connectDB() {
    try {
        $db = new PDO('mysql:host=mysql-loicganne.alwaysdata.net;dbname=loicganne_vanestarre;charset=utf8', 'loicganne_root', '!!oojrbd2');
        return $db;
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function getPosts() {
    $db = connectDB();

    $posts = $db->query('SELECT postid, senderid, message, has_image, image, creation_date FROM POST ORDER BY creation_date DESC LIMIT 0, 6');

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