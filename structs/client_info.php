<?php
	class ClientInfo {
		public $client_username;
		public $password;
		public $first_name;
		public $last_name;
		public $email;
		public $phone_number;
		public $gender_is_male;
		public $date_of_birth;
		public $array_of_interests;
		public $array_of_preferences;
		
		function __construct($row, $array_of_interests, $array_of_preferences) {
			$this->client_username = $row['client_username'];
			$this->password = $row['password'];
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->email = $row['email'];
			$this->phone_number = $row['phone_number'];
			$this->gender_is_male = $row['gender_is_male'];
			$this->date_of_birth = $row['date_of_birth'];
			$this->array_of_interests = $array_of_interests;
			$this->array_of_preferences = $array_of_preferences;
		}
		
		public function __toString() {
            return "Client username: " . $this->client_username;
    	}
	}
?>