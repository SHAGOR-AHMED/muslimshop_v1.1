<?php include('header.php');?>
	<div class="clearfix"></div>
	<div class="inner_content">
		<div class="inner_content_w3_agile_info">
		    <div class="agile_top_w3_grids">
				<ul class="ca-menu">
					<li>
						<a href="<?php print base_url('products');?>">							
							<i class="fa fa-building-o" aria-hidden="true"></i>
							<div class="ca-content">
								<h4 class="ca-main"><?php print count($AllProduct);?></h4>
								<h3 class="ca-sub">Product's</h3>
							</div>
						</a>
					</li>
					
					<li>
						<a href="<?php print base_url('super_admin/ManageOrder');?>">
							<i class="fa fa-tasks" aria-hidden="true"></i>
							<div class="ca-content">
								<h4 class="ca-main three"><?php print count($AllOrder);?></h4>
								<h3 class="ca-sub three">Order Details</h3>
							</div>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
		    </div>							
	    </div>
	</div>
<?php include('footer.php');?>