<?php
	include_once ('./structs/constants.php');
	function print_search_bar ($section) {
		global $search_bar_coupon_name;
		global $search_bar_coupon_category;
		global $search_bar_coupon_distance, $user_location_latitude, $user_location_longitude;
		$categories = get_categories();
		echo '
		<form role="form" action="index.php" method="GET">
		<h3 style="text-align:center">Search Coupons</h3>
		<div class="form-group">
		<label for="name">Coupon name:</label>
		<input name="search_bar_coupon_name" type="text" class="form-control" id="name"';
		if ($search_bar_coupon_name == "Search By Coupon Name") echo 'placeholder="Search By Coupon Name">';
		else echo 'value="' . $search_bar_coupon_name . '">';
		echo ' 
			  <label for="Categories">Categories:</label>
			  <select class="form-control"  name="search_bar_coupon_category" id="Categories">
			  <option value="all">All</option>';
			  foreach ($categories as $cat) {
				echo '
				<option value="' . $cat .'" ';
				if ($cat==$search_bar_coupon_category) echo 'selected';
				echo '>' . $cat . '</option>
				';
				}
			  echo '</select>';
			
		echo '
		</div>

		<div class="form-group">';
		if ($search_bar_coupon_distance == 55) echo '<label for="name"><span id="range">Distance: Everywhere</span></label>';
		else echo '<label for="name"><span id="range">Distance: '.$search_bar_coupon_distance.' km</span></label>';
		echo'
		<input id="slider"  class="form-control" type="range" min="1" max="55" value="'.$search_bar_coupon_distance.'" step="1" onchange="showValue(this.value)" name="search_bar_coupon_distance"/>

		</div>
		
		<div class="form-group">
		<button id="submit_button" type="submit" class="btn btn-default">Search</button>
		<input type="hidden" name="section" value="'. $section .'" />
		<input type="hidden" name="sub_section" value="search" />
		<input id="user_location_latitude" type="hidden" name="user_location_latitude" value="'. $user_location_latitude .'" />
		<input id="user_location_longitude" type="hidden" name="user_location_longitude" value="'. $user_location_longitude .'" />
		</div>
		</form>
		';
		
		echo '
		<script type="text/javascript">
			var set = false;
		
			function showValue(newValue)
			{
				document.getElementById("range").innerHTML="Distance: ".concat(newValue.concat(" km"));
				if (newValue==55) document.getElementById("range").innerHTML="Distance: Everywhere";
				else if (!set) {
					getLocation();
					set = true;
				}
			}
			
			function getLocation() {
			    if (navigator.geolocation) {
					document.getElementById("submit_button").disabled=true;
					document.getElementById("submit_button").innerHTML="Getting Location...";					
			        navigator.geolocation.getCurrentPosition(showPosition);
			    } else { 
					document.getElementById("slider").value=55;
					window.alert("You must give location permissions for location based search");
			    }
			}
			
			function showPosition(position) {
				document.getElementById("user_location_latitude").value = position.coords.latitude;			
				document.getElementById("user_location_longitude").value = position.coords.longitude;
				document.getElementById("submit_button").disabled=false;
				document.getElementById("submit_button").innerHTML="Submit";
			}
		</script>
		
		
		';		
	}
?>