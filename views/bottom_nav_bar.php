<?php
	function print_bottom_nav_bar ($section, $is_logged_in) {
    $location_notification_web_service = "http://coupons.zz.mu/3/services/location_notification.php";
    
	global $connected_user_name, $connected_user_role;

echo '
<nav class="navbar navbar-fixed-top navbar-inverse">'; 
//LOCATION NOTIFICATIONS
echo '
  <div class="container-fluid">
    <div class="navbar-body" id="myNavbar2">
      <ul class="nav navbar-nav">';

      echo '<li id="notification_center"><a id="notification_link" onclick="go_to_nearby_coupons()" href="#">Notifications:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="notification"></span></a></li>
                  </ul>
        ';    
    echo '
  </div>
</nav>';        
                     
     echo ' <script>
        var pos;
        var num_of_notifications;
        if (navigator.geolocation) {
				document.getElementById("notification").innerHTML="<small>connecting to notification center..</small>";
		    navigator.geolocation.getCurrentPosition(show_notification_center);
		    }
        
        function go_to_nearby_coupons(){
          if (num_of_notifications>0) window.location.assign("index.php?section=home&sub_section=search&search_bar_coupon_distance=3&user_location_latitude=" + pos.coords.latitude + "&user_location_longitude=" + pos.coords.longitude);
        }

      function show_notification_center(position) {
				pos = position;
        var xmlhttp = new XMLHttpRequest();
        var url = "'; 
        echo $location_notification_web_service;
        echo '" + "?distance=3&lat=" + position.coords.latitude + "&long=" + position.coords.longitude;
        
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var myArr = JSON.parse(xmlhttp.responseText);
                num_of_notifications=myArr.length;
                document.getElementById("notification").innerHTML="<span class=badge>" + myArr.length + "</span> Coupons nearby";
            }
        }
  
        xmlhttp.open("GET", url, true);
        xmlhttp.send();
      }
    </script>';

echo '
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand">Coupons</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li '; if ($section === "home") echo 'class="active"';
		echo '><a href="index.php?section=home">Home</a></li>';
		if ($is_logged_in) {	
			echo '	
			<li '; if ($section === "MyCoupons") echo 'class="active"';
			echo '><a href="index.php?section=MyCoupons">My Coupons</a></li>';
			}
		  	//COUPON CONFIRMATION
        if ($section === "purchase_confirmation") echo '<li class="active"><a>Buy Coupon</a></li>';

      


      //RIGHT SIDE
      echo '</ul>';     
      
    if (!$is_logged_in){					//NOT LOGGED IN
        echo '<ul class="nav navbar-nav navbar-right">
        <li><a href="#" data-toggle="modal" data-target="#signupModal"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        ';
    } else {							//LOGGED IN
        echo '<ul class="nav navbar-nav navbar-right">';
        if ($connected_user_role == "admin")  {
      		echo '<li><a href="admin-index.php?section=bussiness&sub_section=show_edit_gallery">Go to Admin Panel <span class="glyphicon glyphicon-king"></span></a></li>';
      	} else if ($connected_user_role == "manager") {
      		echo '<li><a href="manager-index.php?section=bussinesses">Go to Manager Panel <span class="glyphicon glyphicon-knight"></span></a></li>';
        }
        echo '
        <li><a href="#">Connected as: ' . $connected_user_name . '</span></a></li>
        <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-in"></span></a></li>
        </ul>
        ';
    }
    

    
    echo '
    </div>
  </div>
</nav>';

    echo '        <!-- Login Modal -->
    <div id="loginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Login</h4>
    </div>
    <div class="modal-body">';
	include_once ('views/login_form.php');
	print_login_form();
	echo '
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    
    </div>
    </div>
    ';
    
    include_once ('views/signup_form.php');
    echo '        <!-- Signup Modal -->
    <div id="signupModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Signup</h4>
    </div>
    
    <div class="modal-body">';
	
	print_signup_form();
    
    echo '    
    </div>
    </div>
    </div>
    </div>
    ';
	}
?>