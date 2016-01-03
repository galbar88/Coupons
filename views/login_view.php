<?php
	function print_login_success() {
		echo '<div class="container-fluid">
		  	<h2> Login Successful. You we be redirected in a moment</h2>
				<script> window.setTimeout(function(){
				window.location.href = "index.php";
				}, 1500); </script>
		  	</div>
		  	';
	}
	
	function print_login_fail() {
	include_once ('login_form.php');
	
		echo '
		  <div class="container-fluid">
		  	<h2> Login <small><span class="label label-danger">login attempt failed</span></small> </h2>
		  	';
		  	print_login_form();
		  	echo '
		</div>
		';
	}

?>