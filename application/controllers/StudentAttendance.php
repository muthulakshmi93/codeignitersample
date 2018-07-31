<?php 

class StudentAttendance extends CI_Controller {
		function __construct(){ 
			 parent::__construct(); 
			 $this->load->model('AttendanceModel');
			 $this->load->helper('form'); 
			 $this->load->database(); 
		} 
		public function index(){
			$data = $this->AttendanceModel->GetClass();
			$data['page'] = "studattendance";
			$this->load->view('template',$data);
			//$this->load->view('studattendance',$data); 				
			 
		}
		public function GetSection(){
			$class_id 	= $this->input->post('class_id');
			$data 		= $this->AttendanceModel->GetSectionList($class_id);
			echo 		'<select class="choose_section" name="section_id"><option>Choose Section</option>';
			foreach($data['section'] as $sec){
				echo '<option value="'.$sec->id .'">'.$sec->section .'</option>';
			}
			echo 	'</select>';
			echo 	form_submit(array('id'=>'classsubmit','value'=>'Submit','name'=>'getubmit')); 
			echo 	form_submit(array('id'=>'viewsubmit','value'=>'View' ,'name'=>'viewsubmit')); 
						
		}
		public function getstudentdata(){
				$data = $this->AttendanceModel->GetStudentList();
				$data['page'] = "studattendance";
				$this->load->view('template',$data);
			//	$this->load->view('studattendance',$data); 				
				
		}
		public function savestudentattendance(){				 
			$data = $this->AttendanceModel->SaveAttendance();
			$data['page'] = "studattendance";
			$this->load->view('template',$data);
			//$this->load->view('studattendance',$data); 	
			
		}
		
}