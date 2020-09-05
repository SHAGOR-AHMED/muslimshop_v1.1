
<div class="privacy py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>P</span>ayment</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">
			<!--Horizontal Tab-->
			<div id="parentHorizontalTab">
				<ul class="resp-tabs-list hor_1">
					<li>Payment Method</li>
				</ul>
				<div class="resp-tabs-container hor_1">
					<div>
						<div class="vertical_post">
							<form action="<?= base_url('Checkout/Confirm_Order');?>" method="post">
							
								<div class="row">
									<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div id="content">
											<h3>Cart Details(<?php echo $this->cart->total_items();?>)</h3>

											<div class="checkout wrapper no-margin">
												<div class="cart-info table-responsive">
													<table class="table table-bordered table-hover">
														<thead>
															<tr>
																<td class="image">Image</td>
																<td class="name">Product Name</td>
																<td class="price">Price</td>
																<td class="quantity">Quantity</td>
																<td class="total">Total</td>
															</tr>
														</thead>
														<tbody>
															<?php
																$contents = $this->cart->contents();
																foreach ($contents as $value){
															?>
															
															<tr>
																<td class="image" data-label="Image">
																	<img src="<?= base_url($value['image']);?>" alt="<?= $value['name'];?>" title="<?= $value['name'];?>" height="80px" width="50px" />
																</td>
																<td class="name" data-label="Product Name">
																	<?= $value['name'];?><br>
																	<div class="cart-option"></div>
																</td>
																<td class="price" data-label="Unit Price"  >
																	<?= $value['price'];?> TK
																</td>
																<td class="quantity" data-label="Quantity" >
																	<input type="number" name="qty" value="<?php print $value['qty'];?>" disabled>
																		&nbsp;
																</td>
																<td class="total" data-label="Total">
																	<?php
																		$TotalPrice = $value['price']*$value['qty'];
																		echo $TotalPrice.' Tk';
																	?>
																</td>
																<input type="hidden" name="id" value="<?php print $value['id'];?>">
															</tr>
															<?php } ?>	
														</tbody>
													</table>
												</div>
												
												<style type="text/css">
													#total tr td{
														padding-bottom: 20px;
													}
												</style>
											  
												<div class="row"> 
													<div class="col-lg-9 col-md-9"></div>
													<div class="col-lg-3 col-md-3">
														<div class="cart-total clearfix">
															<table id="total">
																<tr>
																	<td class="right">Subtotal:&nbsp;</td>
																	<td></td>
																	<td class="pull-right">
																		<?= $this->cart->total();?> TK
																	</td>
																</tr>
																<tr>
																	<td class="right">Total:&nbsp;</td>
																	<td></td>
																	<td class="pull-right">
																		<?php
																			$g_total = $this->cart->total();
																			$sdata = array();
																			$sdata['g_total'] = $g_total;
																			$this->session->set_userdata($sdata);
																			echo $g_total.' TK';
																		?>
																	</td>
																</tr>
															</table>
														</div>
													</div>      
												</div>
												
											</div>	
										</div>  
									</section> 
								</div>
								
								<h5>Select Payment Method</h5>
								<div class="swit-radio">
									<div class="check_box_one">
										<div class="radio_one">
											<label>
												<input type="radio" name="payment" value="cash">
												<i></i>Cash On Delivery</label>
										</div>
									</div>
									<div class="check_box_one">
										<div class="radio_one">
											<label>
												<input type="radio" name="payment" value="bkash">
												<i></i>bKash</label>
										</div>
									</div>
									<div class="check_box_one">
										<div class="radio_one">
											<label>
												<input type="radio" name="payment" value="cheque">
												<i></i>By Cheque</label>
										</div>
									</div>
									<div class="clearfix"></div>
								</div>
									
								<input type="submit" name="submit" value="PLACE ORDER">
							</form>
						</div>
					</div>
				</div>
			</div>
			<!--Plug-in Initialisation-->
		</div>
	</div>
</div>