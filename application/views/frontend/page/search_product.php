
<!-- banner-2 -->
<div class="page-head_agile_info_w3l page-head_agile_info_w3l-2">

</div>
<!-- //banner-2 -->

<!-- page -->
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li>
					<a href="<?= base_url('Welcome/');?>">Home</a>
					<i>|</i>
				</li>
				<li>Search Result</li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->
	
<div class="ads-grid py-sm-5 py-4">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
			<span>S</span>earch
			<span>P</span>roduct
			<span>P</span>age</h3>
		<!-- //tittle heading -->
		<div class="row">
			
			<!-- product left -->
			<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
				<div class="side-bar p-sm-4 p-3">
					<div class="left-side border-bottom py-2">
						<h3 class="agileits-sear-head mb-3">Bikes</h3>
						<ul>
							<?php 
								$all_subcategory = $this->db->select('*')->from('subcategory')->where('subcat_catid', 1)->get()->result();
								foreach ($all_subcategory as $subcategories) {
								$SubCatID = $subcategories->subcat_id;
							?>
								<li>
									<a href="<?= base_url('Welcome/ProductBySubID/'.$SubCatID);?>"><span class="span"><?= $subcategories->subcategory ?></span></a>
								</li>
							<?php } ?>
						</ul>
					</div>
					<!-- delivery -->
					<div class="left-side border-bottom py-2">
						<h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
					</div>
					<!-- //delivery -->
				</div>
				<!-- //product left -->
			</div>
			<!-- end col-lg-3 -->
			
			<!-- product right -->
			<div class="agileinfo-ads-display col-lg-9">
				<div class="wrapper">
					<!-- first section -->
					<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
						<h3 class="heading-tittle text-center font-italic">Search Result: (<?php echo count($Search_Product);?>) Item Found</h3>
						<div class="row">

							<?php
								if(!empty($Search_Product)){

								foreach ($Search_Product as $products) {

								$this->db->select('tbl_image.file');
								$this->db->from('tbl_image'); 
								$this->db->join('product','tbl_image.img_prodid=product.prod_id');
								$this->db->where('tbl_image.img_prodid',$products->prod_id);
								$query = $this->db->get(); 
								$imgQuery =  $query->row();
							?>

							<div class="col-md-4 product-men mt-5">
								<div class="men-pro-item simpleCart_shelfItem" style="border:1px solid #e2e2e2; padding: 5px;">
									<div class="men-thumb-item text-center">
										<img src="<?= base_url($imgQuery->file);?>" alt="" style="height:200px; width:200px;">
										<div class="men-cart-pro">
											<div class="inner-men-cart-pro">
												<a href="<?= base_url('welcome/ProductDetails/'.$products->prod_id);?>" class="link-product-add-cart">Quick View</a>
											</div>
										</div>
									</div>
									<div class="item-info-product text-center border-top mt-4">
										<h4 class="pt-1">
											<a href="single.html"><?= $products->prod_name?></a>
										</h4>
										<div class="info-product-price my-2">
											<span class="item_price">BDT <?= $products->prod_price?></span>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
											<a href="<?= base_url('welcome/ProductDetails/'.$products->prod_id);?>">
												<input type="submit" name="submit" value="Explore Now" class="button btn" />
											</a>
										</div>
									</div>
								</div>
							</div>

							<?php

								}

								}else{
									echo '<div class="alert alert-danger">' . "No Product's Found !!!". "</div>";
								} 
							?>
						</div>
					</div>
					<!-- //first section -->
				</div>
			</div>
			<!-- //product right -->
		</div>
	</div>
</div>