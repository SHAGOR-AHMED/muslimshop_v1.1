
<!-- checkout page -->
<div class="privacy py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>C</span>heckout
		</h3>
		<!-- //tittle heading -->
		<div class="checkout-right">
			<h4 class="mb-sm-4 mb-3">Login or sign up below:
			</h4>
			<?php
	            $message = $this->session->userdata('message');
	            if (isset($message)) {
	                echo '<div class="alert alert-danger">' . $message . "</div>";
	                $this->session->unset_userdata('message');
	            }
	        ?>
			<form action="<?= base_url('checkout/login_customer');?>" method="post" class="creditly-card-form agileinfo_form">
				<div class="creditly-wrapper wthree, w3_agileits_wrapper">
					<div class="information-wrapper">
						<div class="first-row">
							<div class="controls form-group">
								<input class="billing-address-name form-control" type="email" name="email_address" placeholder="Your Email Address" required="">
							</div>
							
							<div class="controls form-group">
								<input type="password" class="form-control" placeholder="Enter your password" name="password" required="">
							</div>
						</div>
						<button class="submit check_out btn" type="submit" name="login">Login</button>
					</div>
				</div>
			</form>
		</div>
		
		<div class="checkout-left">
			<div class="address_form_agile mt-sm-5 mt-4">
				<h4 class="mb-sm-4 mb-3">I don't have any Account. Buy as a Guest</h4>
				<?php
					if($this->session->userdata('message')){

						$message=$this->session->userdata('message');
						print '<span style="color:green;font-size:18px;margin:10px;">'.$message.'</span>';
						$this->session->unset_userdata('message');
					}
				?>
				<?php 
					if (validation_errors()) {
                ?>
                    <div class="alert alert-danger">
                        <?php
                        echo validation_errors();
                        ?>
                    </div>

                <?php } ?>
				<form id="userReg" action="<?= base_url('checkout/save_customer');?>" method="post" class="creditly-card-form agileinfo_form">
					<div class="creditly-wrapper wthree, w3_agileits_wrapper">
						<div class="information-wrapper">
							<div class="first-row">
								<div class="controls form-group">
									<input class="billing-address-name form-control" type="text" name="firstname" placeholder="First Name" required="">
								</div>

								<div class="controls form-group">
									<input class="billing-address-name form-control" type="text" name="lastname" placeholder="Last Name" required="">
								</div>
								
								<div class="controls form-group">
									<input type="email" class="form-control" placeholder="Email" name="email_address" required="">
								</div>

								<div class="controls form-group">
									<input type="password" class="form-control" placeholder="Password" name="password" required="">
								</div>

								<div class="controls form-group">
									<input type="password" class="form-control" placeholder="Confirm Password" name="con_password" required="">
								</div>

								<div class="controls form-group">
									<textarea name="address" class="form-control" placeholder="Address" required></textarea>
								</div>

								<div class="controls form-group">
									<input type="number" class="form-control" placeholder="Mobile Number" name="mobile_no" required="">
								</div>

								<div class="controls form-group">
									<select name="country" id="country" class="option-w3ls">
                                        <option value="">Select Country</option>
                                        <?php getAllCountryList(); ?>
                                    </select>
								</div>

								<div class="controls form-group">
									<input type="text" value="" name="area" class="form-control" placeholder="Area" required>
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

<script type="text/javascript">
    $(document).ready(function () {

        $('#country').change(function () {

            $.get("<?php echo base_url()?>super_admin/getStateByCountryId/" + this.value, function (data, status) {
                $('#district').html(data);
            });

        });

    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#userReg').validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                email_address: {
                    required: true,
                    email: true
                },
                address: {
                    required: true
                },
                mobile_no: {
                    required: true
                },
                zip_code: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                con_password: {
                    required: true,
                    equalTo: "#password"
                }

            }
        });

    });
    
</script>
