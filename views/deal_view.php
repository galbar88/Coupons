<?php
	include_once ('./structs/deal_info.php');

	class Deal_view{
		var $deal_info;
		var $view_id;
		
		function __construct($deal_info, $view_id) {
			$this->deal_info = $deal_info;
			$this->view_id = $view_id;
		}
		
		
		function print_to_gallery($div_class) { 
					global $connected_user_name;
					$realized = $this->deal_info->is_realized;
				    echo '
						<div class="' . $div_class . '">';
						if ($realized) echo '<div class="realized_showing">';
							echo '
							<a href="#" data-toggle="modal" data-target="#' . $this->view_id . '" class="thumbnail" style="background-color:White">
							<p><h3>' . $this->deal_info->coupon_name . '</h3><br>Bought at: ' . $this->deal_info->business_name . '<br>Buying Price: ' . $this->deal_info->discount_price . '</p>';
							echo '</a>';
						if ($realized) echo '</div>';
						echo '
						</div>
						' .
						' 
						<div id="' . $this->view_id . '" class="modal fade" role="dialog">
							<div class="modal-dialog container">
							
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>';
										if (!$realized) echo '<h4 class="modal-title">Use Coupon: ' . $this->deal_info->coupon_name . '</h4>';
										else echo '<h4 class="modal-title">Used Coupon</h4>';
									echo'
									</div>
									<div class="modal-body">';
										if (!$realized) {
											$qr_api = "https://chart.googleapis.com/chart?cht=qr&chs=150x150&chl=";
											$dir = dirname($_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/services/client_uses_coupon.php?deal_sn=' . $this->deal_info->deal_sn . '&username=' . $connected_user_name;
											$image_src = $qr_api . $dir;
											echo '<img src="'.$image_src.'" alt="' . $this->deal_info->name .'" style="width:150px;height:150px">';
											/*
											$dir = dirname($_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF']) . '/services/client_uses_coupon.php?deal_sn=' . $this->deal_info->deal_sn . '&username=' . $connected_user_name;
											$image_src = 'images/tmp_qr/' . $this->view_id . '.png';
											QRcode::png($dir, $image_src);
											echo '<img src="'.$image_src.'" alt="' . $this->deal_info->name .'" style="width:150px;height:150px">';
											*/
										}

										if (!$realized) { 
										echo '
											<p style="display:inline">' . $this->deal_info->description . '</p>
											<p>Show this coupon code to the salesman to use it</p>
											<p>This coupon is useable at <i> ' . $this->deal_info->business_name . '</i></p>';
										} else {
											echo '<p>You already used this coupon!</p>';
										}
									echo '
									</div>
									<div class="modal-footer">
										';
										if ($this->is_sold_out) echo '<button class="btn btn-danger">Sold Out</button>';
										else if ($is_connected) echo '<button onclick="location.href=\'index.php?section=purchase_confirmation&item='. $this->deal_info->deal_id .'\'" class="btn btn-primary">Buy!</button>';
										echo '
									</div>
								</div>
							</div>
						</div>
						';
			
		}
		
		
		function print_to_entire_main_section() {
			echo '
				<h2>Purchase confirmation</h1>
				<div class="row">
					<div class="col-sm-6">
						<img src="images/image1.PNG" alt="' . $this->deal_info->name .'" style="width:250px;height:250px">
					</div>
					<div class="col-sm-6">
						<p><h2>' . $this->deal_info->name . '</h2><br>
						Original Price: ' . $this->deal_info->original_price .'<br>
						Discount Price: ' . $this->deal_info->discount_price .'<br>
						Description: ' .$this->deal_info->description . '
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p>original price: ' . $this->deal_info->original_price . '<br>
						Quantity Left: ' . ($this->deal_info->offered_quantity - $this->deal_info->quantity_sold) .'<br>
						Rating: ' .$this->deal_info->rating . '
						</p>
					</div>
				</div>
				';
		}
	}
?>