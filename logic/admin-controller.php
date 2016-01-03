
<!--	CONTROLLER VARS	-->
<?php
	include_once ('model/session_manager.php');
	include_once ('model/business_logic.php');
?>

<?php
function handle(){
	global $section, $sub_section, $feedback_message, $item_for_edit;
	if ($section === "bussiness" &&	$sub_section === "add_action" && $_SERVER["REQUEST_METHOD"] == "POST") {
		include_once ('model/business_logic.php');
		$manager_username = $_POST["manager"];
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
	
	else if ($section === "manager" &&	$sub_section === "add_action" && $_SERVER["REQUEST_METHOD"] == "POST") {
		include_once ('model/business_logic.php');
		$firstname = $_POST["manager_first_name"];
		$lastname = $_POST["manager_last_name"];
		$email = $_POST["manager_email"];
		$phonenumber = $_POST["manager_phone"];
		$username = $_POST["manager_username"];
		$password = $_POST["manager_password"];
		
		if ($firstname != "" &$lastname != "" &$email != "" &$phonenumber != "" &$username != "" &$password != "") {
			register_manager($firstname, $lastname, $email, $phonenumber, $username, $password);
			$feedback_message = '<span class="label label-success">'. $firstname . " " . $lastname . ' Added Successfully</span>';

		} else {
			$feedback_message = '<span class="label label-warning">All Fields Must Be Entered</span>';
		}
		
		$sub_section = "show_edit_gallery";
	} 
	
	else if ($section === "bussiness" &&	$sub_section === "edit_action" && $_SERVER["REQUEST_METHOD"] == "POST") {
		include_once ('model/business_logic.php');
		$location_latitude = $_POST["latitude"]	;
		$location_longitude = $_POST["longitude"]	;
		$name = $_POST["business_name"];
		$address = $_POST["business_address"];
		$city = $_POST["business_city"]	;
		$old_item = search_business_by_id($item_for_edit);
		if ($location_latitude != "" & $location_longitude != "" & $name != "" & $address != "" & $city != "") {
			edit_business($item_for_edit, $old_item->manager_username, $location_latitude, $location_longitude, $old_item->category, $name, $address, $city);
			$feedback_message = '<span class="label label-success">'. $name . ' Edited Successfully</span>';

		} else {
			$feedback_message = '<span class="label label-warning">All Fields Must Be Entered</span>';
		}
		$sub_section = "show_edit_gallery";


	} 
	
	else if ($section === "bussiness" & $sub_section === "delete_action") {
		include_once ('model/business_logic.php');
		delete_business($item_for_edit);
		$feedback_message = '<span class="label label-success">'. $name . ' Deleted Successfully</span>';
		$item_for_edit =="";
		$sub_section = "show_edit_gallery";
	} 
	
		else if ($section === "manager" & $sub_section === "delete_action") {
		include_once ('model/business_logic.php');
		delete_manager($item_for_edit);
		$feedback_message = '<span class="label label-success">'. $name . ' Deleted Successfully</span>';
		$item_for_edit =="";
		$sub_section = "show_edit_gallery";
	} 

}
?>