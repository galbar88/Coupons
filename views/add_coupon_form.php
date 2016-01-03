<?php	
	include_once ('./structs/constants.php');
	
	function print_add_coupon_form ($category, $business_id, $action) {

		echo '<form role="form" action="' . $action .'" method="POST">

			<div class="form-group">
			<label for="coupon_name">coupon Name: </label>
			<input type="name" class="form-control" id="coupon_name" name="coupon_name" required>
			
			<label for="coupon_description">coupon Description: </label>
			<textarea rows="3" class="form-control" id="coupon_description" name="coupon_description" required></textarea>
			
			<input type="hidden" name="coupon_category" value="' . $category . '">
			<input type="hidden" name="coupon_business_id" value="' . $business_id . '">
			
			<label for="coupon_offered_quantity">Offered Quantity: </label>
			<input type="number" class="form-control" id="coupon_offered_quantity" name="coupon_offered_quantity" required>
			
			<label for="coupon_discount_price">Discount Price: </label>
			<input type="number" class="form-control" id="coupon_discount_price" name="coupon_discount_price" required>
			
			<label for="coupon_original_price">Original Price: </label>
			<input type="coupon_latitude" class="form-control" id="coupon_original_price" name="coupon_original_price" required>
			
			<label for="coupon_expiration_date">Expiration Date: </label>
			<input type="date" class="form-control" id="coupon_expiration_date" name="coupon_expiration_date" required>
			</div>

			<div class="form-group">
			<button type="submit" class="btn btn-default">Submit</button>
			</div>
			</form>
	';
    }
?>


