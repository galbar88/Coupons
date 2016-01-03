<?php
	function print_signup_success() {
		echo '<div class="container-fluid">
		  	<h2> Signup Successful. You we be redirected in a moment</h2>
				<script> window.setTimeout(function(){
				window.location.href = "index.php";
				}, 1500); </script>
		  	</div>
		  	';
	}
	
	function print_signup_fail() {
	include_once ('signup_form.php');
	
		echo '
		  <div class="container-fluid">
		  	<h2> Signup <small><span class="label label-danger">signup attempt failed</span></small> </h2>
		  	';
		  	print_signup_form();
		  	echo '
		</div>
		';
	}

?>