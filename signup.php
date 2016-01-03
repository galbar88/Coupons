<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Coupons::Signup</title>

<style>
.jumbotron {
	background-color: lavender;
    padding: 0.2em 0.2em;
    h1 {
        font-size: 2em;
    }
    p {
        font-size: 1.0em;
        .btn {
            padding: 0.2em;
        }
    }
}

body {
    background-color: lavender;
    padding-bottom: 70px;
	padding-top: 40px;
    
}
</style>



</head>

<body id="main_body" >

<!--	CONTROLLER VARS	-->
<?php	
	if ($_SERVER["REQUEST_METHOD"] != "POST") {	//case tried to access file in a wrong way
		die ('<script>window.location.assign("index.php")</script>');
	}
	
	$firstname_err = $lastname_err = $email_err = $phonenumber_err = $date_of_birth_err = $username_err = $password_err = $gender_err = "";
	
	$firstname = $_POST["firstname"];
	$lastname = $_POST["lastname"];
	$email = $_POST["email"];
	$phonenumber = $_POST["phonenumber"];
	$date_of_birth = $_POST["date_of_birth"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$interests = $_POST["interests"];
	$gender = $_POST["gender"];

	include_once ('logic/signup-controller.php');

	if (array_key_exists('section', $_GET))	$section = $_GET["section"];
	if (array_key_exists('section', $_POST)) $section = $_POST["section"];
?>

<!--	JUMBOTRON	-->
<div class="jumbotron">
  <h1 class="text-center">Coupons <small>I wish I had lots of money</small></h1>
</div>

<!--	MAIN SECTION	-->
<div class="container-fluid">
    <!--	NAV BAR	-->
    <?php
		include('views/bottom_nav_bar.php');
		print_bottom_nav_bar($section, $is_logged_in);
	?>
    
    <div class="row">
        <!--LEFT SEARCH BAR-->
        <div class="col-md-2" style="background-color:lavender;">

        </div>
        
        <!--CENTRAL SECTION-->
        <div class="col-md-10" style="background-color:lightsky;">
			<?php
				include_once ('views/signup_view.php'); 
				if ($validFields) {
					print_signup_success();
				} else {
					print_signup_fail();
				}
            ?>
        </div>
    </div>
</div>
</body>
</html>
