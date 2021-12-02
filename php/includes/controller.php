<?php 
require_once 'main.php';
/**
 * 
 */
///*********CONTROLLER VALIDATION  START PAGE********///
class controller extends main
{	public $error;
	public function register($email,$pass)
	{
		return parent::intInsert($email,$pass);
	}
	public function Login($name)
	{
		return parent::intLogin($name);
	}

	//admin
	public function admin()
	{
		return parent::admin();
	}
	public	function admin_add_supervisor($email,$pass)
	{
		return parent::admin_add_supervisor($email,$pass);
	}
	public function admin_trash($slug)
	{
		return parent::admin_trash($slug);
	}
	public function admin_user_supervisor($id)
	{
		return parent::admin_user_supervisor($id);
	}
	public function admin_user_all_supervisor()
	{
		return parent::admin_user_all_supervisor();
	}
	public function find_supervisor($id)
	{
		return parent::find_supervisor($id);
	}
	public function find_student_supervisor($id)
	{
		return parent::find_student_supervisor($id);
	}
	public function admin_student($dept)
	{
		return parent::admin_student($dept);
	}
	public function admin_assign_student($attach,$id)
	{
		return parent::admin_assign_student($attach,$id);
	}
	public function admin_student_tag($id)
	{
	return	parent::admin_student_tag($id);
	}
	public function admin_all_student()
	{
		return parent::admin_all_student();
	}
	public  function totalData($email,$id){
		return parent::totalData($email,$id);
	}
	public  function totalData1($id)
	{
		return parent::	totalData1($id);
	}
	public function admin_siwes_Data($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$user_id,$max,$active)
	{
		return	parent::admin_siwes_Data($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$user_id,$max,$active);
	}
	public function admin_siwes_Data_edit($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$max,$active,$user_id)
	{
		return parent::admin_siwes_Data_edit($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$max,$active,$user_id);
	}

	public function Cuser($value)
	{
		return parent::users($value);
	}
	public function users_acct($id){
		return parent::users_acct($id);
	}
	// public function admin_blog($title,$slug,$body){
    // return parent::admin_blog($title,$slug,$body);	    
	// }
	//body

	public function siwes_update($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$user_id)
	{
		return parent::siwes_update($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$user_id);
	}
	public function siwes_form($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$course,$user_id)
	{
		return parent::siwes_Data($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$course,$user_id);
	}

		public function intInput($value)
	{	if (empty($value)) {
		return $this->error = $value;
		}else{
		$value = trim($value);
		$value = stripslashes($value);
		$value = filter_var($value, FILTER_SANITIZE_STRING);
		$value = htmlspecialchars($value);
		return $value;	
		}
		
	}
		public function valInput($value)
	{	if (!preg_match("/^[a-zA-Z0-9\s]{4,18}$/", $value)) {
		return $value;
	}
	}
		public function filter_page($value)
	{	if (!preg_match("/^[a-zA-Z0-9._,{}\s]{1,120}$/", $value)) {
		return $value;
	}
	}

	public function Mail($value)
	{	$value= filter_var($value, FILTER_SANITIZE_EMAIL);
		if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
			return $value;
		}
		return parent::intMail($value);
		
	}
	// 	public function User($name)
	// {
	// 	return parent::intUser($name);
	// }
	// public function passwordVerify($value)
	// {if (!preg_match("/^[a-zA-Z0-9_.,!*$?#@%|\s]{6,15}$/", $value)) {
	// 	return $value;
	// }
	// }
		public function erMsg($output)
	{	$output = "
	<div class='alert alert-danger alert-dismissible'>
	<button class='close' data-dismiss='alert'>&times</button>
	<span><b>".$output."</b></span></div>";
	return $output;
	}
		public function sucMsg($output)
	{	$output = "
	<div class='alert alert-success alert-dismissible'>
	<button class='close' data-dismiss='alert'>&times</button>
	<span><b>".$output."</b></span></div>";
	return $output;
	}

	public function page_controller()
	{
		if (!isset($_SESSION['user-mail'])) {
			header("location: login-page.php");
		}
	}




} 