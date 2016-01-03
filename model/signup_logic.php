<?php
if (file_exists('./structs/client_info.php')) include_once ('./structs/client_info.php');
if (file_exists('../structs/client_info.php')) include_once ('../structs/client_info.php');
if (file_exists('./model/sql_connection_handler.php')) include_once ('./model/sql_connection_handler.php');
if (file_exists('../model/sql_connection_handler.php')) include_once ('../model/sql_connection_handler.php');


function signup_client($firstname, $lastname, $email, $phonenumber, $date_of_birth, $username, $password, $interests, $gender) {
	$connection = create_connection();
	$query1 = 'INSERT INTO User(username, password, first_name, last_name, email, phone_number) VALUES ("'
	. $username . '", "'
	. $password . '", "'
	. $firstname . '", "'
	. $lastname . '", "'
	. $email . '", "'
	. $phonenumber . '");';
	
	$gender_is_male = 0;
	if ($gender === "Male") $gender_is_male = 1;
	
	$query2 = 'INSERT INTO Client(client_username, gender_is_male, date_of_birth) VALUES ("'
	. $username . '", "'
	. $gender_is_male . '", "'
	. $date_of_birth . '");';
		
	$result = $connection->query($query1) or trigger_error($connection->error);
	$result = $connection->query($query2) or trigger_error($connection->error);
	
	if(!empty($interests))
	{	
		foreach($interests as $interest)
		{
			$query3 = 'INSERT INTO Client_interests (client_username, interest) VALUES ("'
				. $username . '", "'
				. $interest . '");';
			$result = $connection->query($query3) or trigger_error($connection->error);

		}
	}
}

function username_is_free ($username) {
	$connection = create_connection();
	$query = 'SELECT * FROM User WHERE  username =  "' . $username . '";';
	$result = $connection->query($query);

	if ($result->num_rows > 0) {
		return false;
	} else {
		return true;
	}
	
}
?>