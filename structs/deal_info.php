<?php
	class DealInfo {
		public $deal_sn;
		public $date_of_deal;
		public $is_realized;
		public $coupon_id;
		public $client_username;
		public $coupon_name;
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
			$this->deal_sn = $row['deal_sn'];
			$this->date_of_deal = $row['date'];
			$this->is_realized = $row['is_realized'];
			$this->coupon_id = $row['coupon_id'];
			$this->client_username = $row['client_username'];
			$this->coupon_id = $row['coupon_id'];
			$this->business_id = $row['business_id'];
			$this->business_name = $row['name'];
			$this->coupon_name = $row['coupon_name'];
			$this->description = $row['description'];
			$this->category = $row['category'];
			$this->offered_quantity = $row['offered_quantity'];
			$this->quantity_sold = $row['quantity_sold'];
			$this->discount_price = $row['discount_price'];
			$this->original_price = $row['original_price'];
			$this->experation_date = $row['experation_date'];
			$this->rating = $row['rating'];
			$this->number_of_ratings = $row['number_of_ratings'];
			$this->latitude = $row['location_latitude'];
			$this->longitude = $row['location_longitude'];
		}
		
		public function __toString() {
            return "Deal serial number: " . $this->deal_sn;
    	}
	}
?>