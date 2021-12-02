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
        <!-- ============================================================== -->


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
<!-- Modal -->
<?php foreach ($admin->details_all_supervisor as $id  => $key) {   ?>
<div class="modal fade" id="exampleModalCenter<?= $key['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Supervisors Location Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- $admin->details_all_supervisor -->
  <div class="list-group">
    <button type="button" class="list-group-item list-group-item-action active">
      Consider Location Carefully before assigning stundents
    </button>
    <button type="button" class="list-group-item list-group-item-action">fullname <span>: <b id="name1"><?= $key['fname'];?> <?= $key['lname'];?> </b></span></button>
    <button type="button" class="list-group-item list-group-item-action">address <span>: <b><?= $key['address'];?></b></span></button>
    <button type="button" class="list-group-item list-group-item-action">state <span>: <b></b><?= $key['state'];?></span></button>
    <button type="button" class="list-group-item list-group-item-action">LGA <span>: <b><?= $key['lga'];?></b></span></button>
    <button type="button" class="list-group-item list-group-item-action">Department <span>: <b><?= $key['course'];?></b></span></button> 
    <button type="button" class="list-group-item list-group-item-action">Students Assign (total)<span>: <b><?= $key['max_students'];?></b></span></button>  
</div>


      </div>
      <div class="modal-footer">
        <a href="assign_student.php?s=<?=  bin2hex($key['id']); ?>&course=<?= $key['course']; ?>&name=<?= $key['fname'] .' '. $key['lname']; ?>" class="btn btn-primary">Continue</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

					<div class="">
                        <div><h3 class="text-center m-2 text-capitalize">Available Supervisors</h3></div>

                            <?php if (isset($_GET['suclog'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">Supervisor Added Successfully.</strong></span></div> 
                                </div>
                                <?php endif ?>
                                <?php if (isset($_GET['editlog'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">Supervisor Details Updated Successfully.</strong></span></div> 
                                </div>
                                <?php endif ?>
                                <?php if (isset($_GET['stulog'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">Student attached Successfully.</strong></span></div> 
                                </div>
                                <?php endif ?>
                                <?php if (isset($_GET['remlog'])): ?>
								<div class="col-sm-10 col-12"><div class='alert alert-success alert-dismissible'>
								<button class='close' data-dismiss='alert'>&times</button>
								<span><strong class="text-center" id="msgpop">Student detached Successfully.</strong></span></div> 
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
                                        <th scope="col">ID</th>
										<th scope="col">firstname</th>
                                        <th scope="col">lastname</th>
                                        <th scope="col">otherames</th>
                                        <th scope="col">address</th>
                                        <th scope="col">students Taken</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">state</th>
                                        <th scope="col">lga</th>
                                        <th scope="col">phone</th>
                                        <th scope="col">active</th>	
                                        <th scope="col">Actions</th>	
									</tr>
								</thead><tbody>
                                <?php 
                         foreach ($admin->details_all_supervisor as $id  => $key) {   ?>
									<tr>
										<td><?php echo ++$id; ?></td>
										<td><?php echo $key['personal_id'];?></td>
                                        <td><?php echo $key['fname'];?></td>
                                        <td><?php echo $key['lname'];?></td>
                                        <td><?php echo $key['ot_names'];?></td>
                                        <td><?php echo $key['address'];?></td>
                                        <td><?php echo $key['max_students'];?></td>
                                        <td><?php echo $key['course'];?></td>
                                        <td><?php echo $key['state'];?></td>
                                        <td><?php echo $key['lga'];?></td>
                                        <td><?php echo $key['phone'];?></td>
                                        <td>
                                        <?php  if($key['is_active'] != 1): ?>
                                            <span class="badge badge-danger">offline</span>
                                        <?php  else: ?>                    
                                            <span class="badge badge-success">Active!</span>                        
                                        <?php  endif; ?> 
                                        </td>
										<td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" id="students"   data-target="#exampleModalCenter<?= $key['id']?>">Assign Students</button>
                                        <?php if($admin->admin_student_tags($key['id']) || $admin->admin_sign != null): ?>
                                        <a href="supervisor_class.php?s=<?=  bin2hex($key['id']); ?>&course=<?= $key['course']; ?>&name=<?= $key['fname'] .' '. $key['lname']; ?>"  class="btn btn-success btn-sm m-1">Students</a>  
                                        <?php endif ?>
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