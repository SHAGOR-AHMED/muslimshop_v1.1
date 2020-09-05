<!-- top-header -->
<div class="agile-main-top">
	<div class="container-fluid">
		<div class="row main-top-w3l py-2">
			<div class="col-lg-4 header-most-top">
				<p class="text-white text-lg-left text-center">
					<?php
						$MerchantID = $this->session->userdata('merchant_id');
						$MerchantName = $this->session->userdata('merchant_name');
						if(!empty($MerchantID)){ ?>

							Hello <b><a href="<?= base_url('Merchant/');?>" style="color:#fff !important;"><?php echo $this->session->userdata('merchant_name'); ?> </a></b>

					<?php }else{
							echo '';
						}
					?>
				</p>
			</div>
			<div class="col-lg-8 header-right mt-lg-0 mt-2">
				<!-- header lists -->
				<ul>
					<li class="text-center border-right text-white">
						<i class="fa fa-phone mr-2"></i> 09-611677070
					</li>

					<?php
						$MerchantID = $this->session->userdata('merchant_id');
						$MerchantName = $this->session->userdata('merchant_name');
						if(!empty($MerchantID)){ ?>

							<li class="text-center border-right text-white">
								<a href="<?= base_url('Merchant/logout');?>" class="text-white">
									<i class="fas fa-sign-in-alt mr-2"></i>Merchant Logout </a>
							</li>

					<?php }else{ ?>

						<li class="text-center border-right text-white">
							<a href="#" data-toggle="modal" data-target="#exampleModal" class="text-white">
								<i class="fas fa-sign-in-alt mr-2"></i>Merchant Login </a>
						</li>

					<?php } ?>
				</ul>
				<!-- //header lists -->
			</div>
		</div>
	</div>
</div>
<!-- //top-header -->

<?php include('model.php'); ?>

<!-- header-bottom-->
<div class="header-bot">
	<div class="container">
		<div class="row header-bot_inner_wthreeinfo_header_mid">
			<!-- logo -->
			<div class="col-md-3 logo_agile">
				<a href="<?= base_url('Welcome/');?>" class="font-weight-bold font-italic">
					<img src="<?= base_url('assets/frontend/');?>images/logo2.png" alt=" " class="img-responsive">
				</a>
			</div>
			<!-- //logo -->
			<!-- header-bot -->
			<div class="col-md-9 header mt-4 mb-md-0 mb-4">
				<div class="row">
					<!-- search -->
					<div class="col-10 agileits_search">
						<form class="form-inline" action="<?= base_url('Welcome/SearchProduct');?>" method="post">
							<input class="form-control mr-sm-2" type="search" name="key_word" placeholder="Search" aria-label="Search" required>
							<button class="btn my-2 my-sm-0" type="submit">Search</button>
						</form>
					</div>
					<!-- //search -->
					<!-- cart details -->
					<div class="col-2 top_nav_right text-center mt-sm-0 mt-2">
						<div class="wthreecartaits wthreecartaits2 cart cart box_1">
							<form action="<?= base_url('show_cart');?>" method="post" class="last">
								<button class="btn w3view-cart" type="submit" name="submit" value="">
									<i class="fa fa-cart-arrow-down"></i>
								</button>
							</form>
						</div>
					</div>
					<!-- //cart details -->
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //header-bottom -->