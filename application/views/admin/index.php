<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Admin Panel</title>
<!-- custom-theme -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> 
	addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); }
</script>
<!-- //custom-theme -->
<link href="<?php print base_url();?>assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php print base_url();?>assets/admin/css/component.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php print base_url();?>assets/admin/css/style_grid.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php print base_url();?>assets/admin/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome-icons -->
<link href="<?php print base_url();?>assets/admin/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome-icons -->
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
<!-- banner -->
<div class="wthree_agile_admin_info">
	<!-- /w3_agileits_top_nav-->
	<!-- /nav-->
	<div class="w3_agileits_top_nav">
		<ul id="gn-menu" class="gn-menu-main">
			<!-- //nav_agile_w3l -->
			<li class="second logo admin"><h1><a href=""><i class="fa fa-graduation-cap" aria-hidden="true"></i>Administration Panel</a></h1></li>
			<li class="second full-screen">
				<section class="full-top">
					<button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
				</section>
			</li>
		</ul>
		<!-- //nav -->
	</div>
	<div class="clearfix"></div>
	<!-- //w3_agileits_top_nav-->
	<!-- /inner_content-->
	<div class="inner_content">
		<!-- /inner_content_w3_agile_info-->
		<div class="inner_content_w3_agile_info">	
			<div class="registration admin_agile">								
				<div class="signin-form profile admin">
					<h2>Admin Login</h2>
					<?php
						if($this->session->userdata('exception')){
							print '<span style="color:red">'.$this->session->userdata('exception').'</span>';
							$this->session->unset_userdata('exception');
						}
					?>
					<div class="login-form">
						<form action="<?php print base_url('admin_login');?>" method="post">
							<input type="text" name="name" value="" required="" placeholder="Username">
							<input type="password" name="password" value="" required="" placeholder="password">
							<div class="tp">
								<input type="submit" value="LOGIN">
							</div>
							
						</form>
					</div>										
					<h6><a href="<?php print base_url('');?>">Back To Home</a><h6>													 
				</div>	
			</div> <!-- //inner_content_w3_agile_info-->
		</div>
		<!-- //inner_content-->
	</div>
<!-- banner -->
<!--copy rights start here-->
<div class="copyrights">
	<p>Developed by <a href="http://u-turntech.com/" target="_blank"> U-Turn Technologies Ltd</a></p>
</div>	
<!--copy rights end here-->
<!-- js -->
<script type="text/javascript" src="<?php print base_url();?>assets/admin/js/jquery-2.1.4.min.js"></script>
<script src="<?php print base_url();?>assets/admin/js/modernizr.custom.js"></script>
<script src="<?php print base_url();?>assets/admin/js/classie.js"></script>
<script src="<?php print base_url();?>assets/admin/js/gnmenu.js"></script>
<script>
	new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
		 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>        
<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', init);
	function init() {
		var mapOptions = {
			zoom: 11,
			center: new google.maps.LatLng(40.6700, -73.9400),
			styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
		};
		var mapElement = document.getElementById('map');
		var map = new google.maps.Map(mapElement, mapOptions);
		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(40.6700, -73.9400),
			map: map,
		});
	}
</script>
<script src="<?php print base_url();?>assets/admin/js/prettymaps.js"></script>
			  
<script>
	$(function(){
		//default
		$('.map-canvas').prettyMaps({
			address: 'Melbourne, Australia',
			image: 'map-icon.png',
			hue: '#FF0000',
			saturation: -20
		});

		//red map example
		$('#default-map-btn').on('click', function(){
			$('.map-canvas').prettyMaps();
		});

		//green map example
		$('#green-map-btn').on('click', function(){
			$('.map-canvas').prettyMaps({
				address: 'Melbourne, Australia',
				image: 'map-icon.png',
				hue: '#00FF55',
				saturation: -30
			});
		});

		//blue map example
		$('#blue-map-btn').on('click', function(){
			$('.map-canvas').prettyMaps({
				address: 'Melbourne, Australia',
				image: 'map-icon.png',
				hue: '#0073FF',
				saturation: -30,
				zoom: 16,
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				overviewMapControl: true,
				scrollwheel: false,
			});
		});
		
		//grey map example
		$('#grey-map-btn').on('click', function(){
			$('.map-canvas').prettyMaps({
				address: 'Melbourne, Australia',
				image: 'map-icon.png',
				saturation: -100,
				lightness: 10
			});
		});
	});
</script>
<!-- //js -->
<script src="<?php print base_url();?>assets/admin/js/screenfull.js"></script>

<script>
	$(function () {
		$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

		if (!screenfull.enabled) {
			return false;
		}

		

		$('#toggle').click(function () {
			screenfull.toggle($('#container')[0]);
		});	
	});
</script>
<script src="<?php print base_url();?>assets/admin/js/jquery.nicescroll.js"></script>
<script src="<?php print base_url();?>assets/admin/js/scripts.js"></script>
<script type="text/javascript" src="<?php print base_url();?>assets/admin/js/bootstrap-3.1.1.min.js"></script>
</body>
</html>