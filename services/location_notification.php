<?php
	include_once ('../model/coupon_logic.php');
	include_once ('../structs/coupon_info.php');
	
	$user_location_longitude = $_GET["long"];
	$user_location_latitude = $_GET["lat"];
	$search_bar_coupon_distance = $_GET["distance"];
		
	$array_of_coupons_after_search = search_all_coupons();
	
	$array_of_coupons_after_search = array_values(array_filter($array_of_coupons_after_search, "filter_by_loc"));
	
	function distance($lat1, $lon1, $lat2, $lon2) {
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		return ($miles * 1.609344);
	}


	function filter_by_loc($coupon_info) {
		global $search_bar_coupon_distance;
		global $user_location_longitude;
		global $user_location_latitude;
		if (distance($user_location_latitude, $user_location_longitude, $coupon_info->latitude, $coupon_info->longitude) <= $search_bar_coupon_distance) return true;
		return false;
	}
	
	echo json_encode ($array_of_coupons_after_search);
?>
