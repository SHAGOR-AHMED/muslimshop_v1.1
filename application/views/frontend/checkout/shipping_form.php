
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>C</span>heckout
		</h3>
		<!-- //tittle heading -->
		
		<div class="checkout-left">
			<div class="address_form_agile mt-sm-5 mt-4">
				<h4 class="mb-sm-4 mb-3">Shipping Information >>> </h4>
				<?php
					if($this->session->userdata('message')){

						$message=$this->session->userdata('message');
						print '<span style="color:green;font-size:18px;margin:10px;">'.$message.'</span>';
						$this->session->unset_userdata('message');
					}
				?>
				<form action="<?= base_url('Checkout/save_shipping');?>" method="post" >
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<p>
                            <div class="alert alert-success">Your Information</div>
                            <p>
                                <?php
                                    echo $this->session->userdata('name').'<br>';
                                    echo $this->session->userdata('email_address').'<br>';
                                    echo $this->session->userdata('mobile_no').'<br>';
                                ?>
                            </p>
                        </p>
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls form-group">
									<input class="billing-address-name form-control" type="text" name="name" placeholder="Full Name" required="">
								</div>
								
								<div class="controls form-group">
									<input type="email" class="form-control" placeholder="Email" name="email" required="">
								</div>

								<div class="controls form-group">
									<input type="number" class="form-control" placeholder="Mobile Number" name="phone" required="">
								</div>

								<div class="controls form-group">
									<textarea name="address" class="form-control" placeholder="Address" required></textarea>
								</div>
							</div>
							<button class="submit check_out btn">Submit & Continue</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //checkout page -->