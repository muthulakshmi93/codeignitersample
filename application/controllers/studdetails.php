<?php 

class studdetails extends CI_Controller {
		function __construct(){ 
			 parent::__construct(); 
			 $this->load->model('StudDetailsModel');
			 $this->load->helper('form'); 
			 $this->load->database(); 
		}

		public function index(){
			 $data['page'] = "studdetails";
			$this->load->view('template',$data);
//$this->load->view('studdetails'); 	
			 
		}
		public function add_details(){			
		
				//Table 1					
			$_POST['data']['stdlog']['user_id']= $this->StudDetailsModel->InsertValue('student',$_POST['data']['std']);			
				//Table 2			
			$_POST['data']['stdex']['stud_id']=$this->StudDetailsModel->InsertValue('user_details',$_POST['data']['stdlog']);						
				//Table 3			
			$this->StudDetailsModel->InsertValue('marks',$_POST['data']['stdex']);
			
			$data['status'] ='successfully inserted on multiple tables. :-) ';
			 $data['page'] = "studdetails";
			$this->load->view('template',$data);
		//	$this->load->view('studdetails',$data); 		
			 
			
		}
}