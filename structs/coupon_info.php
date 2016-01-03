<?php
	class CouponInfo {
		public $coupon_id;
		public $business_id;
		public $name;
		public $description;
		public $category;
		public $offered_quantity;
		public $quantity_sold;
		public $discount_price;
		public $original_price;
		public $experation_date;
		public $rating;
		public $number_of_ratings;
		public $latitude;
		public $longitude;
		
		function __construct($row) {
			$this->coupon_id = $row['coupon_id'];
			$this->business_id = $row['business_id'];
			$this->name = $row['coupon_name'];
			$this->description = $row['description'];
			$this->category = $row['category'];
			$this->offered_quantity = $row['offered_quantity'];
			$this->quantity_sold = $row['quantity_sold'];
			$this->discount_price = $row['discount_price'];
			$this->original_price = $row['original_price'];
			$this->experation_date = $row['expiration_date'];
			$this->rating = $row['rating'];
			$this->number_of_ratings = $row['number_of_ratings'];
			$this->latitude = $row['location_latitude'];
			$this->longitude = $row['location_longitude'];
		}
		
		public function __toString() {
            return "Coupon id: " . $this->coupon_id;
    	}
	}
?>