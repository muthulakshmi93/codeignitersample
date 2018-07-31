<?php
class exammodel extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  
	  public function getexam(){
		$this->db->select('*');
		$this->db->from('exam');
		$this->db->group_by('exam_name');
		$query = $this->db->get(); 
		$data['result'] = $query->result();
		return $data;
	  }	  
	  public function getexamsub($data){
		$this->db->select('*');
		$this->db->from('exam');
		$this->db->where('exam_name',$data['exam_name']);
		$query = $this->db->get(); 
		$data['result'] = $query->result();
		return $data;	  
	  }
	  public function getstudentlist($examid){
			$this->db->select('*');
			$this->db->from('student');
			$this->db->join('exam', 'exam.id ='.$examid);
			$query = $this->db->get(); 
			$data['result'] = $query->result();
			return $data;
		}
		public function savemarks(){			
			$this->db->select('roll_no');
			$this->db->from('student');			
			$query = $this->db->get(); 
			$data['result_new'] = $query->result();			
			foreach($data['result_new'] as $res){			
				$data_value 	= 	array(
									'exam_id'	=> $this->input->post('subjectid'),
									'sub_marks'	=> $this->input->post('marks'.$res->roll_no),
									'stud_id'	=> $res->roll_no
								);
				$where_con = array('stud_id'=>$res->roll_no,'exam_id'=>$this->input->post('subjectid'));
				$this->db->select('*');
				$this->db->from('marks');					
				$this->db->where($where_con);				
				$query = $this->db->get(); 
				$data['res'] = $query->result();
				
				if(count($data['res'])>0){
					$this->db->set($data_value); 
					$this->db->where($where_con); 
					$this->db->update("marks", $data_value); 					
				}else{					
					$this->db->insert("marks", $data_value);					
				}				
			}
			$data['success']='successfully updated';
			return $data ;			
		}
}