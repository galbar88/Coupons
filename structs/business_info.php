<?php
	class BusinessInfo {
		public $business_id;
		public $manager_username;
		public $location_latitude;
		public $location_longitude;
		public $category;
		public $name;
		public $address;
		public $city;
		
		function __construct($row) {
			$this->business_id = $row['business_id'];
			$this->manager_username = $row['manager_username'];
			$this->location_latitude = $row['location_latitude'];
			$this->location_longitude = $row['location_longitude'];
			$this->category = $row['category'];
			$this->name = $row['name'];
			$this->address = $row['address'];
			$this->city = $row['city'];
		}
		
		public function __toString() {
            return "Business id: " . $this->business_id;
    	}
	}
?>