<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Coupons::Loging out...</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=0.9">

</head>

<body id="main_body" >
<?php
	include_once ('../model/coupon_logic.php');
	$username = $_GET["username"];
	$deal_sn = $_GET["deal_sn"];
	$deal_info = seach_deal_by_sn($deal_sn);
	
	if ($deal_info->is_realized) {
			echo '<h1><center>Fail!</center></h1>
			<p><center>Coupon was already used!</center></p>';
	} else {
		if (array_key_exists('username', $_GET)){
			client_use_coupon($username, $deal_sn);
			echo '
				<script> window.setTimeout(function(){
						window.location.href = "http://coupons.zz.mu/3/index.php";
						}, 2000); </script>
			
				<h1><center>Success</center></h1>
				<p><center>You are being redirected...</center></p>
			';
		} else {
			echo '
			<div class="container-fluid">
				<form action="client_uses_coupon.php" method="GET">
					<div class="form-group">
					<label for="username">Confirm username: </label>
					<input class="form-control" type="text" name="username" id="username"></input>
					<input type="hidden" name="deal_sn" value="'.$deal_sn .'"></input>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
			';
		}	
	}
	
	

	
?>
</body>
</html>



