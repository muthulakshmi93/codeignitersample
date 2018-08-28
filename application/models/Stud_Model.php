<?php 
   class Stud_Model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
   
      public function studentinsert($data) { 
         if ($this->db->insert("student", $data)) { 
			$this->db->select('student.roll_no,student.name,student.phone_number,student.city,class.class_name,section.section');
		$this->db->from('student');				
		$this->db->join('section', 'section.id = student.section_id');
		$this->db->join('class', 'class.id = student.class_id');	
		$this->db->order_by("student.roll_no","asc");			
		$query = $this->db->get(); 			
        $data['records'] = $query->result();
            return $data; 
         } 
      } 
	public function studentview(){
		
		//SELECT s.name,s.phone_number,s.city,c.class_name,sec.section FROM `student` as s,`class` as c, `section` as sec where c.id=s.class_id AND s.section_id=sec.id
		
		$this->db->select('student.roll_no,student.name,student.phone_number,student.city,class.class_name,section.section');
		$this->db->from('student');				
		$this->db->join('section', 'section.id = student.section_id');
		$this->db->join('class', 'class.id = student.class_id');	
		$this->db->order_by("student.roll_no","asc");			
		$query = $this->db->get(); 			
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
           $this->db->select('student.roll_no,student.name,student.phone_number,student.city,class.class_name,section.section');
		$this->db->from('student');				
		$this->db->join('section', 'section.id = student.section_id');
		$this->db->join('class', 'class.id = student.class_id');	
		$this->db->order_by("student.roll_no","asc");			
		$query = $this->db->get(); 	
			$data['records'] = $query->result(); 
			return $data;
         } 
      } 
   
      public function studentupdate($data,$old_roll_no) { 
         $this->db->set($data); 
         $this->db->where("roll_no", $old_roll_no); 
         $this->db->update("student", $data); 
		 $data = $this->Stud_Model->studentview();          
		 return $data;
      } 
	  
	  public function EditStudent($rollno){
		 // $query = $this->db->get_where("student",array("roll_no"=>$roll_no));
		//	$data['records'] = $query->result();
		$this->db->select('student.roll_no,student.name,student.phone_number,student.city,class.class_name,section.section');
		$this->db->from('student');				
		$this->db->join('section', 'section.id = student.section_id');
		$this->db->join('class', 'class.id = student.class_id');	
		$this->db->where('student.roll_no', $rollno); 
		$this->db->order_by("student.roll_no","asc");			
		$query = $this->db->get(); 			
        $data['records'] = $query->result(); 		
		
		return $data;
		  
	  }
	 
   } 
?> 