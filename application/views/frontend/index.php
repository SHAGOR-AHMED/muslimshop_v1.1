
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<title>Muslimshop | Online Shoping In Bangladesh</title>
		<!-- Meta tag Keywords -->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="UTF-8" />
		<meta name="keywords" content="Responsive web template" />
		<script>
			addEventListener("load", function () {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<!-- //Meta tag Keywords -->

		<!-- jquery -->
		<script src="<?= base_url('assets/frontend/');?>js/jquery-2.2.3.min.js"></script>
		<!-- //jquery -->

		<!-- Custom-Files -->
		<link href="<?= base_url('assets/frontend/');?>css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
		<!-- Bootstrap css -->
		<link href="<?= base_url('assets/frontend/');?>css/style.css" rel="stylesheet" type="text/css" media="all" />
		<!-- Main css -->
		<link rel="stylesheet" href="<?= base_url('assets/frontend/');?>css/fontawesome-all.css">
		<!-- Font-Awesome-Icons-CSS -->
		<link href="<?= base_url('assets/frontend/');?>css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
		<!-- pop-up-box -->
		<link href="<?= base_url('assets/frontend/');?>css/menu.css" rel="stylesheet" type="text/css" media="all" />
		<!-- menu style -->
		<!-- for data table -->
		<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
		<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" media="all"/>
		<!-- //for data table -->
		<!-- //Custom-Files -->
		
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- web fonts -->
		<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
		<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
			rel="stylesheet">
		<!-- //web fonts -->

		<!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'textarea' });</script> -->

	</head>

	<body>
		
		<!-- header -->
		<?php include('page/header.php');?>
		<!-- //header -->
		
		<!-- menu -->
		<?php include('page/menu.php');?>
		<!-- //menu -->
		<?php 
			$message=$this->session->userdata('message');
		    if(!empty($message)){
		?>
		    <div class="alert alert-block alert-success">
		        <button type="button" class="close" data-dismiss="alert">
		            <i class="ace-icon fa fa-times"></i>
		        </button>

		        <i class="ace-icon fa fa-check green"></i>
		        <?php
		        	echo $message;
		        	$this->session->unset_userdata('message');
		        ?>
		    </div>
		<?php } ?>

		<!-- banner -->
		<?php
			if($slider){
				include('page/banner.php');
			}else{
				echo '';
			}
		?>
		<!-- //banner -->

		<!-- body -->
		<?php 
			if(isset($content)){
				echo $content;
			}else{
				echo "Found Nothing";
			}
		?>
		<!-- //body -->

		<!-- footer -->
		<?php include('page/footer.php');?>
		<!-- //footer -->
		<!-- copyright -->
		<div class="copy-right py-3">
			<div class="container">
				<p class="text-center text-white">© 2019 Muslimshop.com.bd All rights reserved
				</p>
			</div>
		</div>
		<!-- //copyright -->

		<!-- js-files -->

		<!-- nav smooth scroll -->
		<script>
			$(document).ready(function () {
				$(".dropdown").hover(
					function () {
						$('.dropdown-menu', this).stop(true, true).slideDown("fast");
						$(this).toggleClass('open');
					},
					function () {
						$('.dropdown-menu', this).stop(true, true).slideUp("fast");
						$(this).toggleClass('open');
					}
				);
			});
		</script>
		<!-- //nav smooth scroll -->

		<!-- popup modal (for location)-->
		<script src="<?= base_url('assets/frontend/');?>js/jquery.magnific-popup.js"></script>
		<script>
			$(document).ready(function () {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});

			});
		</script>
		<!-- //popup modal (for location)-->

		<!-- cart-js -->
		<script src="<?= base_url('assets/frontend/');?>js/minicart.js"></script>
		<script>
			paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

			paypals.minicarts.cart.on('checkout', function (evt) {
				var items = this.items(),
					len = items.length,
					total = 0,
					i;

				// Count the number of each item in the cart
				for (i = 0; i < len; i++) {
					total += items[i].get('quantity');
				}

				if (total < 3) {
					alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
					evt.preventDefault();
				}
			});
		</script>
		<!-- //cart-js -->

		<!-- password-script -->
		<script>
			window.onload = function () {
				document.getElementById("password1").onchange = validatePassword;
				document.getElementById("password2").onchange = validatePassword;
			}

			function validatePassword() {
				var pass2 = document.getElementById("password2").value;
				var pass1 = document.getElementById("password1").value;
				if (pass1 != pass2)
					document.getElementById("password2").setCustomValidity("Passwords Don't Match");
				else
					document.getElementById("password2").setCustomValidity('');
				//empty string means no validation error
			}
		</script>
		<!-- //password-script -->
		
		<!-- imagezoom -->
		<script src="<?= base_url('assets/frontend/');?>js/imagezoom.js"></script>
		<!-- //imagezoom -->

		<!-- flexslider -->
		<link rel="stylesheet" href="<?= base_url('assets/frontend/');?>css/flexslider.css" type="text/css" media="screen" />

		<script src="<?= base_url('assets/frontend/');?>js/jquery.flexslider.js"></script>
		<script>
			// Can also be used with $(document).ready()
			$(window).load(function () {
				$('.flexslider').flexslider({
					animation: "slide",
					controlNav: "thumbnails"
				});
			});
		</script>
		<!-- //FlexSlider-->
		
		<!-- easy-responsive-tabs -->
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend/');?>css/easy-responsive-tabs.css " />
		<script src="<?= base_url('assets/frontend/');?>js/easyResponsiveTabs.js"></script>

		<script>
			$(document).ready(function () {
				//Horizontal Tab
				$('#parentHorizontalTab').easyResponsiveTabs({
					type: 'default', //Types: default, vertical, accordion
					width: 'auto', //auto or any width like 600px
					fit: true, // 100% fit in a container
					tabidentify: 'hor_1', // The tab groups identifier
					activate: function (event) { // Callback function if tab is switched
						var $tab = $(this);
						var $info = $('#nested-tabInfo');
						var $name = $('span', $info);
						$name.text($tab.text());
						$info.show();
					}
				});
			});
		</script>
		<!-- //easy-responsive-tabs -->

		<!-- credit-card -->
		<script src="<?= base_url('assets/frontend/');?>js/creditly.js"></script>
		<link rel="stylesheet" href="<?= base_url('assets/frontend/');?>css/creditly.css" type="text/css" media="all" />
		<script>
			$(function () {
				var creditly = Creditly.initialize(
					'.creditly-wrapper .expiration-month-and-year',
					'.creditly-wrapper .credit-card-number',
					'.creditly-wrapper .security-code',
					'.creditly-wrapper .card-type');

				$(".creditly-card-form .submit").click(function (e) {
					e.preventDefault();
					var output = creditly.validate();
					if (output) {
						// Your validated credit card output
						console.log(output);
					}
				});
			});
		</script>

		<!-- creditly2 (for paypal) -->
		<script src="<?= base_url('assets/frontend/');?>js/creditly2.js"></script>
		<script>
			$(function () {
				var creditly = Creditly2.initialize(
					'.creditly-wrapper .expiration-month-and-year-2',
					'.creditly-wrapper .credit-card-number-2',
					'.creditly-wrapper .security-code-2',
					'.creditly-wrapper .card-type');

				$(".creditly-card-form-2 .submit").click(function (e) {
					e.preventDefault();
					var output = creditly.validate();
					if (output) {
						// Your validated credit card output
						console.log(output);
					}
				});
			});
		</script>
		<!-- //credit-card -->
		
		<!-- scroll seller -->
		<script src="<?= base_url('assets/frontend/');?>js/scroll.js"></script>
		<!-- //scroll seller -->

		<!-- smoothscroll -->
		<script src="<?= base_url('assets/frontend/');?>js/SmoothScroll.min.js"></script>
		<!-- //smoothscroll -->

		<!-- start-smooth-scrolling -->
		<script src="<?= base_url('assets/frontend/');?>js/move-top.js"></script>
		<script src="<?= base_url('assets/frontend/');?>js/easing.js"></script>
		<script>
			jQuery(document).ready(function ($) {
				$(".scroll").click(function (event) {
					event.preventDefault();

					$('html,body').animate({
						scrollTop: $(this.hash).offset().top
					}, 1000);
				});
			});
		</script>
		<!-- //end-smooth-scrolling -->

		<!-- smooth-scrolling-of-move-up -->
		<script>
			$(document).ready(function () {
				/*
				var defaults = {
					containerID: 'toTop', // fading element id
					containerHoverID: 'toTopHover', // fading element hover id
					scrollSpeed: 1200,
					easingType: 'linear' 
				};
				*/
				$().UItoTop({
					easingType: 'easeOutQuart'
				});

			});
		</script>
		<!-- //smooth-scrolling-of-move-up -->

		<!-- for bootstrap working -->
		<script src="<?= base_url('assets/frontend/');?>js/bootstrap.js"></script>
		<!-- for data table -->
		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<!-- //for data table -->

	</body>
</html>