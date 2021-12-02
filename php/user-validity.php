<?php  
///*********VALIDATION START PAGE********///

require_once 'includes/session.in.php';
require_once 'includes/controller.php';
// Load Composer's autoloader require 'vendor/autoload.php';
session_start();
$users = new session;
 $users->currentUser();
$command= new controller;
if (isset($_POST['registers'])) {
$email= $command->intInput($_POST['email']);
$password= $command->intInput($_POST['password']);
$cpassword= $command->intInput($_POST['c-password']);
$hashPass= password_hash($password, PASSWORD_ARGON2I);
if (isset($command->error)) {
header("Location:registration.php?emptyField");
exit();
}elseif ($command->Mail($email) !== false) {
header("location:registration.php?email-f");
exit();
}elseif ($password != $cpassword) {
header("Location:registration.php?mis-match");
exit();
}else{
	if ($command->register($email,$hashPass) != false) {
		$_SESSION['start_time'] = time();
		$_SESSION['user-mail'] = $email;
header("Location:dashboard-page.php");
exit();
	}else{
header("Location:registration.php?errors");
exit();
}
}
}

// //login validation
if (isset($_POST['action-login'])) {
$username= $command->intInput($_POST['email']);
$password= $command->intInput($_POST['password']);
if (isset($command->error)) {
	header("Location:login-page.php?emptyField");
	exit();
}else{
	if ($check= $command->Login($username)) {
		if (password_verify($password, $check['password'])) {
		$_SESSION['start_time'] = time();
		$_SESSION['user-mail']= $check['user_email'];
header("Location:dashboard-page.php");
exit();
		}else{
header("Location:login-page.php?incorrect");
exit();
}
}else{
	header("Location:login-page.php?incorrect");
	exit();}
}

}

if (isset($_POST['d-siwes'])) {
	$cid= $users->cid;
	$matric_no= $command->intInput($_POST['personal_id']);
	$fname= $command->intInput($_POST['fname']);
	$lname= $command->intInput($_POST['lname']);
	$mname= $command->intInput($_POST['onames']);
	$address= $command->intInput($_POST['address']);
		$phone_no= $command->intInput($_POST['phone_number']);
		$state_of_origin= $command->intInput($_POST['state_of_origin']);
		$lga= $command->intInput($_POST['lga']);
		$attach= $command->intInput($_POST['p_o_a']);
		$session= $command->intInput($_POST['session']);
		$course= $command->intInput($_POST['course']);
	if (isset($command->error)) {
		header("Location:dashboard-page.php?emptyField");
		exit();
	}
	else{
		if ($command->siwes_form($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$course,$cid) !== null){
			header("Location:dashboard-page.php?suclog");
			exit();
		}else{header("Location:dashboard-page.php?errors");
			exit();}
	}
	
	}

	if (isset($_POST['d-siwes-update'])) {
		$cid= $users->cid;
		$fname= $command->intInput($_POST['fname']);
		$lname= $command->intInput($_POST['lname']);
		$mname= $command->intInput($_POST['onames']);
		$address= $command->intInput($_POST['address']);
			$phone_no= $command->intInput($_POST['phone_number']);
			$state_of_origin= $command->intInput($_POST['state_of_origin']);
			$lga= $command->intInput($_POST['lga']);
			$attach= $command->intInput($_POST['p_o_a']);
			$session= $command->intInput($_POST['session']);
		if (isset($command->error)) {
			header("Location:dashboard-page.php?emptyField");
			exit();
		}
		else{
			if ($command->siwes_update($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$cid) !== null){
				header("Location:dashboard-page.php?suclog");
				exit();
			}else{header("Location:dashboard-page.php?errors");
				exit();}
		}
		
		}

