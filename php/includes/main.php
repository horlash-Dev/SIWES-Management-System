<?php  
require_once 'config/database.php';
		/////*********DATABASE VALIDATION  START PAGE********///
class main extends database
{
	protected function intInsert($email,$pass)
	{
		$stmt= $this->conn->prepare("INSERT INTO all_users (user_email, password, type) VALUES (?,?,?)");
		$stmt->execute([$email,$pass,3]);
		return true;
	}
	protected function intLogin($name)
	{
		$stmt= $this->conn->prepare("SELECT password, user_email FROM all_users WHERE user_email= ?");
		$stmt->execute([$name]);
		$result= $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	protected function intMail($mail)
	{
		$sql= "SELECT user_email FROM all_users WHERE user_email= ?";
		$stmt= $this->conn->prepare($sql);
		$stmt->execute([$mail]);
		$result= $stmt->fetch();
		return $result;
	}


	protected function users($value)
	{
		$stmt= $this->conn->prepare("SELECT id, user_email, type, created_at
		FROM all_users WHERE user_email= ?");
		$stmt->execute([$value]);
		$result= $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	protected function users_acct($id)
	{
		$stmt= $this->conn->prepare("SELECT all_users.id, all_users.user_email, users_account.*
		FROM all_users  INNER JOIN users_account ON all_users.id = users_account.user_id WHERE all_users.id = ?");
		$stmt->execute([$id]);
		$result= $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
	

	//admin

	protected function admin()
	{
		$stmt= $this->conn->prepare("SELECT id, user_email, type 
		FROM all_users WHERE type = 1");
		$stmt->execute();
		$result= $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}


	protected function admin_add_supervisor($email,$pass)
	{
		$stmt= $this->conn->prepare("INSERT INTO all_users (user_email, password, type) VALUES (?,?,?)");
		$stmt->execute([$email,$pass,2]);
		return true;
	}

	protected function admin_trash($slug)
	{
		$stmt= $this->conn->prepare("DELETE FROM all_users WHERE id = ?");
		$stmt->execute([$slug]);
		return true;
	}

	protected function admin_user_supervisor($id)
	{
		$stmt= $this->conn->prepare("SELECT id, user_email, created_at
		FROM all_users WHERE type = ? ORDER BY created_at DESC");
		$stmt->execute([$id]);
		$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	protected function admin_user_all_supervisor()
	{
		$stmt= $this->conn->prepare("SELECT *
		FROM users_account WHERE max_students > 0 ORDER BY id DESC");
		$stmt->execute();
		$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	protected function admin_student($dept)
	{
		$stmt= $this->conn->prepare("SELECT *
		FROM users_account WHERE course= ? AND assign_id IS NULL AND user_attachment IS NOT NULL ORDER BY id DESC");
		$stmt->execute([$dept]);
		$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	protected function admin_assign_student($attach,$id)
	{
		$stmt= $this->conn->prepare("UPDATE users_account SET assign_id = ? WHERE personal_id = ?");
		$stmt->execute([$attach,$id]);
		return true;
	}



	protected function admin_student_tag($id)
	{
		$stmt= $this->conn->prepare("SELECT *
		FROM users_account  WHERE assign_id = ? AND user_attachment IS NOT NULL ORDER BY id DESC");
		$stmt->execute([$id]);
		$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	protected function find_supervisor($id)
	{
		$stmt= $this->conn->prepare("SELECT *
		FROM users_account WHERE max_students > 0 && user_id = ?");
		$stmt->execute([$id]);
		$result= $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	protected function find_student_supervisor($id)
	{
		$stmt= $this->conn->prepare("SELECT *
		FROM users_account WHERE max_students > 0 && id = ?");
		$stmt->execute([$id]);
		$result= $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	protected function admin_all_student()
	{
		$stmt= $this->conn->prepare("SELECT *
		FROM users_account  WHERE user_attachment IS NOT NULL ORDER BY id DESC");
		$stmt->execute();
		$result= $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	protected function admin_siwes_Data($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$user_id,$max,$active)
	{
		$stmt=$this->conn->prepare("INSERT INTO users_account (personal_id, fname, lname, ot_names, address, phone, state, lga,  course, user_id,max_students,is_active) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->execute([$matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$user_id,$max,$active]);
		return true;
	}

	protected function admin_siwes_Data_edit($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$max,$active,$user_id)
	{
		$stmt=$this->conn->prepare("UPDATE users_account SET fname= ?, lname= ?, ot_names= ?, address= ?, phone= ?,state= ?, lga= ?,  course= ?, max_students= ?, is_active= ? WHERE user_id = ?");
		$stmt->execute([$fname, $lname, $mname, $address, $phone_no, $state_of_origin,$lga,$course,$max,$active,$user_id]);
		return true;
	}

	protected function totalData($email,$id)
	{
		$stmt= $this->conn->prepare("SELECT COUNT(*) AS total FROM users_account  WHERE $email IS NOT NULL AND  $id IS NOT NULL");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['total'];
	}

	protected function totalData1($id)
	{
		$stmt= $this->conn->prepare("SELECT COUNT(*) AS total FROM all_users  WHERE TYPE = $id");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['total'];
	}

	protected function siwes_Data($matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$course,$user_id)
	{
		$stmt=$this->conn->prepare("INSERT INTO users_account (personal_id, fname, lname, ot_names, address, phone, state, user_attachment, lga, session, course, user_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
		$stmt->execute([$matric_no, $fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$course,$user_id]);
		return true;
	}

	protected function siwes_update($fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$user_id)
	{
		$stmt=$this->conn->prepare("UPDATE users_account SET fname= ?, lname= ?, ot_names= ?, address= ?, phone= ?,state= ?,user_attachment= ?, lga= ?, session= ? WHERE user_id= ?");
		$stmt->execute([$fname, $lname, $mname, $address, $phone_no, $state_of_origin,$attach,$lga,$session,$user_id]);
		return true;
	}

	


	// 
}