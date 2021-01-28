<?php

include_once '../models/Model.php';


if(true){
	$username = (string) $_POST['username'];
	$name = (string) $_POST['name'];
	$mail = (string) $_POST['mail'];
	$birthday = $_POST['birthday'];
	$bio = (string) $_POST['bio'];
	
	$user = getUserById($userid);
	$profile = getProfile($userid);
	
	if($username == $user['username']) {
		if(!updateUsername($userid, $username)){
			//error
		}
	}
	
	if($name == $user['name']) { updatePseudo($userid, $name); }
	
	if($mail == $user['mail']) {
		if(!updateMail($userid, $mail)){
			//error
		}
	}
	
	if($birthday == $user['birthday']) { updateBirthday($userid, $birthday); }
	
	if($bio == $profile['description']) { updateBio($userid, $bio); }
	
	
}

