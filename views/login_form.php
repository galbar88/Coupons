<?php
	function print_login_form () {
		global $username_err, $password_err;
		global $username, $password;
	
	echo '<form role="form" action="login.php" method="POST">
		<input type="hidden" name="section" value="login">

		<div class="form-group">
		<label for="username">Username: <span class="label label-warning">' . $username_err . '</span></label>
		<input type="username" class="form-control" id="username" name="username" value="' . $username .'">
		<label for="pwd">Password: <span class="label label-warning">' . $password_err . '</span></label>
		<input type="password" class="form-control" id="pwd" name="password" value="' . $password .'">
		</div>
		
		<div class="form-group">
		<button type="submit" class="btn btn-default">Login</button>
		</div>
		</form>
    ';
    }
?>