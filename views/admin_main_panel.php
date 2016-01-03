<?php
include ('coupon_view.php');
include_once ('./structs/coupon_info.php');

function print_add_business($array_of_all_managers, $feedback_message){
	include_once ('add_business_form.php');
	print_add_business_form($array_of_all_managers, $feedback_message, "admin-index.php?section=bussiness&sub_section=add_action");
}

function print_add_manager($feedback_message){
	include_once ('add_manager_form.php');
	print_add_manager_form($feedback_message);
}

function print_business_gallery_to_main_section($array_of_business_info, $feedback_message){
	include_once ('management_gallery.php');
	print_business_gallery (10, $array_of_business_info, 0);
}

function print_business_edit_to_main_section($business_info, $feedback_message){
	include_once ('management_gallery.php');
	print_single_business_in_galley ($business_info);
}

function print_manager_gallery_to_main_section ($array_of_manager_info, $feedback_message) {
	include_once ('management_gallery.php');
	print_manager_gallery (10, $array_of_manager_info, 0);
}

function print_manager_details_to_main_section($manager_info, $feedback_message){
	include_once ('management_gallery.php');
	print_single_manager_in_galley ($manager_info);
}

?>