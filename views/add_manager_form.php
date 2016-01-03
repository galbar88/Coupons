<?php	
	
	function print_add_manager_form ($feedback_message) {
		echo $feedback_message;
		echo '<form role="form" action="admin-index.php?section=manager&sub_section=add_action" method="POST">

			<div class="form-group">
			<label for="manager_name">Manager First Name: </label>
			<input type="name" class="form-control" id="manager_name" name="manager_first_name">
			
			<label for="manager_name">Manager Last Name: </label>
			<input type="name" class="form-control" id="manager_name" name="manager_last_name">
			
			<label for="manager_email">Manager eMail: </label>
			<input type="mail" class="form-control" id="manager_email" name="manager_email">
			
			<label for="manager_phone">Manager Phone Number: </label>
			<input type="number" class="form-control" id="manager_phone" name="manager_phone">
			</div>
			
			<div class="form-group">
			<label for="manager_username">Manager User Name: </label>
			<input type="name" class="form-control" id="manager_username" name="manager_username">
			
			<label for="manager_password">Manager Password: </label>
			<input type="password" class="form-control" id="manager_password" name="manager_password">
			</div>
			
			<div class="form-group">
			<button type="submit" class="btn btn-default">Submit</button>
			</div>
			</form>
	';
    }
?>


