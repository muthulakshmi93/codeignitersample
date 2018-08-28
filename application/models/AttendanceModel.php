<?php
class AttendanceModel extends CI_Model {	
      function __construct() { 
         parent::__construct(); 
      } 
	  public function GetClass(){
			$this->db->select('*');
			$this->db->from('class');		
			$query = $this->db->get(); 
			$data['classes'] = $query->result();
			return $data;
	  }
	  public function GetSectionList($class_id){
			$this->db->select('*');
			$this->db->from('section');	
			$this->db->where('class_id',$class_id);			
			$query = $this->db->get(); 
			$data['section'] = $query->result();
			return $data;
	  }
	  public function GetStudentList(){
			$class_id 		= $this->input->post('class_id');
			$section_id 	= $this->input->post('section_id');
		  if(isset($_POST['getubmit'])){
			
			$where_con = array('class_id'=>$class_id,'section_id'=>$section_id);
			$this->db->select('roll_no,name,class_id,section_id');
			$this->db->from('student');	
			$this->db->where($where_con);			
			$query = $this->db->get(); 
			$data['student_list'] = $query->result();
		  }
		  if(isset($_POST['viewsubmit'])){
				$from_date 		= $this->input->post('from_date');
				$to_date	 	= $this->input->post('to_date');
			  // SELECT a.student_id,a.attendance,s.name FROM `attendance` as a,`student` as s where a.student_id=s.roll_no AND a.class_id=1 AND a.section_id=1
			$where_con = array('attendance.class_id'=>$class_id,'attendance.section_id'=>$section_id,'created >='=>$from_date,'created <='=>$to_date);
			$this->db->select('student.roll_no,  student.name, attendance.attendance ,class.class_name,section.section,attendance.created');
			$this->db->from('attendance');			
			$this->db->join('student', 'student.roll_no = attendance.student_id');
			$this->db->join('section', 'section.id = '.$section_id);
			$this->db->join('class', 'class.id = '.$class_id);
			$this->db->where($where_con);	
			$this->db->order_by("attendance.created","asc");	
			//$this->db->group_by('created'); 
			$query 	= $this->db->get(); 
			$res 	= $this->db->last_query();		
			$period = new DatePeriod(
				 new DateTime($from_date),
				 new DateInterval('P1D'),
				 new DateTime($to_date)
			);			
			foreach ($period as $key => $value) {
				$data['datearray'][]=$value->format('d-m-Y');     
			}
			$data['result_view'] = $query->result();
			
		  }
			return $data;
	  }
	  public function SaveAttendance(){		 
			 $total_count = count($_POST['data']['attendance']);
			 for($i =0;$i<$total_count;$i++){
				 $_POST['data']['attendance'][$i]['created']=date('Y-m-d');
				  $data1 = $this->db->insert("attendance", $_POST['data']['attendance'][$i]);				
			 }
			 $data['status'] ='success';
			 return $data;	  
	  }
}