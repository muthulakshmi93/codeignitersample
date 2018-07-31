<?php 
   class Stud_Model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function studentinsert($data) { 
         if ($this->db->insert("student", $data)) { 
			$query = $this->db->get("student"); 
			$data['records'] = $query->result(); 
            return $data; 
         } 
      } 
	public function studentview(){
		$query = $this->db->get("student"); 
        $data['records'] = $query->result(); 	
		$this->db->select('city'); 
		$this->db->from( 'student' );		
		$this->db->group_by('city'); 
		$query = $this->db->get(); 
		$data['result'] = $query->result();
		return $data;
	}
	public function searchstudent($data){
		$this->db->select('*'); 
		$this->db->from( 'student' );
		$this->db->where("city", $data['search_city']); 
		
		$query = $this->db->get(); 
		$data['records'] = $query->result();
		return $data;
	}
	public function searchstudentajax($data){
		$this->db->select('*'); 
		$this->db->from( 'student' );
		$this->db->where("city", $data['selected_value']);		
		$query = $this->db->get(); 
		$data['records'] = $query->result();
		return $data;
	}
      public function studentdelete($roll_no) { 
         if ($this->db->delete("student", "roll_no = ".$roll_no)) { 
            $query = $this->db->get("student"); 
			$data['records'] = $query->result(); 
			return $data;
         } 
      } 
   
      public function studentupdate($data,$old_roll_no) { 
         $this->db->set($data); 
         $this->db->where("roll_no", $old_roll_no); 
         $this->db->update("student", $data); 
		 $query = $this->db->get("student"); 
         $data['records'] = $query->result(); 
		 return $data;
      } 
	 
   } 
?> 