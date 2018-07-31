<?php
class quiz_model extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  
		public function question_insert($data){	
			$whole_array = $this->convert_to_json($data);
				if ($this->db->insert("sample_quiz", $whole_array)) { 
					$insert_id = $this->db->insert_id();
					$data['success']='Inserted Successfully';					
					return $data; 
				} 		  
		}
	
	public function convert_to_json($data){		
		function custom_callback($data)
		{
			if(is_array($data)){
				$data_array = serialize($data);
			}else{
				$data_array = $data;
			}
			return $data_array;
		}
		$whole_array = array_map('custom_callback', $data);		
		return $whole_array;
	}
	
	public function get_ques(){             
		$query = $this->db->get("sample_quiz"); 
		$data['records'] = $query->result(); 
        return $data; 
	}
	
	public function check_ques($question_array){
		$i=0;		
		if(!empty($question_array)){			
			foreach($question_array as $key => $ques_val){
				$this->db->select('answers'); 
				$this->db->from( 'sample_quiz' );
				$this->db->where("question_no", $key); 
				$query = $this->db->get(); 
				$data['records'] = $query->result();			
				$data_new = unserialize($data['records'][0]->answers);
				if($data_new[0] == $ques_val){
					$i++;				
				}
			}
			return $i;
		}else{
			redirect('samplequiz/view');
		}			
	}
}