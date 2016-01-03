<?php

function create_connection() {
	$db_name = 'u147763768_coup';
	$sql_host = 'mysql.hostinger.co.il';
	$sql_user = 'u147763768_admin';
	$sql_pass = '12345678';
	$my_sql_connection = new mysqli($sql_host, $sql_user, $sql_pass);
	$my_sql_connection->set_charset("utf8");
	// Check connection
	if ($my_sql_connection->connect_error) {
		die("Connection failed: " . $my_sql_connection->connect_error);
	} 
	
	$my_sql_connection->select_db($db_name);
	return $my_sql_connection;
}

?>