//admin forms
if (isset($_POST['add_sup'])) {
	$email= $command->intInput($_POST['email']);
	$password= 'siwes.app.' . explode('@',$email)[0];
	 $hashPass= password_hash($password, PASSWORD_ARGON2I);
	if (isset($command->error)) {
	header("Location: admin/add_supervisor.php?emptyField");
	exit();
	}elseif ($command->Mail($email) !== false) {
	header("location:admin/add_supervisor.php?email-f");
	exit();
	}else{
	if ($command->admin_add_supervisor($email,$hashPass)) {
	header("Location:admin/supervisors.php?suclog");
	exit();
	}
	else{
	header("Location:admin/add_supervisor.php?errors");
	exit();
	}
	}
	}

	if (isset($_POST['super_form'])) {
		//return print_r($_POST);
		$matric_no= $command->intInput($_POST['personal_id']);
		$fname= $command->intInput($_POST['fname']);
		$lname= $command->intInput($_POST['lname']);
		$mname= $command->intInput($_POST['onames']);
		$address= $command->intInput($_POST['address']);
			$phone_no= $command->intInput($_POST['phone']);
			$state_of_origin= $command->intInput($_POST['state']);
			$lga= $command->intInput($_POST['lga']);
			$max= $command->intInput($_POST['max']);
			$active= $command->intInput($_POST['active']);
			$course= $command->intInput($_POST['course']);
			$cid= $command->intInput($_POST['user_id']);
		if (isset($command->error)) {
			header("Location:admin/supervisor_form.php.php?emptyField");
			exit();
		}
		else{
			if ($command->admin_siwes_Data($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$cid,$max,$active)){
				header("Location:admin/assign_supervisors.php?suclog");
				exit();
			}else{header("Location:admin/supervisor_form.php?errors");
				exit();}
		}
		
		}

		if (isset($_POST['super_form_edit'])) {
			$fname= $command->intInput($_POST['fname']);
			$lname= $command->intInput($_POST['lname']);
			$mname= $command->intInput($_POST['onames']);
			$address= $command->intInput($_POST['address']);
				$phone_no= $command->intInput($_POST['phone']);
				$state_of_origin= $command->intInput($_POST['state']);
				$lga= $command->intInput($_POST['lga']);
				$max= $command->intInput($_POST['max']);
				$active= $command->intInput($_POST['active']);
				$course= $command->intInput($_POST['course']);
				$cid= $command->intInput($_POST['user_id']);
			if (isset($command->error)) {
				header("Location:admin/supervisor_form.php.php?emptyField");
				exit();
			}
			else{
				if ($command->admin_siwes_Data_edit($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$max,$active,$cid)){
					header("Location:admin/assign_supervisors.php?editlog");
					exit();
				}else{header("Location:admin/supervisor_form.php?errors");
					exit();}
			}
			
			}

			if (isset($_POST['add_student'])) {
				//return print_r($_POST);
				$matric_no= $command->intInput($_POST['matric_no']);
				$cid= $command->intInput($_POST['assign']);
				if (isset($command->error)) {
					header("Location:admin/assign_supervisors.php.php?invalid-data");
					exit();
				}
				else{
					if ($command->admin_assign_student($cid,$matric_no)){
						header("Location:admin/assign_supervisors.php?stulog");
						exit();
  					}else{header("Location:admin/supervisor_form.php?errors");
						exit();}
				}
				
				}

				if (isset($_POST['remove_student'])) {
					$matric_no= $command->intInput($_POST['matric_no']);
					$cid= NULL;
					if (isset($command->error)) {
						header("Location:admin/assign_supervisors.php.php?invalid-data");
						exit();
					}
					else{
						if ($command->admin_assign_student($cid,$matric_no)){
							header("Location:admin/assign_supervisors.php?remlog");
							exit();
						  }else{header("Location:admin/supervisor_form.php?errors");
							exit();}
					}
					
					}
					
					if (isset($_POST['delete_data'])) {
						if($command->admin_trash($_POST['del'])){
						header("Location:admin/dashboard.php?trash");
						exit();
					}
					}


// if (isset($_POST['p_blog'])) {
// $title= $command->intInput($_POST['title']);
// $body= $command->intInput($_POST['body']);
//   $slug = strtolower(preg_replace('~[^\pL\d]+~u', '-', $title));
// if (isset($command->error)) {
// header("Location:admin/publish.php?emptyField");
// exit();
// }elseif ($command->admin_blog($title,$slug,$body) !== null) {
// 		header("Location:admin/posts.php?suclog");
// 		exit();
// 	}else{
// header("Location:admin/publish.php?error");
// exit(); 
// 	}
// }

// if (isset($_POST['p_blog_update'])) {
// $title= $command->intInput($_POST['title']);
// $id= $_POST['ids'];
// $body= $command->intInput($_POST['body']);
//   $slug = strtolower(preg_replace('~[^\pL\d]+~u', '-', $title));
// if (isset($command->error)) {
// header("Location:admin/posts.php?emptyField");
// exit();
// }elseif ($command->admin_blog_update($title,$slug,$body,$id) !== null) {
// 		header("Location:admin/posts.php");
// 		exit();
// 	}else{
// header("Location:admin/publish.php?error");
// exit(); 
// 	}
// }

// if (isset($_GET['i'])) {
//     if($command->admin_blog_trash($_GET['i']) !== null){
//     header("Location:admin/posts.php?trash");
// 	exit();
// }
// }

// if (isset($_POST['u-approved'])) {
// 	$mail = $_POST['v_mail'];
// 	if ($command->admin_users_verify($mail) !== null) {
// 		header("Location:admin/verified_user.php?approved");
// 		exit();
// 	}

// }

