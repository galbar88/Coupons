<?php
	include_once ('./structs/manager_info.php');

	class Manager_view{
		var $manager_info;
		var $view_id;
		
		function __construct($manager_info, $view_id) {
			$this->manager_info = $manager_info;
			$this->view_id = $view_id;
		}
		
		function print_to_gallery($is_admin, $div_class) {
			if ($is_admin) {
				    echo '
						<div class="' . $div_class . '">
							<a class="thumbnail" style="background-color:White">
							<p><h3><center>' . $this->manager_info->manager_username . '</center></h3>'.$this->manager_info->first_name.' '.$this->manager_info->last_name.'</p>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal' . $this->view_id . '">Delete</button>
							
							<button type="button" class="btn btn-info pull-right" onclick="window.location.href=\'admin-index.php?section=manager&sub_section=show_item_details&item_for_edit=';
							echo $this->manager_info->manager_username;
							echo '\'">View Details</button>
							</a>
						</div>
						';
						
					echo '
					<div id="Modal' . $this->view_id .'" class="modal fade" role="dialog">
					  <div class="modal-dialog">
					
					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Confirm delete</h4>
					      </div>
					      <div class="modal-body">
					        <p>Are you sure you want to delete <i>' .$this->manager_info->name. '</i>?</p>
					      </div>
					      <div class="modal-footer">
						  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href=\'admin-index.php?section=manager&sub_section=delete_action&item_for_edit=';
							echo $this->manager_info->manager_username;
							echo '\'">Delete</button>
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					      </div>
					    </div>
					
					  </div>
					</div>
					';
			}
		}
		
		
		function print_to_entire_main_section() {
			echo '<h2> Manager details:<i> ' . $this->manager_info->manager_username . '</i></h2>
				<div class="panel panel-default">
				<div class="panel-body">First name: ' . $this->manager_info->first_name . '</div>
				<div class="panel-body">Last name: ' . $this->manager_info->last_name . ' </div>
				</div>
				<div class="panel panel-default">
				<div class="panel-body">eMail: ' . $this->manager_info->email . ' </div>
				<div class="panel-body">Phone Number: ' . $this->manager_info->phone_number . ' </div>
				</div>
				';
		}
	}
	
	

?>
<!--
"http://coupons.zz.mu/3/admin-index.php?section=bussiness&sub_section=edit&item_for_edit=';
							echo $this->business_info->business_id;
							echo '" -->