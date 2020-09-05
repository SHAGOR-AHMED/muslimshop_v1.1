<div class="navbar-inner">
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto text-center mr-xl-5">
					<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span style="border:1px solid #e2e2e2;padding: 10px;">All Categories</span>
						</a>
						<div class="dropdown-menu">
							<?php 
								$all_category = $this->db->select('*')->from('category')->get()->result();
								foreach ($all_category as $categories) {
								$CatID = $categories->cat_id;
							?>
								<a class="dropdown-item" href="<?= base_url('Welcome/ProductByCatID/'.$CatID);?>">
									<?= $categories->category ?>
								</a>

							<?php } ?>
						</div>
					</li>
				</ul>
			</div>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto text-center mr-xl-5">
					<?php 
						$all_category = $this->db->select('*')->from('category')->limit(6)->get()->result();
						foreach ($all_category as $categories) {
						$CatID = $categories->cat_id;
					?>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $categories->category ?>
							</a>
							<div class="dropdown-menu">
								<?php
									$all_subcategory = $this->db->select('*')->from('subcategory')->where('subcat_catid', $CatID)->get()->result();
									foreach ($all_subcategory as $subcategories) {

									$SubCatID = $subcategories->subcat_id;
								?>

									<a class="dropdown-item" href="<?= base_url('Welcome/ProductBySubID/'.$SubCatID);?>">
										<?= $subcategories->subcategory ?></a>

								<?php } ?>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</div>
</div>