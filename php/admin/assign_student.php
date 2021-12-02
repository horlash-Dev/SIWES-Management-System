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
if (isset($_GET['s']) || isset($_GET['course']) || isset($_GET['name'])) {
    $ids= $_GET['s'];
    $dept= $_GET['course'];
    $name= $_GET['name'];
    $admin->admin_student($dept);
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
    <title>Siwes Portal Panel</title>
    <!-- Custom CSS -->
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../datatable/datatables.min.css">
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
            <div class="row">
            <div class="container">
               
                <div class="">

  <div class="list-group">
    <button type="button" class="list-group-item list-group-item-action active">
      Supervisor Data
    </button>
    <button type="button" class="list-group-item list-group-item-action">fullname <span>: <b><?php echo $name ?? null ?></b></span></button>
    <button type="button" class="list-group-item list-group-item-action">Department <span>: <b><?php echo $dept ?? null ?></b></span></button> 
</div>
					<div class="">
                        <div><h3 class="text-center m-2 text-capitalize">Stundent available in <?= $name ??null ?> department</h3></div>
                    <?php if (isset($_GET['approved'])): ?>
								<div class="col-sm-12 col-12"><div class='alert text-center alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="" id="msgpop">you approved a new user</strong></span></div> 
								</div>
                            <?php endif ?>
                            <?php if (isset($_GET['posted'])): ?>
								<div class="col-sm-12 col-12"><div class='alert text-center alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="" id="msgpop">you  posted a new user</strong></span></div> 
								</div>
                            <?php endif ?>
                            <?php if (isset($_GET['post-edited'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">you updated! a user Details.</strong></span></div> 
                                </div>
                                <?php endif ?>
                            <?php if (isset($_GET['errors'])): ?>
								<div class="col-sm-12 col-12"><div class='alert text-center alert-danger alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="" id="msgpop">server error!</strong></span></div> 
								</div>
							<?php endif ?>
						<div class="table-content">
							 <!-- /.theme-title -->
						<div class="table-responsive">
             <table class="table table-bordered">
			
								<thead class="table-light text-left">
									<tr>
										<th scope="col">#</th>
                                        <th scope="col">Matric ID</th>
										<th scope="col">fullname</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">state</th>
                                        <th scope="col">lga</th>	
                                        <th scope="col">Actions</th>	
									</tr>
								</thead><tbody>
                                <?php
                         foreach ($admin->admin_unsign as $id  => $key) {   ?>
									<tr>
										<td><?php echo ++$id; ?></td>
										<td><?= $key['personal_id'] ?? null?></td>
                                        <td><?= $key['fname'] ?? null ?> <?= $key['lname'] ?? null ?></td>
                                        <td><?= $key['course'] ?? null ?></td>
                                        <td><?= $key['address'] ?? null ?></td>
                                        <td><?= $key['state'] ?? null?></td>
                                        <td><?= $key['lga'] ?? null ?> </td>
										<td>
                                        <form action="../user-validity.php" method="POST">
                                        <input type="hidden" name="assign" value="<?php echo hex2bin($ids); ?>">
                                        <input type="hidden" name="matric_no" value="<?php echo $key['personal_id'] ?? null ?>">
                                        <button type="submit" name="add_student" class="btn btn-success btn-md">ADD</button>
                                        </form>                                       
                                    </td> 
                                    </tr>
                         <?php } ?>
		</tbody></table>
						</div>
						</div> <!-- /.main-content -->
					</div> <!-- /.opacity -->
				</div> <!-- /.right-side -->
			</div> <!-- /.home-about-section -->
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
    <script src="../../js/datatables.min.js"></script>
	<script src="../../datatable/datatables.min.js"></script> 
    <script>
        $("table").DataTable();
    </script>
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