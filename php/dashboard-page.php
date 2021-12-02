<?php 

require_once 'includes/session.in.php';
session_start(); 
if (!isset($_SESSION['user-mail'])) {
header("Location:login-page.php");
}
$users = new session;
$users->currentUser();
$users->find_student_supervisor($users->details_info['assign_id'] ?? null);
//print_r($users->details_info);
$users->admin_student_tags($users->details_info['id'] ?? null);
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
		<link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">


		<!-- Main style sheet -->
			<link rel="stylesheet" type="text/css" href="../css/style.css">
		<!-- responsive style sheet -->

		<link rel="stylesheet" type="text/css" href="../datatable/datatables.min.css">
		<link rel="stylesheet" type="text/css" href="../css/responsive.css">
	


		<!-- Fix Internet Explorer ______________________________________-->

		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="vendor/html5shiv.js"></script>
			<script src="vendor/respond.js"></script>
		<![endif]-->

			<style type="">

			</style>
	</head>

	<body>
		<div class="main-page-wrapper">

			<!-- ===================================================
				Loading Transition
			==================================================== -->
			<div id="loader-wrapper">
				<div id="loader"></div>
			</div>

		<header class="theme-main-header">
				<div class="top-header">
					<div class="container">
						<div class="clearfix">

							<div class="float-right">
								<ul class="right-widget clearfix">
									<?php if (isset($_SESSION['user-mail'])): ?>
									<li class="quote m-1"><a href="signout.php">logout</a></li>
									<?php else: ?>
										<li class="quote m-1"><a href="login-page.php"><i class="fa fa-key" aria-hidden="true"></i> login</a></li>	
									<li class="quote m-1"><a href="registration.php">register</a></li>
									<?php endif ?>
								</ul>
							</div>
						</div>
					</div> 
				</div> <!-- /.top-header -->
				
				<div class="main-menu-wrapper clearfix">
					<div class="container clearfix">
						<!-- Logo --> 
						<div class="logo float-left"><a href="../index.php"><img src="../images/gal1.jpg" width="50" style="border-radius: 100%;" alt="Logo"></a></div>
						<!-- ============================ Theme Menu ========================= --> <!-- /.right-widget -->
						<nav class="navbar-expand-lg float-right navbar-light" id="mega-menu-wrapper">
					    	<button class="navbar-toggler float-right clearfix mb-4" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					    		<i class="flaticon-menu-options"></i>
					    	</button>
					    	<div class="collapse navbar-collapse clearfix" id="navbarNav">
					    	  <ul class="navbar-nav nav">
					    	    <li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li>
								<li class="nav-item "><a class="nav-link" href="dashboard-page.php">dashboard</a></li>
                                <!-- <li class="nav-item active"><a class="nav-link" href="feedback.php">Feedback</a></li>
										 <li class="nav-item active"><a class="nav-link" href="blog.php">News</a></li> -->
								<li class="nav-item "><a class="nav-link" href="signout.php">logout</a></li>	
							</ul>
					    	</div>
						</nav>
					</div> <!-- /.container -->
				</div> <!-- /.main-menu-wrapper -->
			</header> <!-- /.theme-main-header -->
		
			<div class="portfolio-details">
				<div class="container">
					<div class="image-gallery row">
						<div class="col-md-8 col-12"><img src="images/portfolio/13.jpg" alt=""></div>
						<div class="col-md-4 col-12"><img src="images/portfolio/14.jpg" alt=""></div>
					</div> <!-- /.image-gallery -->

					<div class="details-text">
						<div class="row">
						<?php if($users->details['type'] == 3): ?>
						<div class="col-lg-8 col-12 text-left-side">
								<h2>Siwes Application Form</h2>
								<h5>Upload your details for processing,make sure you fill validated info else your details wont be approved,you will be notified via email once you are posted.</h5>
							<?php if (isset($_GET['emptyField'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-danger alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">fill in blank fields!</strong></span></div> 
								</div>
							<?php endif ?>
							<?php if (isset($_GET['s-error'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-danger alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">no result found</strong></span></div> 
								</div>
							<?php endif ?>
							<?php if (isset($_GET['suclog'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">Your Details was successfully Updated!</strong></span></div> 
								</div>
							<?php endif ?>

								<form action="user-validity.php" method="POST" class="form-validation form-styl-two row" id="outbak-form" >
								<?php if ($users->details_info == ''): ?>
										<div class="col-sm-5 col-12">
										<label for="input">matric no</label>
										<input type="text" class="" value="<?php echo $users->details_info['personal_id'] ?? null ?>" placeholder="matric no*" name="personal_id"></div>
										<?php endif ?>
										<div class="col-sm-5 col-12">
										<label for="input">First Name</label>
										<input type="text" class="" placeholder="Fisrt Name*" name="fname" value="<?php echo $users->details_info['fname'] ?? null; ?>" ></div>
										<div class="col-sm-5 col-12">
										<label for="input">Last Name</label>
										<input type="text" class="" placeholder="Last Name*" name="lname" value="<?php echo $users->details_info['lname'] ?? null; ?>" ></div>
										<div class="col-sm-5 col-12">
										<label for="input">Other Names</label>
										<input type="text" class="" placeholder="Other Names*" name="onames" value="<?php echo $users->details_info['ot_names'] ?? null; ?>" ></div>										
										<div class="col-sm-5 col-12">
										<label for="input">address</label>
										<input type="text" class="" placeholder="address*" name="address" value="<?php echo $users->details_info['address'] ?? null ?>" ></div>
										
										<div class="col-sm-5 col-12">
										<label for="input">phone number</label>
										<input type="text" class="" placeholder="phone number*" name="phone_number" value="<?php echo $users->details_info['phone'] ?? null ?>"></div>
										<div class="col-sm-5 col-12">
										<label for="input">state of origin</label>
										<input type="text" class="" placeholder="state of origin*" name="state_of_origin" value="<?php echo $users->details_info['state'] ?? null ?>"></div>
										<div class="col-sm-5 col-12">
										<label for="input">LGA</label>
										<input type="text" class="" placeholder="lga*" name="lga" value="<?php echo $users->details_info['lga'] ?? null ?>"></div>
										<?php if ($users->details_info == ''): ?>
										<div class="col-sm-5 col-12">
										<label for="input">course</label>
										<select name="course" id="" class="form-control">
										<option  disabled>~~ select course ~~</option>
										<option value="computer science" selected>computer science</option>
										<option value="cyber security">cyber security</option>
										<option value="information system<">information system</option>
										<option value="software engineering">software engineering</option>
										</select>
										</div>
										<?php endif ?>
										<div class="col-sm-5 col-12">
										<label for="input">session</label>
										<select name="session" id="" class="form-control">
										<option  disabled>~~ current semester ~~ </option>
										<option value="1st semester" selected>1st semester</option>
										<option value="2nd semester">2nd semester</option>
										</select>
										</div>
										<div class="col-sm-5 col-12 pt-3">
										<label for="input">Place Of Attachment</label>
										<input type="text" class="" placeholder="service year*" name="p_o_a" value="<?php echo $users->details_info['user_attachment'] ?? null ?>"></div>				
										
										<div class="col-sm-12">
										<?php if ($users->details_info != ''): ?>
									<input type="submit" class="ml-3" name="d-siwes-update" id="outbrebtn" value="Update Details">
									<?php else: ?>
										<input type="submit" class="ml-3" name="d-siwes" id="outbrebtn" value="Submit Form">
										<?php endif ?>
									</div>
								</form>
							</div> <!-- /.text-left-side -->
				
							<?php endif ?>
						<div class="col-lg-4 col-md-6 col-sm-8 col-12 portfolio-info-list">
								<ul>
								<?php if($users->details['type'] == 2 || 3 &&  $users->details_info != ''): ?>
									<li><strong>Fullname</strong> <?php echo $users->details_info['fname'] ?? null ?> <?php echo $users->details_info['lname'] ?? null ?> </li>
									<?php endif ?>

									<?php if($users->details['type'] == 2 || 3 && $users->details_info != ''): ?>
									<li><strong>Personal ID</strong> <?php echo $users->details_info['personal_id'] ?? null ?> </li>
									<?php endif ?>									
									<?php if($users->details['type'] == 3 && $users->details_info != '' && $users->student_supervisor != ''): ?>
									<li><strong>Supervisor Status</strong> <?= $users->student_supervisor['fname'] ?? null ?>  <?= $users->student_supervisor['lname'] ?? null ?> 
									</li>
									<p class="badge badge-primary mb-2 text-center">Hey <?php echo $users->details_info['fname'] ?? null ?> you have been assigned a supervisor <br><a href="mysupervisor.php" class="btn btn-sm btn-success m-2">see more</a></p>
									<?php endif ?>
									<?php if($users->details['type'] == 2 && $users->details_info != '' && $users->admin_sign != null): ?>
									<li><strong>Student Status</strong> 
									<p class="badge badge-primary mb-2 text-left">Hello <?php echo $users->details_info['fname'] ?? null ?> <br> you have been assigned some students. <br><a href="mystudents.php" class="btn btn-sm btn-success m-2">List</a></p>
									</li>
									
									<?php endif ?>

									<?php if($users->details['type'] == 3 && $users->details_info != ''): ?>
									<li><strong>Session</strong> <?php echo $users->details_info['session'] ?? null ?> </li>
									<?php endif ?>

									<?php if($users->details['type'] == 2 || 3 && $users->details_info != ''): ?>
									<li><strong>Department</strong> <?php echo $users->details_info['course'] ?? null ?> </li>
									<?php endif ?>
									<li><strong>Email</strong><?php echo $users->cUser ?? null ?></li>
							
							<?php if($users->details['type'] == 1): ?>
									<li> <i class="badge badge-success">ADMIN</i></li>
								<li><a href="admin/dashboard.php" class="btn btn-success px-3">Adimin Panel</a></li>
							<?php endif ?>
								</ul>
							</div> <!-- /.portfolio-info-list -->


						</div> <!-- /.row -->
					</div> <!-- /.details-text -->
				</div> <!-- /.container -->
			</div> <!-- /.portfolio-details -->

		
			<footer class="theme-footer">
				<div class="container">
					<div class="content-wrapper">
						<div class="footer-bottom-wrapper row">
							
							<div class="col-lg-3 col-sm-6 col-12 footer-list text-capitalize">
								<h4>navigation</h4>
								<ul>
								<li class="nav-item "><a class="nav-link" href="dashboard-page.php">dashboard</a></li>
								<li class="nav-item "><a class="nav-link" href="signout.php">logout</a></li>	
								</ul>
							</div> <!-- /.footer-list -->
	
						</div> <!-- /.footer-bottom-wrapper -->

							<div class="copyright-wrapper row">
							<div class="col-md-6 col-sm-8 col-12">
								<p>© 2021 <a href="../index.php">Siwes Management System</a> </p>
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
		<script src="../vendor/jquery.2.2.3.min.js"></script>
		<!-- Popper js -->
		<script src="../vendor/popper.js/popper.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Camera Slider -->
		<script src='../vendor/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
	    <script src='../vendor/Camera-master/scripts/jquery.easing.1.3.js'></script> 
	    <script src='../vendor/Camera-master/scripts/camera.min.js'></script>
		<!-- Language Stitcher -->
		<script src="../vendor/language-switcher/jquery.polyglot.language.switcher.js"></script>
	    <!-- Mega menu  -->
		<script src="../vendor/bootstrap-mega-menu/js/menu.js"></script>
		<!-- WOW js -->
		<script src="../vendor/WOW-master/dist/wow.min.js"></script>
		<!-- owl.carousel -->
		<script src="../vendor/owl-carousel/owl.carousel.min.js"></script>
		<!-- js count to -->
		<script src="../vendor/jquery.appear.js"></script>
		<script src="../vendor/jquery.countTo.js"></script>
		<!-- Fancybox -->
		<script src="../vendor/fancybox/dist/jquery.fancybox.min.js"></script>
		<script src="js/validate.in.js"></script>
	<script src="../datatable/datatables.min.js"></script> 

		<!-- Theme js -->
		<script src="../js/theme.js"></script>
		
		</div> <!-- /.main-page-wrapper -->
	</body>
</html>