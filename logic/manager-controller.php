
<?php
	include_once ('model/session_manager.php');
	include_once ('model/business_logic.php'); 
?>

<?php
function current_manager_bussinesses ($connected_user_name) {
	return search_business_by_manager_user_name($connected_user_name);
}

function handle(){
	global $section, $sub_section, $feedback_message, $item_for_edit, $connected_user_name;
	
	/*WORKS!!!!!!!!!!!!!!!!!*/
	if ($section === "bussinesses" &&	$sub_section === "add_action" && $_SERVER["REQUEST_METHOD"] == "POST") {
		include_once ('model/business_logic.php');
		$manager_username = $connected_user_name;
		$location_latitude = $_POST["latitude"]	;
		$location_longitude = $_POST["longitude"]	;
		$category = $_POST["category"];
		$name = $_POST["business_name"];
		$address = $_POST["business_address"];
		$city = $_POST["business_city"]	;
		if ($manager_username != "" & $location_latitude != "" & $location_longitude != "" & $category != "" & $name != "" & $address != "" & $city != "") {
			add_business($manager_username, $location_latitude, $location_longitude, $category, $name, $address, $city);
			$feedback_message = '<span class="label label-success">'. $name . ' Added Successfully</span>';
		} else {
			$feedback_message = '<span class="label label-warning">All Fields Must Be Entered</span>';
		}
		$sub_section = "show_edit_gallery";
	} 
	
		/*WORKS!!!!!!!!!!!!!!!!!*/
	else if ($section === "coupons" &&	$sub_section === "add_action" && $_SERVER["REQUEST_METHOD"] == "POST") {
		include_once ('model/coupon_logic.php');
		
		$business_id = $_POST["coupon_business_id"];
		$name = $_POST["coupon_name"];
		$description = $_POST["coupon_description"];
		$category = $_POST["coupon_category"];
		$offered_quantity = $_POST["coupon_offered_quantity"];
		$discount_price = $_POST["coupon_discount_price"];
		$original_price = $_POST["coupon_original_price"];
		$expiration_date = $_POST["coupon_expiration_date"];
		
		if ($business_id != "" & $name != "" & $description != "" & $category != "" & $offered_quantity != "" & $discount_price != "" & $original_price != "" & $expiration_date != "" ) {
			add_coupon($business_id, $name, $description, $category, $offered_quantity, $discount_price, $original_price, $expiration_date);
			$feedback_message = '<span class="label label-success">'. $firstname . " " . $lastname . ' Added Successfully</span>';

		} else {
			$feedback_message = '<span class="label label-warning">All Fields Must Be Entered</span>';
		}
		
		$sub_section = "view";
	} 
	
	else if ($section === "coupons" &&	$sub_section === "delete_action") {
		include_once ('model/coupon_logic.php');
		delete_coupon($item_for_edit);
		$feedback_message = '<span class="label label-success">'. $name . ' Deleted Successfully</span>';
		$sub_section = "";
		$item_for_edit =="";
	} 
	
	
	/*WORKS!!!!!!!!!!!!*/
	else if ($section === "bussinesses" & $sub_section === "delete_action") {
		include_once ('model/business_logic.php');
		include_once ('model/coupon_logic.php');
		delete_business($item_for_edit);
		$feedback_message = '<span class="label label-success">'. $name . ' Deleted Successfully</span>';
		$sub_section = "";
		$item_for_edit =="";
	} 
	
		else if ($section === "manager" & $sub_section === "delete_action") {
		include_once ('model/business_logic.php');
		delete_manager($item_for_edit);
		$feedback_message = '<span class="label label-success">'. $name . ' Deleted Successfully</span>';
		$item_for_edit =="";
		$sub_section = "";
	} 

}

?>