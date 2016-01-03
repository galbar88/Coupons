<?php	
	include_once ('./structs/constants.php');
	
	function print_add_business_form ($array_of_all_managers, $feedback_message, $action) {
		$categories = get_categories();
		echo $feedback_message;
		echo '<form role="form" action="' . $action .'" method="POST">

			<div class="form-group">
			<label for="business_name">Business Name: </label>
			<input type="name" class="form-control" id="business_name" name="business_name">
			
			<label for="business_address">Business Address: </label>
			<input type="business_address" class="form-control" id="business_address" name="business_address">
			
			<label for="business_city">Business City: </label>
			<input type="business_city" class="form-control" id="business_city" name="business_city">
			</div>
			<div class="form-group inline">
			<label for="longitude">Business Longitude: </label>
			<input type="longitude" class="form-control inline" id="business_longitude" name="longitude" readonly value="Press here to get coordinates based on the address and city you entered"  onclick="codeAddress()">
			
			<label for="business_latitude">Business Latitude: </label>
			<input type="business_latitude" class="form-control inline" id="business_latitude" name="latitude" readonly  value="Press here to get coordinates based on the address and city you entered"  onclick="codeAddress()">
			</div>

			<div class="form-group">
			  <label for="Categories">Categories:</label>
			  <select class="form-control"  name="category" id="Categories">';
			  
			  foreach ($categories as $cat) {
				echo '
				<option value="' . $cat .'">' . $cat . '</option>
				';
				}
			  echo '</select>
			</div>';
			
			if (count($array_of_all_managers)>1){
				echo'
					<div class="form-group">
						<label for="manager">Manager:</label>
						<select class="form-control" name="manager" id="manager">';
						
							foreach ($array_of_all_managers as $man) {
							echo '
							<option value="' . $man->manager_username .'">' . $man->manager_username . '</option>
							';
							}
						echo '</select>
					</div>
				
				
				';
			} 
			
	echo '
	<div class="form-group">
	<button type="submit" class="btn btn-default">Submit</button>
	</div>
	</form>
	';
		
	echo '
	    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	    <script>
	        function codeAddress() {
		        var address = document.getElementById("business_address").value;
				var city = document.getElementById("business_city").value;
				address = address +","+ city;
				
				if (address=="") window.alert("You must enter an address!");
				else if (city=="") window.alert("You must enter a city!");
				else {
					document.getElementById("business_longitude").value = "Calculating...";
					document.getElementById("business_latitude").value = "Calculating...";
		        	var geocoder = new google.maps.Geocoder();
		        	geocoder.geocode( { \'address\': address}, function(results, status) {
				        var location = results[0].geometry.location;
						document.getElementById("business_longitude").value = location.lng();
						document.getElementById("business_latitude").value = location.lat();
		        		});
		        	}
				}
	    </script>
	';
				
    }
	

	
	
	/*
	$prepAddr = str_replace(' ','+', "avraham avinu 14 beer sheva");
	$prepAddr = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $prepAddr . '&key=AIzaSyDRp5AmmKyGYB_0dlQ6i07alY4P-zauXaM';
    $geocode=file_get_contents($prepAddr);
	$output= json_decode($geocode);
	echo $output->results[0]->geometry->location->lat;
	*/
?>


