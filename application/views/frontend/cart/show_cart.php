<section id="columns" class="offcanvas-siderbars">
	<div id="breadcrumb">
		<ol class="breadcrumb container">
			<li><a href=""><span>Shopping Cart</span></a></li>
		</ol>
	</div>
	
	<div class="container">
		<div class="row">
			<section class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="content">
					<h3>My Cart(<?php echo $totalItem = $this->cart->total_items();?>)</h3>

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
								        //$id = $this->cart->total_items();
								    ?>
									
									<tr>
										<td class="image" data-label="Image">
											<img src="<?= base_url($value['image']);?>" height="80px" width="50px" />
										</td>
										<td class="name" data-label="Product Name">
											<?= $value['name'];?><br>
											<a href="<?php print base_url('remove/'.$value['rowid']);?>">
												<img src="<?= base_url('assets/front/images/remove.png');?>" alt="Remove" title="Remove" />
											</a>
											<div class="cart-option"></div>
										</td>

										<td class="price" data-label="Unit Price"  >
											<?= $value['price'];?> TK
										</td>
											
										<td class="quantity" data-label="Quantity" >
											<form action="<?= base_url('Add_cart/Update_cart/'.$value['rowid']);?>" method="post">
												<input type="number" name="qty" value="<?php print $value['qty'];?>" >
												&nbsp;
												<button type="submit" class="btn btn-default">Update</button>
											</form>
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
					  
						<div class="row">
							<div  class="col-lg-9 col-md-9">  
								<div class="buttons clearfix">
									<div class="center pull-left" style="padding-right: 10px;">
										<?php 
											$customer_id = $this->session->userdata('customer_id');
											$shipping_id = $this->session->userdata('shipping_id');

											if($totalItem == 0){ ?>

												<a href="#" onclick="return confirm('Your cart is empty !!!');">
													<button type="submit" class="btn btn-success"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</button>
												</a>

											<?php }else{ 

												if($customer_id != NULL && $shipping_id == NULL){ ?>
													<a href="<?= base_url('Checkout/Shipping_form');?>">
														<button type="submit" class="btn btn-success"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</button>
													</a>
												<?php }else if( $customer_id != NULL && $shipping_id != NULL){?> 
														<a href="<?= base_url('Checkout/Payment_form');?>">
															<button type="submit" class="btn btn-success"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</button>
														</a>
												<?php }else{ ?>
														<a href="<?= base_url('Checkout/index');?>">
															<button type="submit" class="btn btn-success"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> Checkout</button>
														</a>
												<?php }

											}

										?>
									</div>

									<div class="center pull-left"
									style="padding-right: 10px;">
										<a href="<?php print base_url('add_cart/remove_item');?>">
											<button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Remove All</button>
										</a>
									</div>

									<div class="center pull-left">
										<a href="<?= base_url('/');?>">
											<button type="submit" class="btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i> Continue Shopping</button>
										</a>
									</div>
								</div>
							</div>

							<style type="text/css">
								#total tr td{
									padding-bottom: 20px;
								}
							</style>
							
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
										<tr style="border-bottom: 1px solid #000;">
											<td class="right">Shipping Bangladesh:&nbsp;</td>
											<td></td>
											<td class="pull-right">
												FREE
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
													echo $g_total.' tk';
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
	</div>
</section>
<hr>