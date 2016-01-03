<?php
	include_once ('./structs/coupon_info.php');

	class Coupon_view{
		var $coupon_info;
		var $view_id;
		var $is_sold_out;
		
		function __construct($coupon_info, $view_id) {
			$this->coupon_info = $coupon_info;
			$this->view_id = $view_id;
			$this->is_sold_out = $this->coupon_info->quantity_sold >= $this->coupon_info->offered_quantity;
		}
		
		function print_to_gallery($is_connected, $div_class) { 
				    echo '
						<div class="' . $div_class . '">
							<a href="#" data-toggle="modal" data-target="#' . $this->view_id . '" class="thumbnail" style="background-color:White">
							<p><h3>' . $this->coupon_info->name . '</h3><br>Original Price: ' . $this->coupon_info->original_price . '<br>Discount Price: ' . $this->coupon_info->discount_price . '</p>
							<img src="images/image1.PNG" alt="' . $this->coupon_info->name .'" style="width:150px;height:150px">
							</a>
						</div>
						' .
						' 
						<div id="' . $this->view_id . '" class="modal fade" role="dialog">
							<div class="modal-dialog container">
							
							<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Buy Coupon: ' . $this->coupon_info->name . '</h4>
									</div>
									<div class="modal-body">
										<img src="images/image1.PNG" alt="' . $this->coupon_info->name .'" style="width:150px;height:150px">
										<p style="display:inline">' . $this->coupon_info->description . '<br>Original Price: ' . $this->coupon_info->original_price . '<br>Discount Price: ' . $this->coupon_info->discount_price . '</p>
									</div>
									<div class="modal-footer">
										';
										if ($this->is_sold_out) echo '<button class="btn btn-danger">Sold Out</button>';
										else if ($is_connected) echo '<button onclick="location.href=\'index.php?section=purchase_confirmation&item='. $this->coupon_info->coupon_id .'\'" class="btn btn-primary">Buy!</button>';
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
						<img src="images/image1.PNG" alt="' . $this->coupon_info->name .'" style="width:250px;height:250px">
					</div>
					<div class="col-sm-6">
						<p><h2>' . $this->coupon_info->name . '</h2><br>
						Original Price: ' . $this->coupon_info->original_price .'<br>
						Discount Price: ' . $this->coupon_info->discount_price .'<br>
						Description: ' .$this->coupon_info->description . '
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p>original price: ' . $this->coupon_info->original_price . '<br>
						Quantity Left: ' . ($this->coupon_info->offered_quantity - $this->coupon_info->quantity_sold) .'<br>
						Rating: ' .$this->coupon_info->rating . '
						</p>
					</div>
				</div>
				';
		}
	}
?>