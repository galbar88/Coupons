<?php
	function print_admin_left_bar ($section, $sub_section) {
		if ($section === "bussiness") {
		echo '
			<ul class="nav nav-pills nav-stacked">';
			  
			  if ($sub_section == "show_edit_item") {
				echo '
				<li> <a href="admin-index.php?section=bussiness&sub_section=show_edit_gallery"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></li>';
			  } else {
					echo '
					<li'; 
					if ($sub_section == "show_edit_gallery") echo ' class="active"';
					echo '><a href="admin-index.php?section=bussiness&sub_section=show_edit_gallery">Edit or Delete a Bussiness <span class="glyphicon glyphicon-th pull-right"></span></a></li>';
					
					echo '
					<li'; 
					if ($sub_section == "show_add_form") echo ' class="active"';
					echo '><a href="admin-index.php?section=bussiness&sub_section=show_add_form">Add a Bussiness <span class="glyphicon glyphicon-plus pull-right"></span></a></li>';
			  }
			  	echo '
				</ul>
				'; 
		}
		
		if ($section === "manager") {
			echo '
			<ul class="nav nav-pills nav-stacked">';
			  if ($sub_section == "show_item_details") {
				echo '
				<li> <a href="admin-index.php?section=manager&sub_section=show_edit_gallery"><span class="glyphicon glyphicon-chevron-left"></span> Back</a></li>';
			  } else {
			  echo '<li'; 
			  if ($sub_section === "show_edit_gallery") echo ' class="active"';
			  echo '><a href="admin-index.php?section=manager&sub_section=show_edit_gallery">View or Delete a Manager <span class="glyphicon glyphicon-th pull-right"></span></a></li>';
			  
			  echo '<li'; 
			  if ($sub_section === "show_add_form") echo ' class="active"';
			  echo '><a href="admin-index.php?section=manager&sub_section=show_add_form">Add a Manager <span class="glyphicon glyphicon-plus pull-right"></span></a></li>';
			  }
			
			echo '</ul>
			';
		}
		
	}
	
?>