// if (isset($_POST['posting_user'])) {
// 	$name= $command->intInput($_POST['name']);
// 	$area_posted= $command->intInput($_POST['area_posted']);
// 	$state= $command->intInput($_POST['state']);
// 	$mails= $command->intInput($_POST['a_email']);
// 	$callup_no= $command->intInput($_POST['callup_no']);
// 	$lga= $command->intInput($_POST['lga']);
// 	if (isset($command->error)) {
// 		header("Location:admin/verified_user.php?errors");
// 		exit();
// 	}else{
// 	if ($command->admin_users_post($name,$area_posted,$lga,$state,$callup_no,$mails) !== null) {
// 		$command->admin_users_posted($mails);
// 	try {
//     //Server settings
//     $mail->SMTPDebug = 0;                      
//     $mail->isSMTP();                                            
//     $mail->Host       = 'smtp.gmail.com';                     
//     $mail->SMTPAuth   = true;                                   
//     $mail->Username   = database::USERNAME;                     
//     $mail->Password   = database::PASSWORD;                         
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
//     $mail->Port       = 587;
//     $mail->setFrom(database::USERNAME, 'Nysc Portal Management!!');    
//     $mail->addAddress($mails, 'Dear User');               
//     $mail->addReplyTo(database::USERNAME, 'no reply');
//     $mail->addCC($mails);
//     $mail->addBCC(database::USERNAME);
//     $mail->isHTML(true);
//     $mail->Subject = "Nysc  Posting Details";
//     $mail->Body    =  '<!DOCTYPE html>
// 	<html lang="en">
// 	<head>
// 		<meta charset="UTF-8">
// 		<meta name="viewport" content="width=device-width, initial-scale=1.0">
// 		<title>Email Confirmation</title>
// 		<style>
// 		.bold{
// 			text-transform: capitalize;
// 			font-size: 15px;
// 			font-family: helvetica;
// 			max-width: 100%;
// 			padding: 20px;
// 			margin: auto;
// 			text-align: justify;
// 			border-radius: 5px;
// 			background-color:rgba(0,0,0,0.1);
// 		}
// 		a{text-transform: lowercase;}
// 	</style>
// 	</head>
//     	<body>
// 		<div class="container">
// 		<div  class="text-center bold col-md-8">
// 			<h3>Nysc  Posting Details</h3>
// 			<p class="lead"><b>dear user </b> you have been successfully posted, below are your posting details. </p>
// 			<a href="'.$_SERVER['SERVER_NAME'].'/nysc/php/dashboard-page.php">
// 			visit dashboard
// 			</a>
// 			<p class="text-capitalize"><b>Callup Number</b>: <span>'.$callup_no.'</span></p><br> 
// 			<p class="text-capitalize"><b>Fullname</b>: <span>'.$name.'</span></p><br> 
// 			<p class="text-capitalize"><b>area posted</b>: <span>'.$area_posted.'</span></p><br> 
// 			<p class="text-capitalize"><b>Lga</b>: <span>'.$lga.'</span></p><br>
// 			<p class="text-capitalize"><b>State</b>: <span>'.$state.'</span></p><br>  
// 			<span class="text-capitalize text-center">Nysc Portal Management &copy; 2021</span>
// 		</div>
// 		</div>
// 	</body>
// 	</html>';
//     $mail->send();
// 		} catch (Exception $e) {
//     echo $mail->ErrorInfo;
// }
// 	header("Location:admin/verified_user.php?posted");
// 	exit();
// 	}else{
// 		header("Location:admin/verified_user.php?errors");
// 		exit();
// 	}
// 	}
// }

// if (isset($_POST['posting_edit_user'])) {
// 	$name= $command->intInput($_POST['name']);
// 	$area_posted= $command->intInput($_POST['area_posted']);
// 	$state= $command->intInput($_POST['state']);
// 	$mail= $command->intInput($_POST['a_email']);
// 	$lga= $command->intInput($_POST['lga']);
// 	if (isset($command->error)) {
// 		header("Location:admin/edit_posting.php?emptyField");
// 		exit();
// 	}else{
// 	if ($command->admin_users_edit($name,$area_posted,$lga,$state,$mail) !== null) {
// 		header("Location:admin/verified_user.php?post-edited");
// 		exit();
// 	}else{
// 		header("Location:admin/verified_user.php?errors");
// 		exit();
// 	}
// 	}
// }

// if (isset($_POST['complain'])) {
// 	$cname= $command->intInput($_POST['complain_text']);
// 	$mail= $command->intInput($_POST['c_mail']);
// 	if (isset($command->error)) {
// 		header("Location:filter_error.php?emptyField");
// 		exit();
// 	}else{
// 	if ($command->admin_complain($cname,$mail) !== null) {
// 		header("Location:dashboard-page.php?c-sent");
// 		exit();
// 	}else{
// 		header("Location:dashboard-page.php?errors");
// 		exit();
// 	}
// 	}
// }

// if (isset($_POST['q-approved'])) {
// 	$mail = $_POST['q_mail'];
// 	if ($command->admin_queries($mail) !== null) {
// 		header("Location:admin/reply.php");
// 		exit();
// 	}

// }

// //search
// if (isset($_GET['q-search'])) {
// 	$name= $command->intInput($_GET['q']);
// 	if (isset($command->error)) {
// 		header("Location:dashboard-page.php?empty");
// 		exit();
// 	}
// 	if ($command->data_search($users->cUser,$name) != null) {
// 		header("Location:filter.php");
// 		exit();
// 	}else{
// 		header("Location:filter_error.php");
// 		exit();
// 	}
// }

///*********VALIDATION START END********///