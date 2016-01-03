<?php
if (file_exists('./sql_connection_handler.php')) include_once ('./sql_connection_handler.php');
if (file_exists('../sql_connection_handler.php')) include_once ('../sql_connection_handler.php');
if (file_exists('../model/sql_connection_handler.php')) include_once ('../model/sql_connection_handler.php');
if (file_exists('./structs/coupon_info.php')) include_once ('./structs/coupon_info.php');
if (file_exists('../structs/coupon_info.php')) include_once ('../structs/coupon_info.php');


function session_login($username, $password) {
	$connection = create_connection();
	$query = 'SELECT * FROM User WHERE  username =  "' . $username . '";';
	$result = $connection->query($query);

	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		if ($password == $row['password']) {
			//this is for correct login
			if (!$_SESSION) session_start();
			$_SESSION['username'] = $row['username'];
			determine_role($connection, $username);
			return true;
		} else {
			//this is for incorrect pass
			return false;
		}
	} else {
			//this is for username doesnt exist
		return false;
	}
}

function determine_role($connection, $username) {

	$query = 'SELECT * FROM Client WHERE  client_username =  "' . $username . '";';
	$result = $connection->query($query);
	if ($result->num_rows > 0) {
		$_SESSION['role'] = 'client';
		}
	
	$query = 'SELECT * FROM Manager WHERE  manager_username =  "' . $username . '";';
	$result = $connection->query($query);
	if ($result->num_rows > 0) {
		$_SESSION['role'] = 'manager';
		}
	
	
	$query = 'SELECT * FROM Admin WHERE  admin_username =  "' . $username . '";';
	$result = $connection->query($query);
	if ($result->num_rows > 0) {
		$_SESSION['role'] = 'admin';
		}
	}

function is_user_connected() {
	if (!$_SESSION) {
		session_start();
	}
	if (array_key_exists('username', $_SESSION)) {
		return true;
	}
	return false;
	}
	
function connected_user_name() {
	return $_SESSION['username'];
	}
	
function connected_user_role() {
	return $_SESSION['role'];
	}
	
function logout() {
	if (!$_SESSION) session_start();
	session_unset();
	session_destroy(); 
}
?>