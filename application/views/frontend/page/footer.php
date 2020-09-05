<footer>
	<!-- footer third section -->
	<div class="w3l-middlefooter-sec">
		<div class="container py-md-5 py-sm-4 py-3">
			<div class="row footer-info w3-agileits-info">
				<!-- footer categories -->
				<div class="col-md-3 col-sm-6 footer-grids">
					<h3 class="text-white font-weight-bold mb-3">Vehicals</h3>
					<ul>
						<?php 
							$all_subcategory = $this->db->select('*')->from('subcategory')->where('subcat_catid', 1)->get()->result();
							foreach ($all_subcategory as $subcategories) {
							$SubCatID = $subcategories->subcat_id;
						?>
							<li class="mb-3">
								<a href="<?= base_url('Welcome/ProductBySubID/'.$SubCatID);?>"><span class="span"><?= $subcategories->subcategory ?></span></a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<!-- //footer categories -->
				<!-- quick links -->
				<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
					<h3 class="text-white font-weight-bold mb-3">Quick Links</h3>
					<ul>
						<li class="mb-3">
							<a href="<?= base_url('Welcome/AboutUs');?>">About Us</a>
						</li>
						<li class="mb-3">
							<a href="<?= base_url('Welcome/Contact');?>">Contact Us</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
					<h3 class="text-white font-weight-bold mb-3">Get in Touch</h3>
					<ul>
						<li class="mb-3">
							<i class="fa fa-map-marker"></i> 19/3 kakrail,Dhaka-1000.</li>
						<li class="mb-3">
							<i class="fa fa-phone"></i> 09-611677070 </li>
						<li class="mb-3">
							<i class="fa fa-envelope-open"></i>
							<a href="mailto:info@runbd.net"> info@runbd.net</a>
						</li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
					<!-- social icons -->
					<div class="footer-grids  w3l-socialmk mt-3">
						<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
						<div class="social">
							<ul>
								<li>
									<a class="icon fb" href="#">
										<i class="fa fa-facebook-f"></i>
									</a>
								</li>
								<li>
									<a class="icon tw" href="#">
										<i class="fa fa-twitter"></i>
									</a>
								</li>
								<li>
									<a class="icon gp" href="#">
										<i class="fa fa-google-plus-g"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- //social icons -->
				</div>
			</div>
			<!-- //quick links -->
		</div>
	</div>
	<!-- //footer third section -->

	<!-- footer fourth section -->
	<div class="agile-sometext py-md-5 py-sm-4 py-3">
		<div class="container">
			<!-- payment -->
			<div class="sub-some child-momu mt-4">
				<h5 class="font-weight-bold mb-3">Payment Method</h5>
				<ul>
					<li>
						<img src="<?= base_url('assets/frontend/');?>images/pay2.png" alt="">
					</li>
					<li>
						<img src="<?= base_url('assets/frontend/');?>images/pay1.png" alt="">
					</li>
					<li>
						<img src="<?= base_url('assets/frontend/');?>images/pay4.png" alt="">
					</li>
					<li>
						<img src="<?= base_url('assets/frontend/');?>images/pay3.png" alt="">
					</li>
					<li>
						<img src="<?= base_url('assets/frontend/');?>images/pay7.png" alt="">
					</li>
					<li>
						<img src="<?= base_url('assets/frontend/');?>images/pay8.png" alt="">
					</li>
					<li>
						<img src="<?= base_url('assets/frontend/');?>images/pay9.png" alt="">
					</li>
				</ul>
			</div>
			<!-- //payment -->
		</div>
	</div>
	<!-- //footer fourth section (text) -->
</footer>