<?php 
require_once '../includes/session.in.php';
session_start(); 
if (!isset($_SESSION['user-mail'])) {
header("Location:../login-page.php");
}
$admin = new session;
$admin->adminUser();
$admin->currentUser();
if ($admin->details['type'] != 1) {
    header("Location:../login-page.php");
}
if (isset($_GET['s'])) {
    $ids= $_GET['s'];
    $admin->find_supervisor(hex2bin($ids));
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>Siwes Management Portal Panel</title>
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->

        <?php include_once('./header.php') ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            <?php if (isset($_GET['emptyField'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-danger alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">fill in blank fields!</strong></span></div> 
								</div>
							<?php endif ?>
                            <?php if (isset($_GET['errors'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-danger alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">server error</strong></span></div> 
								</div>
							<?php endif ?>
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="card">
                    <div class="card-body">
                    <form action="../user-validity.php" method="POST" class="form">
                            <h4 class="card-title m-4 text-center text-capitalize">Complete Supervisor Profile</h4>
                            <div class="card-body">
                            <?php if($admin->find_lec == ''): ?>
                            <div class="form-group">
                            <label for="input">Personal No</label>
                            <input type="text" class="form-control"required name="personal_id" value="<?php echo 'LEC/21'.bin2hex(random_bytes(2)); ?>">   
                        </div>
                        <?php endif ?>
                            <div class="row">
                            <div class="form-group col-sm-6">
                            <label for="input">First Name</label>
                                <input type="text" class="form-control" required name="fname" value="<?= $admin->find_lec['fname'] ?? null ?>">
                            </div>
                            <div class="form-group col-sm-6">
                            <label for="input">Last Name</label>
                                <input type="text" class="form-control" required name="lname" value="<?= $admin->find_lec['lname'] ?? null ?>">
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-6">
                            <label for="input">Other Names</label>
                                <input type="text" class="form-control" required name="onames" value="<?= $admin->find_lec['ot_names'] ?? null?>">
                            </div>
                            <div class="form-group col-sm-6">
                            <label for="input">phone</label>
                                <input type="text" class="form-control" required name="phone" value="<?= $admin->find_lec['phone'] ?? null ?>">
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-6">
                            <label for="input">State</label>
                                <input type="text" class="form-control" required name="state" value="<?= $admin->find_lec['state'] ?? null ?>">
                            </div>
                            <div class="form-group col-sm-6">
                            <label for="input">LGA</label>
                                <input type="text" class="form-control" required name="lga" value="<?= $admin->find_lec['lga'] ?? null ?>">
                            </div>
                            </div>
                            <div class="row">
                            <div class="form-group col-sm-6">
                            <label for="input">Department</label>
                            <select name="course" id="" class="form-control">
										<option  disabled>~~ select course ~~</option>
										<option value="computer science" selected>computer science</option>
										<option value="cyber security">cyber security</option>
										<option value="information system<">information system</option>
										<option value="software engineering">software engineering</option>
										</select>
                            </div>
                            <div class="form-group col-sm-6">
                            <label for="input">Max No Of Students</label>
                            <select name="max" id="" class="form-control">
										<option  disabled>~~ select ~~</option>
										<option value="3" selected>3</option>
										<option value="6" >6</option>
										<option value="9" >9</option>
										<option value="15" >15</option>
						    </select>
                            </div>
                            </div>

                            <div class="row">
                            <div class="form-inline">
                            <label for="input" class=" px-3">Active</label>
                            <input type="checkbox" <?= $admin->find_lec['is_active'] ?? null == 1 ? 'checked': null ?> value="1" name="active" class="form-control" id="">
                            </div>
                            </div>

                        <div class="form-group">
                            <label for="input">Address</label>
                            <input type="text" class="form-control"required name="address" value="<?= $admin->find_lec['address'] ?? null ?>">   
                        </div>
                            <input type="hidden" value="<?php echo hex2bin($ids); ?>" name="user_id">
                                
                            </div>
                            <div class="border-top">
                                    <div class="card-body">
                                        <?php if($admin->find_lec != ''): ?>
                                        <button type="submit" name="super_form_edit" class="btn btn-primary">Update Details</button>
                                        <?php else: ?>
                                        <button type="submit" name="super_form" class="btn btn-primary">Complete Profile</button>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>			
                    </div>
                </div>
            </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->

</body>

</html>