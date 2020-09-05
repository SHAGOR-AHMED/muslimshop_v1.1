<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>Administration Panel</title>
		<!-- custom-theme -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script type="application/x-javascript">addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
				function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!-- //custom-theme -->
		<link href="<?php print base_url();?>assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/component.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/export.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/flipclock.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/circles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link href="<?php print base_url();?>assets/admin/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" media="all" />

		<!-- font-awesome-icons -->
		<link href="<?php print base_url();?>assets/admin/css/font-awesome.css" rel="stylesheet"> 
		<!-- //font-awesome-icons -->
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">

		<script src="<?php print base_url();?>assets/admin/js/jquery-1.4.4.js"></script>
    	<script src="<?php print base_url();?>assets/admin/js/jquery-ui-1.8.8.custom.min.js"></script>

	</head>

	<body>

	<div class="wthree_agile_admin_info">
			  
		<div class="w3_agileits_top_nav">
			<ul id="gn-menu" class="gn-menu-main">
				<li class="gn-trigger">
					<a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
					<nav class="gn-menu-wrapper">
						<div class="gn-scroller scrollbar1">
							<ul class="gn-menu agile_menu_drop">
								<li>
									<a href="<?php print base_url('master');?>"> <i class="fa fa-tachometer"></i> Dashboard</a>
								</li>

								<li>
									<a href="<?php print base_url('Admin/get_users')?>"> <i class="fa fa-tachometer"></i> Manage User</a>
								</li>

								<li>
									<a href="<?php print base_url('Super_admin/get_merchants')?>"> <i class="fa fa-tachometer"></i> Manage Merchant</a>
								</li>
								<!-- <li>
									<a href="<?php print base_url('super_admin/photo');?>"> <i class="fa fa-tachometer"></i> All Photo</a>
								</li> -->									
								<li>
									<a href="<?php print base_url('category');?>"> <i class="fa fa-tachometer"></i> Category</a>
								</li>
								<li>
									<a href="<?php print base_url('subcategory');?>"> <i class="fa fa-table"></i> Subcategory</a>
								</li>
																
								<li>
									<a href="<?php print base_url('products')?>"> <i class="fa fa-tachometer"></i> Product</a>
								</li>

								<li>
									<a href="#"> <i class="fa fa-file-text-o" aria-hidden="true"></i>Order Summary <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
									<ul class="gn-submenu">
										<li class="mini_list_agile">
											<a href="<?php print base_url('Super_admin/ManageOrder')?>"> <i class="fa fa-line-chart"></i> Manage Order</a>
										</li>

		                                <li class="mini_list_agile">
		                                    <a href="<?= base_url('Super_admin/ViewDeliveredProduct'); ?>">
		                                        <i class="fa fa-caret-right" aria-hidden="true"></i> Product Delivered
		                                    </a>
		                                </li>
		                                <li class="mini_list_agile">
		                                    <a href="<?= base_url('Super_admin/ViewCancleProduct'); ?>">
		                                        <i class="fa fa-caret-right" aria-hidden="true"></i> Cancel Order
		                                    </a>
		                                </li>
									</ul>
								</li>

							</ul>
						</div>
					</nav>
				</li>

				<li class="second logo">
					<h1><a href="<?php print base_url('master');?>"><i class="fa fa-graduation-cap" aria-hidden="true"></i>Administration</a></h1>
				</li>

				<li class="second admin-pic">
			       <ul class="top_dp_agile">
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div style="position: relative;top: 18px;">	
									Hello <b><?php echo $this->session->userdata('admin'); ?></b>
								</div>
							</a>
							<ul class="dropdown-menu drp-mnu">
								<li> <a href="<?php print base_url('cpassword');?>"><i class="fa fa-user"></i> Change Password</a> </li> 
								<li> <a href="<?php print base_url('logout');?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>	
					</ul>
			    </li>

				<li class="second full-screen">
					<section class="full-top">
						<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
					</section>
				</li>
			</ul>
		</div>