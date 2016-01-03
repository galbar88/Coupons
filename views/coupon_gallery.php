<?php
include_once ('coupon_view.php');
include_once ('deal_view.php');
include_once ('./structs/coupon_info.php');
include_once ('./structs/deal_info.php');

function print_coupon_gallery ($number_of_lines, $array_of_coupon_info, $starting_coupon_index, $is_connected) {
	echo '<h3 style="text-align:center">Coupon Gallery</h3>';
	$number_of_lines = ceil (min($number_of_lines, ((count($array_of_coupon_info) - $starting_coupon_index) / 4)));
	echo '<div class="container-fluid">';
	for ($row = 0; $row < $number_of_lines; $row++) {
		echo '<div class="row">';
		for ($col = 0; $col < 4; $col++) {
			if (count($array_of_coupon_info) > $starting_coupon_index) {
				$coupon_view_to_print = new Coupon_view($array_of_coupon_info[$starting_coupon_index], "coupon_view_in_gallery" . $starting_coupon_index);	
				$coupon_view_to_print->print_to_gallery($is_connected, "col-lg-3 col-sm-6 col-xs=12");
				$starting_coupon_index++;
			}
		}
		echo '</div>';
	}
	echo '</div>';
}


function print_deal_gallery ($number_of_lines, $array_of_deal_info, $starting_deal_index) {
	$sorted_array_off_deal_info = array();
	$number_of_unused_coupons = 0;
	foreach ($array_of_deal_info as $deal_info){
		if (!$deal_info->is_realized) {
			array_push($sorted_array_off_deal_info, $deal_info);
			$number_of_unused_coupons++;
		}
	}
	$number_of_all_coupons = $number_of_unused_coupons;
	foreach ($array_of_deal_info as $deal_info){
		if ($deal_info->is_realized) {
			array_push($sorted_array_off_deal_info, $deal_info);
			$number_of_all_coupons++;
		}
	}
 
	echo '<h3 style="text-align:center">My Coupons
	<button type="button" onclick="switch_used_deals()" id="used_switch_button" class="btn btn-primary pull-right">
	Show
	<span id="unused_and_used_switch_number" class="badge">'. $number_of_unused_coupons .'</span>
	<span id="unused_switch_number" class="badge">' . $number_of_all_coupons . '</span>
	<span  id="used_switch_text"></span>
	</button>
	</h3>
	';

	$number_of_lines = ceil (min($number_of_lines, ((count($sorted_array_off_deal_info) - $starting_deal_index) / 4)));
	echo '<div class="container-fluid">';
	for ($row = 0; $row < $number_of_lines; $row++) {
		echo '<div class="row">';
		for ($col = 0; $col < 4; $col++) {
			if (count($sorted_array_off_deal_info) > $starting_deal_index) {
				$deal_view_to_print = new Deal_view($sorted_array_off_deal_info[$starting_deal_index], "deal_view_in_gallery" . $starting_deal_index);	
				$deal_view_to_print->print_to_gallery("col-lg-3 col-sm-6 col-xs=12");
				$starting_deal_index++;
			}
		}
		echo '</div>';
	}
	
	echo '</div>';
	
	
	echo '
		<script>
		var showing_used_deals = true;
		switch_used_deals();
		function switch_used_deals() {
			if (showing_used_deals) {
				document.getElementById("used_switch_text").innerHTML="used Coupons";
				showing_used_deals = false;
				var x = document.getElementsByClassName("realized_showing");
				while (x.length > 0) {
					for (i = 0; i < x.length; i++) {
						x[i].className = "realized_not_showing hidden";
					}
					x = document.getElementsByClassName("realized_showing");
				}
				document.getElementById("unused_and_used_switch_number").className="hidden";
				document.getElementById("unused_switch_number").className="badge";
			} else {
				document.getElementById("used_switch_text").innerHTML="unused Coupons";
				showing_used_deals = true;
				var x = document.getElementsByClassName("realized_not_showing hidden");
				while (x.length >0) {
					for (i = 0; i < x.length; i++) {
						x[i].className = "realized_showing";
					}
					x = document.getElementsByClassName("realized_not_showing hidden");
				}
				document.getElementById("unused_and_used_switch_number").className="badge";
				document.getElementById("unused_switch_number").className="hidden";
			}
			
		}
	</script>
	';
	
	
}

function print_single_coupon_in_galley($array_of_coupon_info) {
	echo '<div class="container-fluid">';
	$coupon_view_to_print = new Coupon_view($array_of_coupon_info[0], "single_coupon_view_in_gallery", true);	
	$coupon_view_to_print->print_to_entire_main_section();
	echo '</div>';
}


?>