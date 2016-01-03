<?php
include_once ('./structs/client_info.php');
include_once ('./structs/deal_info.php');
include_once ('sql_connection_handler.php');

//CLIENT

function search_client_by_username($username) {
	$connection = create_connection();
	$query = "SELECT * FROM Client INNER JOIN User ON Client.client_username = User.username WHERE Client.client_username = '" . $username . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return new ClientInfo($row));
	}
}

function search_all_clients() {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Client INNER JOIN User ON Client.client_username = User.username";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new ClientInfo($row));
		}
	}
	return $return_array;
}

function delete_client($client_username) {
	$connection = create_connection();
	$query1 = "DELETE FROM Client WHERE client_username= '" . $client_username . "'"
	$query2 = "DELETE FROM User WHERE username= '" . $client_username . "'";	
	$connection->query($query1) or trigger_error($connection->error);
	$connection->query($query2) or trigger_error($connection->error);
}

//DEAL

function search_deals_by_client_username($client_username) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Deal WHERE client_username = '" . $client_username . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new DealInfo($row));
		}
	}
	return $return_array;
}

function search_deals_by_business_id($business_id) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Deal INNER JOIN Coupon ON Deal.coupon_id = Coupon.coupon_id WHERE Coupon.business_id = '" . $business_id . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new DealInfo($row));
		}
	}
	return $return_array;
}

function search_all_deals() {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Deal";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new DealInfo($row));
		}
	}
	return $return_array;
}

function search_deal_by_deal_sn($deal_sn) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Deal WHERE deal_sn = '" . $deal_sn . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new DealInfo($row));
		}
	}
	return $return_array;
}

?>