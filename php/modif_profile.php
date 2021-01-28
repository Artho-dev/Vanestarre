<?php

include_once '../models/Model.php';
require_once 'connexion_handler.php';

if(true){
	$username = (string) $_POST['username'];
	$name = (string) $_POST['name'];
	$mail = (string) $_POST['mail'];
	$birthday = $_POST['birthdate'];
	$bio = (string) $_POST['description'];
	
	$user = getUserById($sessionid);
	$profile = getProfile($sessionid);
	
	if($username == $user['username']) {
		if(!updateUsername($sessionid, $username)){
			//error
		}
	}
	
	if($name == $user['name']) { updatePseudo($sessionid, $name); }
	
	if($mail == $user['mail']) {
		if(!updateMail($sessionid, $mail)){
			//error
		}
	}
	
	if($birthday == $user['birthday']) { updateBirthday($sessionid, $birthday); }

	if($bio == $profile['description']) { updateBio($sessionid, $bio); }

	
}

