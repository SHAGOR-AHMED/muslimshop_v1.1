<!-- banner-2 -->
<div class="page-head_agile_info_w3l">

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
				<li><?= $product_description->category; ?></li>
			</ul>
		</div>
	</div>
</div>
<!-- //page -->

<!-- Single Page -->
<div class="banner-bootom-w3-agileits py-5">
	<div class="container py-xl-4 py-lg-2">
		<!-- tittle heading -->
		<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3"></h3>
		<!-- //tittle heading -->
		<div class="row">
			<div class="col-lg-5 col-md-8 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							<?php 
								foreach ($product_img as $value) {
							?>
								<li data-thumb="<?= base_url($value->file);?>" >
									<div class="thumb-image">
										<img src="<?= base_url($value->file);?>" data-imagezoom="true" class="img-fluid">
									</div>
								</li>
							<?php } ?>

							<?php
								//echo $product_img[0]->file;
								//echo $product_img[1]->file;
								//echo $product_img[2]->file;
							?>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>

			<div class="col-lg-7 single-right-left simpleCart_shelfItem">
				<h3 class="mb-3"><?= $product_description->prod_name;?></h3>
				<p class="mb-3">
					<span class="item_price">BDT <?= $product_description->prod_price?></span><br>
					<label>Availablity: In Stock</label>
				</p>
				
				<div class="product-single-w3l">
					<p class="my-3">
						<i class="far fa-hand-point-right mr-2"></i>
						Description</p>
					<ul>
						<li class="mb-1">
							<?= $product_description->prod_desc;?>
						</li>
					</ul>
				</div>
				<br>
				<div class="product-single-w3l">
					<p class="my-3 selected">
						<i class="far fa-hand-point-right mr-2"></i>
						Click here for showing mobile number
					</p>
					<div class="alert alert-block alert-success dropdodwnn">
                        <p style="padding:10px;"><i class="fa fa-phone"></i>&nbsp;<?= $product_description->mobile_no;?></p>
                    </div>
                    <script>
						$(document).ready(function(){
						$('.dropdodwnn').hide();
						$('.selected').click(function(){
						$('.dropdodwnn').slideToggle("fast");
						});
						});
					</script>
				</div>

				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<form action="<?= base_url('add_cart/'.$product_description->prod_id);?>" method="post" enctype="multipart/form-data">
							<fieldset>
								<label>Quantity</label><br>
								<select class="form-control" name="qty">
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
								<br>
								<input type="submit" name="submit" value="Add to cart" class="button" />
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //Single Page -->