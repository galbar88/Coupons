<?php
include ('business_view.php');
include_once ('./structs/coupon_info.php');

function print_view_business($business_info, $feedback_message) {
	$business_view = new Business_view($business_info, "Single_view");
	$business_view->print_to_entire_main_section_for_manager_view();
}


function print_add_business($current_manager, $feedback_message){
	include_once ('add_business_form.php');
	print_add_business_form(array($current_manager), $feedback_message, "manager-index.php?section=bussinesses&sub_section=add_action");
}


function print_view_coupons_in_business($business_info, $array_of_coupons){
	echo '
		<div class="container-fluid">
		  <h2>Coupons offered at ' . $business_info->name . '</h2>
			<table class="table table-hover">
		    <thead>
		      <tr>
		        <th>Name</th>
		        <th>Description</th>
		        <th>Offered Quantity</th>
		        <th>Quantity Sold</th>
				<th>Discount Price</th>
				<th>Original Price</th>
				<th>Experation Date</th>
				<th>Rating</th>
				<th>Options</th>
		      </tr>
		    </thead>
		    <tbody>
	';
	$i = 0;
	foreach($array_of_coupons as $coupon_info) {
		echo '
			<tr>
				<td>'. $coupon_info->name .'</td>
				<td>'. $coupon_info->description .'</td>
				<td>'. $coupon_info->offered_quantity .'</td>
				<td>'. $coupon_info->quantity_sold .'</td>
				<td>'. $coupon_info->discount_price .'</td>
				<td>'. $coupon_info->original_price .'</td>
				<td>'. $coupon_info->experation_date .'</td>
				<td>'. $coupon_info->rating .'</td>
				<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal' . $i . '">Delete</button></td>
			</tr>
		';
		
		echo '
					<div id="Modal' . $i .'" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Confirm delete</h4>
					      </div>
					      <div class="modal-body">
					        <p>Are you sure you want to delete <i>' .$coupon_info->name. '</i>?</p>
					      </div>
					      <div class="modal-footer">
						  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href=\'manager-index.php?section=coupons&sub_section=delete_action&item_for_edit=';
							echo $coupon_info->coupon_id;
							echo '\'">Delete</button>
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					      </div>
					    </div>
					
					  </div>
					</div>
					';
		$i++;
	}
	echo '
		</tbody>
		</table>
		</div>
	';
}


function print_add_coupon_form_to_main_section($business_info) {
	include_once ('add_coupon_form.php');
	echo '<h2>Add Coupon to ' . $business_info->name . '</h2>';
	print_add_coupon_form($business_info->category, $business_info->business_id, "manager-index.php?section=coupons&sub_section=add_action&item_for_edit=" . $business_info->business_id);
}

?>