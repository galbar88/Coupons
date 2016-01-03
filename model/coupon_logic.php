<?php
if (file_exists('./structs/coupon_info.php')) include_once ('./structs/coupon_info.php');
if (file_exists('../structs/coupon_info.php')) include_once ('../structs/coupon_info.php');
if (file_exists('./structs/deal_info.php')) include_once ('./structs/deal_info.php');
if (file_exists('../structs/deal_info.php')) include_once ('../structs/deal_info.php');
include_once ('sql_connection_handler.php');



function search_coupons_by_name($coupon_name) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Coupon INNER JOIN Business ON Coupon.business_id = Business.business_id WHERE LOCATE('" . $coupon_name . "' , Coupon.coupon_name) > 0";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new CouponInfo($row));
		}
	}
	return $return_array;
}

function search_coupon_by_id($coupon_id) {
	$connection = create_connection();
	$query = "SELECT * FROM Coupon INNER JOIN Business ON Coupon.business_id = Business.business_id WHERE coupon_id = '" . $coupon_id . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		return new CouponInfo($row);
	}
}

function search_all_coupons() {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Coupon INNER JOIN Business ON Coupon.business_id = Business.business_id WHERE quantity_sold < offered_quantity";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new CouponInfo($row));
		}
	}
	return $return_array;
}

function search_all_coupons_including_soldouts() {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Coupon INNER JOIN Business ON Coupon.business_id = Business.business_id";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new CouponInfo($row));
		}
	}
	return $return_array;
}


function search_coupons_by_user($username) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Deal INNER JOIN Coupon ON Deal.coupon_id = Coupon.coupon_id INNER JOIN Business ON Coupon.business_id = Business.business_id WHERE Deal.client_username = '" . $username . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new DealInfo($row));
		}
	}
	return $return_array;
}

function search_coupons_by_business_name($name) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Business INNER JOIN Coupon ON Business.business_id = Coupon.business_id WHERE Business.name = '" . $name . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new CouponInfo($row));
		}
	}
	return $return_array;
}

function search_coupons_by_business_id($business_id) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Coupon INNER JOIN Business ON Coupon.business_id = Business.business_id WHERE Business.business_id = '" . $business_id . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new CouponInfo($row));
		}
	}
	return $return_array;
}

function search_coupons_by_location($latitude, $longitude) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Coupon INNER JOIN Business ON Coupon.business_id = Business.business_id 
	WHERE location_latitude-100 <= '" . $latitude . "' AND location_longitude-100 <= '" . $longitude . "' AND location_latitude+100 >= '" . $latitude . "' AND location_longitude+100 >= '" . $longitude . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new CouponInfo($row));
		}
	}
	return $return_array;
}


function search_coupons_by_category($category) {
	$connection = create_connection();
	$return_array = array();
	$query = "SELECT * FROM Coupon INNER JOIN Business ON Coupon.business_id = Business.business_id WHERE Business.category = '" . $category . "'";
	$result = $connection->query($query) or trigger_error($connection->error);
	
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($return_array, new CouponInfo($row));
		}
	}
	return $return_array;
}

function add_coupon($business_id, $name, $description, $category, $offered_quantity, $discount_price, $original_price, $expiration_date) {
	$connection = create_connection();
	$query = "INSERT INTO Coupon(business_id, coupon_name, description, category, offered_quantity, discount_price, original_price, expiration_date) VALUES ('" .
	$business_id . "', '" .
	$name . "', '" .
	$description . "', '" .
	$category . "', '" .
	$offered_quantity . "', '" .
	$discount_price . "', '" .
	$original_price . "', '" .
	$expiration_date . "')";	
	$connection->query($query) or trigger_error($connection->error);
}

function edit_coupon($coupon_id, $name, $description, $offered_quantity, $discount_price, $original_price, $expiration_date) {
	$connection = create_connection();
	$query = "UPDATE Coupon SET coupon_name= '" . $name . "', 
	description= '" . $description . "',
	offered_quantity= '" . $offered_quantity . "',
	discount_price= '" . $discount_price . "',
	original_price= '" . $original_price . "',
	expiration_date= '" . $expiration_date . "' WHERE coupon_id = '" . $coupon_id . "'";	
	$connection->query($query) or trigger_error($connection->error);
}

function delete_coupon($coupon_id) {
	$connection = create_connection();
	$query = "DELETE FROM Coupon WHERE coupon_id= '" . $coupon_id . "'";	
	$connection->query($query) or trigger_error($connection->error);
}

function client_buy_coupon($username, $coupon_id) {
	$connection = create_connection();
	$query = "INSERT INTO Deal (date, is_realized, coupon_id, client_username) VALUES ('" .
	date("Y-m-d") . "', '" .
	"0"  . "', '" .
	$coupon_id . "', '" .
	$username . "')";
	$connection->query($query) or trigger_error($connection->error);
	
	$query2 = "UPDATE Coupon SET quantity_sold = quantity_sold + 1 WHERE coupon_id = '" . $coupon_id . "'";
	$connection->query($query2) or trigger_error($connection->error);
}

function client_use_coupon($username, $deal_sn) {
	$connection = create_connection();
	$query = "UPDATE Deal SET is_realized = 1 WHERE deal_sn = '" . $deal_sn . "' AND client_username = '" . $username . "'"; 
	$connection->query($query) or trigger_error($connection->error);
}

function seach_deal_by_sn ($deal_sn) {
	$connection = create_connection();
	$query = "SELECT * FROM Deal WHERE deal_sn = '" . $deal_sn . "'"; 
	$result = $connection->query($query) or trigger_error($connection->error);
	
	if ($result->num_rows == 1) {
		$row = $result->fetch_assoc(); 
		return new DealInfo($row);
	} else {
		return false;
	}
}


function client_rate_coupon($coupon_id, $rating) {
	$connection = create_connection();
	$coupon = search_coupon_by_id($coupon_id);
	$number_of_ratings = $coupon->number_of_ratings + 1;
	$avg_rating = (($coupon->rating * $coupon->number_of_ratings) + $rating) / $number_of_ratings;
	$query = "UPDATE Coupon SET rating = '" . $avg_rating . "', number_of_ratings = '" . $number_of_ratings . "' WHERE coupon_id = '" . $coupon_id . "'"; 
	$connection->query($query) or trigger_error($connection->error);
}

function check_quantity_left($coupon_id){
	$coupon = search_coupon_by_id($coupon_id);
	$quantity_left = $coupon->offered_quantity - $coupon->quantity_sold;
	return ($quantity_left > 0);
} 
?>