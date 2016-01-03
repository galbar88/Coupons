<?php
	include_once ('../model/session_manager.php');
	include_once ('../model/signup_logic.php');
	
	$answer_array = Array();
	
	if ($_SERVER["REQUEST_METHOD"] != "POST") {	//case tried to access file in a wrong way
		$answer_array["status"] = "fail";
		$answer_array["failReason"] = "Connection method was wrong";
	} else {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$answer_array["status"] = "success";
		$answer_array["failReason"] = "";
		$login_success = session_login($username, $password);
		if (!$login_success) {
			$answer_array["failReason"] = "Incorrect password or username";
			$answer_array["status"] = "fail";
		}
	}
	
	echo json_encode ($answer_array);
?>
