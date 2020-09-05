
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>W</span>ELCOME
			<span>T</span>O
			<span>O</span>UR
			<span>S</span>HOP
		</h3>
		<!-- //tittle heading -->
		<div class="row">
			<!-- product right -->
			<div class="agileinfo-ads-display col-lg-12">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="heading-tittle text-center font-italic">Our Products Collections</h3>
						<div class="row">

							<?php
								foreach ($random_product as $product) {

								$this->db->select('tbl_image.file');
								$this->db->from('tbl_image'); 
								$this->db->join('product','tbl_image.img_prodid=product.prod_id');
								$this->db->where('tbl_image.img_prodid',$product->prod_id);
								$query = $this->db->get(); 
								$imgQuery =  $query->row();
							?>

								<div class="col-md-3 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem" style="border:1px solid #e2e2e2; padding: 5px;">
										<div class="men-thumb-item text-center">
											<img src="<?= base_url($imgQuery->file);?>" alt="" style="height:200px; width:200px;">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="single.html"><?= $product->prod_name ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">BDT <?= $product->prod_price ?></span>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<a href="<?= base_url('welcome/ProductDetails/'.$product->prod_id);?>">
													<input type="submit" name="submit" value="Explore Now" class="button btn" />
												</a>
											</div>
										</div>
									</div>
								</div>

							<?php } ?>
						</div>
					</div>
					<!-- //first section -->
				
					<!-- third section -->
					<div class="product-sec1 product-sec2 px-sm-5 px-3">
						<div class="row">
							<h3 class="col-md-4 effect-bg">Summer Carnival</h3>
							<p class="w3l-nut-middle">Get Extra 10% Off</p>
							<div class="col-md-8 bg-right-nut">
								<img src="<?= base_url('assets/frontend/');?>images/middle.png" alt="">
							</div>
						</div>
					</div>
					<!-- //third section -->
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
</div>