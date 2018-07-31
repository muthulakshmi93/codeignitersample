<?php 
   class reportmodel extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  
	  public function getstudentlist($examid){	  
			/* SELECT IF((marks.sub_marks > 50), Pass , Fail) s.name,m.sub_marks FROM `student` as s, `marks` as m WHERE m.stud_id=s.roll_no AND m.exam_id = 4  */			
			/* , IF((marks.sub_marks > 50), Pass , Fail) */			
			$this->db->select('IF((marks.sub_marks > 50), "Pass" , "Fail") as Result, student.roll_no,  student.name, marks.sub_marks, exam.max_mark');
			$this->db->from('marks');
			$this->db->join('exam', 'exam.id ='.$examid);
			$this->db->join('student', 'student.roll_no = marks.stud_id');
			$this->db->where('marks.exam_id',$examid);
			$this->db->order_by("marks.sub_marks", "desc");
			$query = $this->db->get(); 
			$res = $this->db->last_query();
			$data_student['result'] = $query->result();			
			return $data_student;			 
	  }	  
   }