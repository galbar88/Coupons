<!--	CONTROLLER VARS	-->
<?php
	include_once ('model/coupon_logic.php');
	include_once ('model/session_manager.php');

?>

<?php
	function handle() {
		global $search_bar_coupon_name, $search_bar_coupon_category, $search_bar_coupon_name_bool, $search_bar_coupon_category_bool, $array_of_coupons_after_search;
		global $section, $sub_section, $item;
		global $search_bar_coupon_distance, $search_bar_coupon_distance_bool;
		global $user_location_longitude;
		global $user_location_latitude;
		global $connected_user_name;

		if ($section == "home" && $sub_section == "search") {
			if ($search_bar_coupon_name_bool) {
				$array_of_coupons_after_search = search_coupons_by_name($search_bar_coupon_name);
				if ($search_bar_coupon_category_bool) {
					$array_of_coupons_after_search = array_values(array_filter($array_of_coupons_after_search, "filter_by_cat"));
				}
				if ($search_bar_coupon_distance_bool) {
					$array_of_coupons_after_search = array_values(array_filter($array_of_coupons_after_search, "filter_by_loc"));
				}
			} else if ($search_bar_coupon_category_bool) {
				$array_of_coupons_after_search = search_coupons_by_category($search_bar_coupon_category);
				if ($search_bar_coupon_distance_bool) {
					$array_of_coupons_after_search = array_values(array_filter($array_of_coupons_after_search, "filter_by_loc"));
				}
			} else if ($search_bar_coupon_distance_bool) {
				$array_of_coupons_after_search = array_values(array_filter($array_of_coupons_after_search, "filter_by_loc"));
			}
		} else if ($section == "purchase_confirmation" && $item != "") {
			client_buy_coupon($connected_user_name, $item);			
		} else if ($section == "MyCoupons") {
			if ($sub_section == "unused") {
				$array_of_coupons_after_search = search_coupons_by_user_unused($connected_user_name);
			} else {
				$array_of_coupons_after_search = search_coupons_by_user($connected_user_name);
			}
		}
	}
	
	
	function filter_by_cat($coupon_info) {
		global $search_bar_coupon_category, $search_bar_coupon_category_bool;
		if (!$search_bar_coupon_category_bool) return true; 
		if ($coupon_info->category == $search_bar_coupon_category) return true;
		return false;
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