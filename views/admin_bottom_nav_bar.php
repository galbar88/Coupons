<?php
	function print_bottom_nav_bar ($section, $is_logged_in) {
	global $connected_user_name;
echo '<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand">Sections</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">';
        
        echo '<li '; if ($section === "bussiness") echo 'class="active"';
		echo '><a href="admin-index.php?section=bussiness&sub_section=show_edit_gallery">Bussiness Management</a></li>';
		
		echo '<li '; if ($section === "manager") echo 'class="active"';
		echo '><a href="admin-index.php?section=manager&sub_section=show_edit_gallery">Manager Management</a></li>';
		
    
      	echo '</ul>';
        echo '<ul class="nav navbar-nav navbar-right">
        <li><a href="#">Connected as: ' . $connected_user_name . '</span></a></li>
        <li><a href="logout.php">Logout <span class="glyphicon glyphicon-log-in"></span></a></li>
        </ul>
        ';   

    
    echo '
    </div>
  </div>
</nav>';
	}
?>