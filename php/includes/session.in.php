<?php 
require_once 'controller.php';
///*********VIEWS VALIDATION  START PAGE********///
class session extends controller
{
	public $cid;
	public $cUser;
	public $details;
	public $details_info;
	public $details_check;
	public $details_supervisor;
	public $details_student;
	public $details_complete_student;
	public $find_lec;
	public $admin_unsign;
	public $admin_sign;
	public $student_supervisor;
	public $details_post;
	public $details_posting;
    public $details_blog;
	public $user_details;
	public $blogs;
	public $post;
	public $details_edit_blog;

	public function currentUser()
	{	if (isset($_SESSION['user-mail'])) {
	$this->details	= $userIN= parent::Cuser($_SESSION['user-mail']);
	$this->cid= $userIN['id'];
	$this->cUser= $userIN['user_email'];
	$this->details_info = parent::users_acct($this->cid);
	}

}

// public function blogs()
// 	{
//         $this->blogs = $active= parent::admin_blog_posting();	    
// 	}

public function adminUser()
{	if (isset($_SESSION['user-mail'])) {
$this->details_check= $userIN= parent::admin();
$this->details_supervisor = $active= parent::admin_user_supervisor(2);
$this->details_student= $active6= parent::admin_user_supervisor(3);
$this->details_complete_student= $active7= parent::admin_all_student();
$this->details_all_supervisor = $actives= parent::admin_user_all_supervisor();
//$this->find_lec = $active2= parent::find_supervisor($id);
//$this->details_blog = $activ3e= parent::admin_blog_posting();
}
}

public function find_supervisor($id)
{	if (isset($_SESSION['user-mail'])) {
	$this->find_lec = $active2= parent::find_supervisor($id);
}
}
public function find_student_supervisor($id)
{	if (isset($_SESSION['user-mail'])) {
	$this->student_supervisor = $active3= parent::find_student_supervisor($id);
}
}
public function admin_student($dept)
{	if (isset($_SESSION['user-mail'])) {
	$this->admin_unsign = $active3= parent::admin_student($dept);
}
}
public function admin_student_tags($id)
{	if (isset($_SESSION['user-mail'])) {
	$this->admin_sign = $active4= parent::admin_student_tag($id);
}
}

public  function totalDatas($email,$id){
	return parent::totalData($email,$id);
}

public  function totalData1($id)
{
	return parent::totalData1($id);
}


// public function edit_posting($mail)
// {	if (isset($_SESSION['user-mail'])) {
// $this->details_post= $userIN= parent::admin_post_info($mail);
// }
// }


// public function admin_blog_edit($slug)
// {	if (isset($_SESSION['user-mail'])) {
// $this->details_edit_blog= $userIN= parent::admin_blog_edit($slug);
// }
// }

// public function user_info($mail)
// {	if (isset($_SESSION['user-mail'])) {
// $this->user_details= $userIN= parent::admin_detail_info($mail);
// }
// }


// public  function blogShow($slug){
// 	$this->post = parent::admin_blog_show($slug);
// }

// public  function replyDatas(){
// 	return parent::admin_reply_info();
// }

}

 ?>