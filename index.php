<?php 
session_start();

require_once 'php/includes/session.in.php';
$users = new session;
 $users->currentUser();
  ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Siwes Management System</title>

		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="56x56" href="images/gal1.jpg" style="border-radius: 100%;">


		<!-- Main style sheet -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- responsive style sheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css">


		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->

			
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>

			

			<!-- 
			=============================================
				Theme Header
			============================================== 
			-->
			<header class="theme-main-header">
				<div class="top-header">
					<div class="container">
						<div class="clearfix">

							<div class="float-right">
								<ul class="right-widget clearfix">
									<?php if (isset($_SESSION['user-mail'])): ?>
									<li class="quote m-1"><a href="php/signout.php">logout</a></li>
									<li class="quote m-1"><a href="#" style="text-transform: capitalize; padding-left: 10px;"><strong>welcome back!</strong><span class="px-2"><?=$users->cUser; ?></span></a>  </li>
									<?php else: ?>
										<li class="quote m-1"><a href="php/login-page.php"><i class="fa fa-key" aria-hidden="true"></i> login</a></li>	
									<li class="quote m-1"><a href="php/registration.php">register</a></li>
									<?php endif ?>
								</ul>
							</div>
						</div> <!-- /.clearfix -->
					</div> <!-- /.container -->
				</div> <!-- /.top-header -->
				
				<div class="main-menu-wrapper clearfix">
					<div class="container clearfix">
						<!-- Logo --> 
						<div class="logo float-left"><a href="index.php"><img src="images/gal1.jpg" width="50" style="border-radius: 100%;" alt="Logo"></a></div>
						<!-- ============================ Theme Menu ========================= -->
						<nav class="navbar-expand-lg float-right navbar-light" id="mega-menu-wrapper">
					    	<button class="navbar-toggler float-right clearfix mb-4" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    		<i class="flaticon-menu-options"></i>
					    	</button>
					    	<div class="collapse navbar-collapse clearfix" id="navbarNav">
					    	  <ul class="navbar-nav nav">
					    	    <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
								<li class="nav-item "><a class="nav-link" href="php/dashboard-page.php">dashboard</a></li>
							
							</ul>
					    	</div>
						</nav>
					</div> <!-- /.container -->
				</div> <!-- /.main-menu-wrapper -->
			</header> <!-- /.theme-main-header -->

			<!-- 
			=============================================
				Theme Main Banner
			============================================== 
			-->
			<div id="theme-main-banner" class="banner-one">
				<div data-src="images/gal7.jpg">
					<div class="camera_caption">
						<div class="container text-capitalize">
							<h1 class="wow fadeInUp animated text-white "> Siwes Management System.</h1>
							<p class="wow fadeInUp animated text-white text-left" data-wow-delay="0.2s">Welcome To My  Siwes Management System.</p>
						</div> <!-- /.container -->
					</div> <!-- /.camera_caption -->
				</div>
				
			</div> <!-- /#theme-main-banner -->
			

			
			
			<!--
			=====================================================
				Footer
			=====================================================
			-->
			<footer class="theme-footer">
				<div class="container">
					<div class="content-wrapper">
					<div class="footer-bottom-wrapper row">
							
							<div class="col-lg-3 col-sm-6 col-12 footer-list text-capitalize">
								<h4>navigation</h4>
								<ul>
								<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
								<li class="nav-item "><a class="nav-link" href="php/dashboard-page.php">dashboard</a></li>
								</ul>
							</div> <!-- /.footer-list -->
						</div> <!-- /.footer-bottom-wrapper -->

							<div class="copyright-wrapper row">
							<div class="col-md-6 col-sm-8 col-12">
								<p>© 2021 <a href="index.php">Nysc  Information Management System.</a> </p>
							</div>

						</div> <!-- /.copyright-wrapper -->
					</div>
				</div> <!-- /.container -->
			</footer> <!-- /.theme-footer -->
			

	        

	        <!-- Scroll Top Button -->
			<button class="scroll-top tran3s">
				<i class="fa fa-angle-up" aria-hidden="true"></i>
			</button>
			


		<!-- Optional JavaScript _____________________________  -->

    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<!-- jQuery -->
		<script src="vendor/jquery.2.2.3.min.js"></script>
		<!-- Popper js -->
		<script src="vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Camera Slider -->
		<script src='vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
	    <script src='vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
	    <script src='vendor/Camera-master/scripts/camera.min.js'></script>
		<!-- Language Stitcher -->
		<script src="vendor/language-switcher/jquery.polyglot.language.switcher.js"></script>
	    <!-- Mega menu  -->
		<script src="vendor/bootstrap-mega-menu/js/menu.js"></script>
		<!-- WOW js -->
		<script src="vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script src="vendor/jquery.appear.js"></script>
		<script src="vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script src="vendor/fancybox/dist/jquery.fancybox.min.js"></script>

		<!-- Theme js -->
		<script src="js/theme.js"></script>
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>