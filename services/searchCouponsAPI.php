<?php
	include_once ('../model/coupon_logic.php');
	
	$answer_array = Array();
	$answer_array["status"] = "success";
	$answer_array["failReason"] = "";
	
	$array_of_coupons_after_search = search_all_coupons();
		
	$search_bar_coupon_distance = 55; $search_bar_coupon_distance_bool = false;
	$user_location_longitude = -1;
	$user_location_latitude = -1;

	
	if (array_key_exists('search_bar_coupon_name', $_GET))	{
		$search_bar_coupon_name = $_GET["search_bar_coupon_name"]; 
	}
	if (array_key_exists('search_bar_coupon_distance', $_GET))	{ 
		$search_bar_coupon_distance = $_GET["search_bar_coupon_distance"];
		if ($search_bar_coupon_distance != "55") $search_bar_coupon_distance_bool = true;
	}
	if ($search_bar_coupon_distance_bool && array_key_exists('user_location_latitude', $_GET))	{ 
		$user_location_latitude = $_GET["user_location_latitude"];
	}
	if ($search_bar_coupon_distance_bool && array_key_exists('user_location_longitude', $_GET))	{ 
		$user_location_longitude = $_GET["user_location_longitude"];
	}
	
	$answer_array["coupons"] = $array_of_coupons_after_search;
	
	echo json_encode ($answer_array);
?>


<?php
	function handle() {
		include_once ('model/coupon_logic.php');
		global $search_bar_coupon_name, $search_bar_coupon_category, $search_bar_coupon_name_bool, $search_bar_coupon_category_bool, $array_of_coupons_after_search;
		global $search_bar_coupon_distance, $search_bar_coupon_distance_bool;
		global $user_location_longitude;
		global $user_location_latitude;



		if ($search_bar_coupon_name_bool) {
			$array_of_coupons_after_search = search_coupons_by_name($search_bar_coupon_name);
			if ($search_bar_coupon_distance_bool) {
				$array_of_coupons_after_search = array_values(array_filter($array_of_coupons_after_search, "filter_by_loc"));
			}
		} else if ($search_bar_coupon_distance_bool) {
			$array_of_coupons_after_search = array_values(array_filter($array_of_coupons_after_search, "filter_by_loc"));
		}
		

	}
	
	
	
	function filter_by_loc($coupon_info) {
		global $search_bar_coupon_distance, $search_bar_coupon_distance_bool;
		global $user_location_longitude;
		global $user_location_latitude;
		
		if (!$search_bar_coupon_distance_bool) return true; 
		if (distance($user_location_latitude, $user_location_longitude, $coupon_info->latitude, $coupon_info->longitude) <= $search_bar_coupon_distance) return true;
		return false;
	}
?>


<?php

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
/*::                                                                         :*/
/*::  This routine calculates the distance between two points (given the     :*/
/*::  latitude/longitude of those points). It is being used to calculate     :*/
/*::  the distance between two locations using GeoDataSource(TM) Products    :*/
/*::                                                                         :*/
/*::  Definitions:                                                           :*/
/*::    South latitudes are negative, east longitudes are positive           :*/
/*::                                                                         :*/
/*::  Passed to function:                                                    :*/
/*::    lat1, lon1 = Latitude and Longitude of point 1 (in decimal degrees)  :*/
/*::    lat2, lon2 = Latitude and Longitude of point 2 (in decimal degrees)  :*/
/*::    unit = the unit you desire for results                               :*/
/*::           where: 'M' is statute miles (default)                         :*/
/*::                  'K' is kilometers                                      :*/
/*::                  'N' is nautical miles                                  :*/
/*::  Worldwide cities and other features databases with latitude longitude  :*/
/*::  are available at http://www.geodatasource.com                          :*/
/*::                                                                         :*/
/*::  For enquiries, please contact sales@geodatasource.com                  :*/
/*::                                                                         :*/
/*::  Official Web site: http://www.geodatasource.com                        :*/
/*::                                                                         :*/
/*::         GeoDataSource.com (C) All Rights Reserved 2015		   		     :*/
/*::                                                                         :*/
/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
function distance($lat1, $lon1, $lat2, $lon2) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
	return ($miles * 1.609344);
}


?>