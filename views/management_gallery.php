<?php
include ('business_view.php');
include ('manager_view.php');
include_once ('./structs/coupon_info.php');

function print_business_gallery ($number_of_lines, $array_of_business_info, $starting_business_index) {
	$number_of_lines = ceil (min($number_of_lines, ((count($array_of_business_info) - $starting_business_index) / 4)));
	echo '<div class="container-fluid">';
	for ($row = 0; $row < $number_of_lines; $row++) {
		echo '<div class="row">';
		for ($col = 0; $col < 4; $col++) {
			if (count($array_of_business_info) > $starting_business_index) {
				$business_view_to_print = new Business_view($array_of_business_info[$starting_business_index], "business_view_in_gallery" . $starting_business_index);	
				$business_view_to_print->print_to_gallery(true, "col-lg-3 col-sm-6 col-xs=12");
				$starting_business_index++;
			}
		}
		echo '</div>';
	}
	echo '</div>';
}

function print_single_business_in_galley($business_info) {
	echo '<div class="container-fluid">';
	$business_view_to_print = new Business_view($business_info, "single_coupon_view_in_gallery");	
	$business_view_to_print->print_to_entire_main_section_for_edit();
	echo '</div>';
}

function print_manager_gallery ($number_of_lines, $array_of_manager_info, $starting_manager_index) {
	$number_of_lines = ceil (min($number_of_lines, ((count($array_of_manager_info) - $starting_manager_index) / 4)));
	echo '<div class="container-fluid">';
	for ($row = 0; $row < $number_of_lines; $row++) {
		echo '<div class="row">';
		for ($col = 0; $col < 4; $col++) {
			if (count($array_of_manager_info) > $starting_manager_index) {
				$manager_view_to_print = new Manager_view($array_of_manager_info[$starting_manager_index], "manager_view_in_gallery" . $starting_manager_index);	
				$manager_view_to_print->print_to_gallery(true, "col-lg-3 col-sm-6 col-xs=12");
				$starting_manager_index++;
			}
		}
		echo '</div>';
	}
	echo '</div>';
}


function print_single_manager_in_galley($manager_info) {
	echo '<div class="container-fluid">';
	$manager_view_to_print = new Manager_view($manager_info, "single_coupon_view_in_gallery");	
	$manager_view_to_print->print_to_entire_main_section();
	echo '</div>';
}

?>