<?php
	function print_signup_form() {
		global $firstname_err, $lastname_err, $email_err, $phonenumber_err, $date_of_birth_err, $username_err, $password_err, $gender_err;
		global $firstname, $lastname, $email, $phonenumber, $date_of_birth, $username, $password, $interests, $gender;
		
		echo '<form role="form" action="signup.php" method="POST">

				<div class="form-group">
				<label for="firstname">First Name: <span class="label label-warning">' . $firstname_err . '</span></label>
				<input type="firstname" class="form-control" id="firstname" name="firstname" value="' . $firstname .'">
				<label for="lastname">Last Name: <span class="label label-warning">' . $lastname_err . '</span></label>
				<input type="lastname" class="form-control" id="lastname" name="lastname" value="' . $lastname .'">

				<label for="email">eMail: <span class="label label-warning">' . $email_err . '</span></label>
				<input type="email" class="form-control" id="email" name="email" value="' . $email .'">
				<label for="phonenumber">Phone Number: <span class="label label-warning">' . $phonenumber_err . '</span></label>
				<input type="phonenumber" class="form-control" id="phonenumber" name="phonenumber" value="' . $phonenumber .'">



				<label for="dob">Date of birth: <span class="label label-warning">' . $date_of_birth_err . '</span></label>
				<div class="input-group date" id="datetimepicker1">
				<input type="date" class="form-control" name="date_of_birth"/ value="' . $date_of_birth .'">
				<span class="input-group-addon">
				<span class="glyphicon glyphicon-calendar"></span>
				</span>
				</div>


				</div>
				<div class="form-group">
				<label for="username">Username: <span class="label label-warning">' . $username_err . '</span></label>
				<input type="username" class="form-control" id="username" name="username" value="' . $username .'">
				<label for="pwd">Password: <span class="label label-warning">' . $password_err . '</span></label>
				<input type="password" class="form-control" id="pwd" name="password" value="' . $password .'">
				</div>

				<div class="form-group">
				<label for="interests">Interests:</label><br />
				<label class="checkbox-inline"><input type="checkbox" value="Sports" name="interests[]"';
				if (IsChecked("interests", "Sports")) {
					echo 'checked';
				}
				echo '>Sports</label>
				
				<label class="checkbox-inline"><input type="checkbox" value="Music" name="interests[]"';
				if (IsChecked("interests", "Music")) {
					echo 'checked';
				}
				echo '>Music</label>
				
				<label class="checkbox-inline"><input type="checkbox" value="Food" name="interests[]"';
				if (IsChecked("interests", "Food")) {
					echo 'checked';
				}
				echo '>Food</label>
				
				<label class="checkbox-inline"><input type="checkbox" value="Books" name="interests[]"';
				if (IsChecked("interests", "Books")) {
					echo 'checked';
				}
				echo '>Books</label>
				</div>

				<div class="form-group">
				<label for="interests">Gender:  <span class="label label-warning">' . $gender_err . '</span></label><br />
				<label class="radio-inline"><input type="radio" name="gender" value="Male"';
				if ($gender == "Male") echo 'checked';
				echo '>Male</label>
				<label class="radio-inline"><input type="radio" name="gender" value="Female"';
				if ($gender == "Female") echo 'checked';
				echo '>Female</label>
				</div>

				<div class="form-group">
				<button type="submit" class="btn btn-default">Submit</button>
				</div>
				</form>
		';
	}
	

	function IsChecked($chkname,$value)
		{
			if(!empty($_POST[$chkname]))
			{
				foreach($_POST[$chkname] as $chkval)
				{
					if($chkval == $value)
					{
						return true;
					}
				}
			}
			return false;
		}
?>