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

function setUserTemporaryById($userid, $value) {
    $db = connectDB();

    try {
        $ins = $db->prepare('UPDATE USER SET isTemporary = ? WHERE USER.userid = ?;');
        $ins->execute(array($value, $userid));
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

function insertPost($senderid, $message, $has_image, $image) {
    $db = connectDB();
    try {
        $ins = $db->prepare('INSERT INTO POST (senderid, message, has_image, image, creation_date, last_reaction_bitcoin) VALUES (?, ?, ?, ?, NOW(), ?)');
        $ins->execute(array($senderid, $message, $has_image, $image, random_int(get_min_reaction(), get_max_reaction())));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

//Deleters

function deleteRegisterConfirmationRequest($userid, $code) {
    $db = connectDB();

    $del = $db->prepare('DELETE FROM INSCRIPTION_CONFIRMATION WHERE userid = ? AND code = ?');
    $del->execute(array($userid, $code));
}

function deletePost($postid){
    $db = connectDB();
    try {
        $del = $db->prepare('DELETE FROM POST WHERE postid = ?');
        $del->execute(array($postid));
    }
    catch (Exception $e){
        die('Erreur :'.$e->getMessage());
    }
}
//Updaters

function updatePost($postid, $message, $has_image, $image){
    $db = connectDB();
    try {
        $ins = $db->prepare('UPDATE POST SET message = ?, has_image = ?, image = ? WHERE postid = ?');
        $ins->execute(array($message, $has_image, $image, $postid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updatePasswordById($userid, $password) {
    $db = connectDB();
    try {
        $ins = $db->prepare('UPDATE USER SET password = SHA1(?) WHERE userid = ?');
        $ins->execute(array($password, $userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updateUsername($userid, $new_username){
	$db = connectDB();
	$req = $db->prepare('SELECT COUNT(*) FROM USER WHERE username = ?');
    $req->execute(array($new_username));
	$tab = $req->fetch();
	if($tab[0] == 1) { return false; }
    try {
        $ins = $db->prepare('UPDATE USER SET username = ? WHERE userid = ?');
        $ins->execute(array($new_username, $userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
	return true;
}

function updatePseudo($userid, $new_pseudo){
	$db = connectDB();
    try {
        $ins = $db->prepare('UPDATE USER SET name = ? WHERE userid = ?');
        $ins->execute(array($new_pseudo, $userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updateMail($userid, $new_mail){
	$db = connectDB();
	$req = $db->prepare('SELECT COUNT(*) FROM USER WHERE mail = ?');
    $req->execute(array($new_mail));
	$tab = $req->fetch();
	if($tab[0] == 1) { return false; }
    try {
        $ins = $db->prepare('UPDATE USER SET mail = ? WHERE userid = ?');
        $ins->execute(array($new_mail, $userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
	return true;
}

function updateBirthday($userid, $new_birthday){
	$db = connectDB();
    try {
        $ins = $db->prepare('UPDATE USER SET birth_date = ? WHERE userid = ?');
        $ins->execute(array($new_birthday, $userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

function updateBio($userid, $new_bio){
	$db = connectDB();
    try {
        $ins = $db->prepare('UPDATE PROFILE SET description = ? WHERE userid = ?');
        $ins->execute(array($new_bio, $userid));
    }
    catch(Exception $e) {
        die('Erreur : '.$e->getMessage());
    }
}

//Getters

function getRoleById($id) {
    $db = connectDB();

    $req = $db->prepare('SELECT role FROM USER WHERE userid = ?');
    $req->execute(array($id));
    return $req->fetch()['role'];
}

function requestRegisterConfirmationRequestByUserid($userid) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid, code FROM INSCRIPTION_CONFIRMATION WHERE userid = ?');
    $req->execute(array($userid));
    return $req;
}

function requestRegisterConfirmationRequestByUseridAndCode($userid, $code) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid, code FROM INSCRIPTION_CONFIRMATION WHERE userid = ? and code = ?');
    $req->execute(array($userid, $code));
    return $req;
}

function getPosts($page, $limit) {
    $min = $page * $limit - $limit;

    $db = connectDB();
    $posts = $db->prepare('SELECT * FROM POST ORDER BY creation_date DESC, postid DESC LIMIT :min, :limit');
    $posts->bindParam(':min', $min, PDO::PARAM_INT);
    $posts->bindParam(':limit', $limit, PDO::PARAM_INT);
    $posts->execute();
    return $posts;
}

function getPostAmount() {
    $db = connectDB();
    $req = $db->prepare('SELECT count(postid) AS postAmount FROM POST');
    $req->execute();
    $value = $req->fetch();
    return (int) $value['postAmount'];
}

function getPostAmountWithTag($tag) {
    $db = connectDB();
    $req = $db->prepare('SELECT count(postid) AS postAmount FROM POST WHERE INSTR(message, :tag) != 0');
    $req->bindParam(':tag', $tag);
    $req->execute();
    $value = $req->fetch();
    return (int) $value['postAmount'];
}

function getPostsByTag($tag, $page, $limit) {
    $min = $page * $limit - $limit;
    $tag = 'β'.$tag;
    $db = connectDB();
    $posts = $db->prepare('SELECT * FROM POST WHERE INSTR(message, :tag) != 0 ORDER BY creation_date DESC LIMIT :min, :limit');
    $posts->bindParam(':min', $min, PDO::PARAM_INT);
    $posts->bindParam(':limit', $limit, PDO::PARAM_INT);
    $posts->bindParam(':tag', $tag);
    $posts->execute();
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

function requestUserByUsername($username) {
    $db = connectDB();

    $req = $db->prepare('SELECT * FROM USER WHERE username = ?');
    $req->execute(array($username));
    return $req;
}

function requestUserByEmail($mail) {
    $db = connectDB();

    $req = $db->prepare('SELECT * FROM USER WHERE mail = ?');
    $req->execute(array($mail));
    return $req;
}

function requestUserByID($userid) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid FROM USER WHERE userid = ?');
    $req->execute(array($userid));
    return $req;
}

function requestUserByUsernameAndPassword($username, $password) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid FROM USER WHERE username = ? AND password = SHA1(?)');
    $req->execute(array($username, $password));
    return $req;
}

function requestUserByEmailAndPassword($mail, $password) {
    $db = connectDB();

    $req = $db->prepare('SELECT userid FROM USER WHERE mail = ? AND password = SHA1(?)');
    $req->execute(array($mail, $password));
    return $req;
}

function getUserByUsername($username) {
    $db = connectDB();

    $req = $db->prepare('SELECT * FROM USER WHERE username = ?');
    $req->execute(array($username));
    return $req->fetch();
}

function getUserByEmail($mail) {
    return requestUserByEmail($mail)->fetch();
}

function get_min_reaction() {
    return (int) getConfiguration()['min_reaction'];
}

function get_max_reaction() {
    return (int) getConfiguration()['max_reaction'];
}

function getConfiguration(){
	$db = connectDB();
    $req = $db->prepare('SELECT * FROM CONFIGURATION WHERE id = 1');
    $req->execute();
	return $req->fetch();
}
	

function getProfile($userid){
	$db = connectDB();
    $req = $db->prepare('SELECT * FROM PROFILE WHERE userid = ?');
    $req->execute(array($userid));
	return $req->fetch();
}

function get_last_reaction_bitcoin($postid){
	$tab = getPost($postid);
	return $tab[6];
}