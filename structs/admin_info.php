<?php
	class AdminInfo{
		public $admin_username;
		
		function __construct($row) {
			$this->admin_username = $row['admin_username'];
		}
		
		public function __toString() {
            return "Admin username: " . $this->admin_username;
    	}
	}
?>