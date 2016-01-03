<?php
include_once ('./structs/business_info.php');
include_once ('./structs/manager_info.php');
include_once ('sql_connection_handler.php');

//BUSINESS

function search_business_by_name($business_name) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Business WHERE name = '" . $business_name . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new BusinessInfo($row));
		}
	}
	return $return_array;
}

function search_business_by_id($business_id) {
	$connection = create_connection();
	$query = "SELECT * FROM Business WHERE business_id = '" . $business_id . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return new BusinessInfo($row);
	}
}

function search_all_businesses() {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Business";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new BusinessInfo($row));
		}
	}
	return $return_array;
}

function search_business_by_manager_user_name($manager_username) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Business WHERE manager_username = '" . $manager_username . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new BusinessInfo($row));
		}
	}
	return $return_array;
}

function search_business_by_location($latitude, $longitude) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Business
	WHERE location_latitude-100 <= '" . $latitude . "' AND location_longitude-100 <= '" . $longitude . "' AND location_latitude+100 >= '" . $latitude . "' AND location_longitude+100 >= '" . $longitude . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new BusinessInfo($row));
		}
	}
	return $return_array;
}

function search_business_by_category($category) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Business WHERE category = '" . $category . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new BusinessInfo($row));
		}
	}
	return $return_array;
}

function add_business($manager_username, $location_latitude, $location_longitude, $category, $name, $address, $city) {
	$connection = create_connection();
	$query = "INSERT INTO Business(manager_username, location_latitude, location_longitude, category, name, address, city) VALUES ('" .
	$manager_username . "', '" .
	$location_latitude . "', '" .
	$location_longitude . "', '" .
	$category . "', '" .
	$name . "', '" .
	$address . "', '" .
	$city . "')";	
	$connection->query($query) or trigger_error($connection->error);
}

function edit_business($business_id, $manager_username, $location_latitude, $location_longitude, $category, $name, $address, $city) {
	$connection = create_connection();
	$query = "UPDATE Business SET manager_username= '" . $manager_username . "', 
	location_latitude= '" . $location_latitude . "',
	location_longitude= '" . $location_longitude . "',
	category= '" . $category . "',
	name= '" . $name . "',
	address= '" . $address . "',
	city= '" . $city . "' WHERE business_id= '" . $business_id . "'";	
	$connection->query($query) or trigger_error($connection->error);
}

function delete_business($business_id) {
	$connection = create_connection();
	$query = "DELETE FROM Business WHERE business_id='" . $business_id . "'";	
	$connection->query($query) or trigger_error($connection->error);
}

//MANAGER

function search_all_managers() {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Manager INNER JOIN User ON Manager.manager_username = User.username";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new ManagerInfo($row));
		}
	}
	return $return_array;
}

function search_manager_by_manager_username($manager_username) {
	$connection = create_connection();
	$query = "SELECT * FROM Manager INNER JOIN User ON Manager.manager_username = User.username WHERE manager_username = '" . $manager_username . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return new ManagerInfo($row);
	}
}

function register_manager($firstname, $lastname, $email, $phonenumber, $username, $password) {
	$connection = create_connection();
	$query1 = 'INSERT INTO User(username, password, first_name, last_name, email, phone_number) VALUES ("'
	. $username . '", "'
	. $password . '", "'
	. $firstname . '", "'
	. $lastname . '", "'
	. $email . '", "'
	. $phonenumber . '");';
	
	$query2 = 'INSERT INTO Manager(manager_username) VALUES ("'
	. $username . '");';
		
	$result = $connection->query($query1) or trigger_error($connection->error);
	$result = $connection->query($query2) or trigger_error($connection->error);
}

function delete_manager($manager_username) {
	$connection = create_connection();
	$query1 = "DELETE FROM Manager WHERE manager_username= '" . $manager_username . "'";
	$query2 = "DELETE FROM User WHERE username= '" . $manager_username . "'";
	$connection->query($query1) or trigger_error($connection->error);
	$connection->query($query2) or trigger_error($connection->error);
}

?>