
<?php
	include_once ('model/session_manager.php');
	include_once ('model/signup_logic.php');
	$validFields = validFields();
		
	function validFields() {
		global $username_err, $password_err;
		global $username, $password;
		$valid = true;
		if (!array_key_exists('username', $_POST) | $_POST['username'] === "") { $username_err="*Please enter username"; $valid = false;}
		if (username_is_free ($username)) { $username_err=$username_err . " *Username not in the system"; $valid = false;}
		if (!array_key_exists('password', $_POST) | $_POST['password'] === "") { $password_err="*Please enter password"; $valid = false;}
		return $valid;
	}
	
	if ($validFields) {
		$login_success = session_login($username, $password);
		if (!$login_success) $password_err = " *Incorrect password";
	}
?>
