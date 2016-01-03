<?php
	class ManagerInfo{
		public $manager_username;
		public $password;
		public $first_name;
		public $last_name;
		public $email;
		public $phone_number;
		
		function __construct($row) {
			$this->manager_username = $row['manager_username'];
			$this->password = $row['password'];
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->email = $row['email'];
			$this->phone_number = $row['phone_number'];
		}
		
		public function __toString() {
            return "Manager username: " . $this->manager_username;
    	}
	}
?>