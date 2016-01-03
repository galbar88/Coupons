<?php
	include_once ('model/signup_logic.php');
	include_once ('model/session_manager.php');

	$validFields = validFields();
	
	function validFields() {
		global $firstname_err, $lastname_err, $email_err, $phonenumber_err, $date_of_birth_err, $username_err, $password_err, $gender_err;
		global $firstname, $lastname, $email, $phonenumber, $date_of_birth, $username, $password, $interests, $gender;
		$valid = true;
		if (!array_key_exists('firstname', $_POST) | $_POST['firstname'] === "") {echo 'asd'; $firstname_err="*Mandatory field"; $valid = false; }
		if (!array_key_exists('lastname', $_POST) | $_POST['lastname'] === "") { $lastname_err="*Mandatory field"; $valid = false;}
		if (!array_key_exists('email', $_POST) | $_POST['email'] === "") { $email_err="*Mandatory field"; $valid = false;}
		if (!array_key_exists('phonenumber', $_POST) | $_POST['phonenumber'] === "") { $phonenumber_err="*Mandatory field"; $valid = false;}
		if (!array_key_exists('date_of_birth', $_POST) | $_POST['date_of_birth'] === "") { $date_of_birth_err="*Mandatory field"; $valid = false;}
		if (!array_key_exists('username', $_POST) | $_POST['username'] === "") { $username_err="*Mandatory field"; $valid = false;}
		if (!username_is_free ($username)) { $username_err=$username_err . " *Username is in use"; $valid = false;}
		if (!array_key_exists('password', $_POST) | $_POST['password'] === "") { $password_err="*Mandatory field"; $valid = false;}
		if (!array_key_exists('gender', $_POST) | $_POST['gender'] === "") { $gender_err="*Mandatory field"; $valid = false;}
		return $valid;
	}
	
	if ($validFields && !is_user_connected()) {
		signup_client($firstname, $lastname, $email, $phonenumber, $date_of_birth, $username, $password, $interests, $gender);
		session_login($username, $password);
	}
		
?>