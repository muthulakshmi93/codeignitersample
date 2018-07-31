<?php

Class Login_Database extends CI_Model {

// Insert registration data in database
public function registration_insert($data) {

// Query to check whether username already exist or not
$condition = "user_name =" . "'" . $data['user_name'] . "'";
$this->db->select('*');
$this->db->from('user_details');
$this->db->where($condition);
$this->db->limit(1);
$query = $this->db->get();
	if ($query->num_rows() == 0) {
		$this->db->insert('user_details', $data);
		if ($this->db->affected_rows() > 0) {
			return true;
		}
	}else{
		return false;
	}
}

public function changecount($username){
	
$this->db->select('usercount');
$this->db->from('user_details');
$this->db->where('user_name',$username);
$query = $this->db->get();
$result = $query->result();
$original_count = $result[0]->usercount;
$usercount = ($original_count)+1;
if(($usercount >=3)&&($usercount <5)){
	$data = array(
		'usercount' =>$usercount,
		'userstatus'=>1,
		'logintime'=>date('y-m-d h:i:sa')
	);
}elseif($usercount >=5){	
	$data = array(
		'usercount' => $usercount,
		'userstatus'=>2,
		'logintime'=>date('y-m-d')
	);
}else{	
	$data = array(
		'usercount' => $usercount		
	);
}
	$this->db->set($data); 
	$this->db->where("user_name", $username); 
	$this->db->update("user_details", $data);

	$this->db->select('usercount'); 
	$this->db->from( 'user_details' );
	$this->db->where("user_name",$username);		
	$query = $this->db->get(); 
    $data['records'] = $query->result(); 	
	return $data;
		
}

// Read data using username and password
public function login($data) {

	$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . $data['password'] . "' AND userstatus = 0 ";
	$this->db->select('*');
	$this->db->from('user_details');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
		$result =$query->result();
		
		 $data = array('last_login_time'=>date('Y-m-d h:i:sa') );
				$this->db->set($data); 
				$this->db->where("user_id", $result[0]->id); 
				$this->db->update("user_details", $data); 
		return true;
	} else {
		return false;
	}
}

// Read data from database to show data in admin page
public function read_user_information($username) {

	$condition = "user_name =" . "'" . $username . "'";
	$this->db->select('*');
	$this->db->from('user_details');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();

	if ($query->num_rows() == 1) {
	return $query->result();
	} else {
	return false;
	}
}

public function change_user_status(){
	$this->db->select('*');
	$this->db->from('user_details');
	$this->db->where('userstatus',1);
	$query = $this->db->get();
	$result = $query->result();
	if(!empty($result)){
		foreach($result as $res){
			$usertime = $res->logintime;
			$addtime = strtotime($usertime) + 3600;
			$current_time = strtotime(date('Y-m-d h:i:sa'));		
			if($current_time >= $addtime){
				$data = array(
					'usercount' =>0,
					'userstatus'=>0				
				);
				$this->db->set($data); 
				$this->db->where("user_name", $res->user_name); 
				$this->db->update("user_details", $data);
			}
		}
	}
}

}

?>