<?php
	include_once ('./structs/coupon_info.php');

	class Business_view{
		var $business_info;
		var $view_id;
		
		function __construct($business_info, $view_id) {
			$this->business_info = $business_info;
			$this->view_id = $view_id;
		}
		
		function print_to_gallery($is_admin, $div_class) {
			if ($is_admin) {
				    echo '
						<div class="' . $div_class . '">
							<a class="thumbnail" style="background-color:White">
							<p><h3><center>' . $this->business_info->name . '</center></h3></p>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal' . $this->view_id . '">Delete</button>
							
							<button type="button" class="btn btn-info pull-right" onclick="window.location.href=\'admin-index.php?section=bussiness&sub_section=show_edit_item&item_for_edit=';
							echo $this->business_info->business_id;
							echo '\'">Edit</button>
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
					        <p>Are you sure you want to delete <i>' .$this->business_info->name. '</i>?</p>
					      </div>
					      <div class="modal-footer">
						  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href=\'admin-index.php?section=bussiness&sub_section=delete_action&item_for_edit=';
							echo $this->business_info->business_id;
							echo '\'">Delete</button>
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					      </div>
					    </div>
					
					  </div>
					</div>
					';
			}
		}
		
		
		function print_to_entire_main_section_for_edit() {
			echo '<h2> Editing Business:<i> ' . $this->business_info->name . '</i></h2>
				<form role="form" action="admin-index.php?section=bussiness&sub_section=edit_action&item_for_edit=' . $this->business_info->business_id . '" method="POST">

					<div class="form-group">
					<label for="business_name">Business Name: </label>
					<input type="name" class="form-control" id="business_name" name="business_name" value="' . $this->business_info->name . '">
			
					<label for="business_address">Business Address: </label>
					<input type="business_address" class="form-control" id="business_address" name="business_address" value="' . $this->business_info->name . '">
			
					<label for="business_city">Business City: </label>
					<input type="business_city" class="form-control" id="business_city" name="business_city" value="' . $this->business_info->address . '">
			
					<label for="longitude">Business Longitude: </label>
					<input type="longitude" class="form-control" id="longitude" name="longitude" value="' . $this->business_info->location_longitude . '">
			
					<label for="business_latitude">Business Latitude: </label>
					<input type="business_latitude" class="form-control" id="business_latitude" name="latitude" value="' . $this->business_info->location_latitude . '">
					</div>
					
					<div class="form-group">
					<button type="submit" class="btn btn-default">Submit</button>
					</div>
				</form>
				';
		}
		
		function print_to_entire_main_section_for_manager_view() {
			echo '<h2> Business details:<i> ' . $this->business_info->name . '</i></h2>
				<div class="panel panel-default">
				<div class="panel-body">Address: ' . $this->business_info->address . '</div>
				<div class="panel-body">City: ' . $this->business_info->city . ' </div>
				</div>
				<div class="panel panel-default">
				<div class="panel-body">Category: ' . $this->business_info->category . ' </div>
				<div class="panel-body">Geographic Location: ' . $this->business_info->location_latitude . '/'. $this->business_info->location_longitude . ' </div>
				</div>
				<div class="panel panel-default">
				<div class="panel-body"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal' . $this->view_id . '">Delete</button></div>
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
					        <p>Are you sure you want to delete <i>' .$this->business_info->name. '</i>?</p>
					      </div>
					      <div class="modal-footer">
						  <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href=\'manager-index.php?section=bussinesses&sub_section=delete_action&item_for_edit=';
							echo $this->business_info->business_id;
							echo '\'">Delete</button>
					        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					      </div>
					    </div>
					
					  </div>
					</div>
					';
				
		}
	}
	
	

	
	

?>
<!--
"http://coupons.zz.mu/3/admin-index.php?section=bussiness&sub_section=edit&item_for_edit=';
							echo $this->business_info->business_id;
							echo '" -->