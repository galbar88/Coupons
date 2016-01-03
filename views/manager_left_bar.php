<?php
	function print_admin_left_bar ($section, $sub_section, $array_of_manager_businesses) {

		if ($section === "bussinesses") {
		echo '
			<ul class="nav nav-pills nav-stacked">
			  <li  class="dropdown"';
			  if ($sub_section == "view") echo 'class="active"';
			  echo '><a class="dropdown-toggle" data-toggle="dropdown" href="#">My Businesses
			    <span class="caret"></span></a>
			    <ul class="dropdown-menu">';
				foreach ($array_of_manager_businesses as $business) {
					echo '<li><a href="manager-index.php?section=bussinesses&sub_section=view&item_for_edit=' . $business->business_id . '">' . $business->name . '</a></li>';
					
				}
				echo '
			    </ul>
			  </li>
			  <li';
			  if ($sub_section == "add_form") echo ' class="active"'; 
			  echo '><a href="manager-index.php?section=bussinesses&sub_section=add_form">Add Business <span class="glyphicon glyphicon-plus pull-right"></span></a></li>
			</ul>
		'; 
		}
		
		global $item_for_edit;
		$current_business = "My Businesses";
		foreach ($array_of_manager_businesses as $business) {
			if ($sub_section === "view" && $business->business_id == $item_for_edit) $current_business = $business->name;
		}
		
		if ($section === "coupons") {
			echo '
			<ul class="nav nav-pills nav-stacked">
			  <li  class="dropdown';
			  if ($sub_section == "view") echo ' active';
			  echo '"><a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $current_business .'
			    <span class="caret"></span></a>
			    <ul class="dropdown-menu">';
				foreach ($array_of_manager_businesses as $business) {
					echo '<li><a href="manager-index.php?section=coupons&sub_section=view&item_for_edit=' . $business->business_id . '">' . $business->name . '</a></li>';
				}
				echo '
			    </ul>
			  </li>';

			  if ($item_for_edit !== "") {
				  echo '
					  <li';
					  if ($sub_section == "add_form") echo ' class="active"'; 
					  echo '><a href="manager-index.php?section=coupons&sub_section=add_form&item_for_edit='. $item_for_edit .'">Add Coupon <span class="glyphicon glyphicon-plus pull-right"></span></a></li>
				  ';
			  }
			  echo '
			</ul>';
		}
		
	}
	
?>

