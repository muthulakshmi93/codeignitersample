<?php 

class reportcontroller extends CI_Controller {
	function __construct() 
		{ 
         parent::__construct(); 
		 $this->load->model('exammodel');
		 $this->load->model('reportmodel');
		 $this->load->helper('form'); 
         $this->load->database(); 
		} 
		
	public function index(){
		$data = $this->exammodel->getexam();
		 $data['page'] = "reportlist";
			$this->load->view('template',$data);
	//	$this->load->view('reportlist',$getexam); 
		 
	}
	
	public function getsub(){
		$data = array(
			'exam_name' => $this->input->post('exam_name')			
			);
		$getexamsub = $this->exammodel->getexamsub($data);	
		echo '<div class="">Choose subject for <strong>'.$this->input->post('exam_name') .'</strong></div><select name="choose_sub" class="choose_sub"><option>Choose subject</option>';
			 foreach($getexamsub['result'] as $res){
				  echo '<option value="'. $res->id .'">'.$res->subject_name . '</option>';
			  } 
			  echo '</select>
			  <div class="get_student_list"></div>';
	}
	
	public function getstudlist(){
		$examid = $this->input->post('subj_id');
		$getstud = $this->reportmodel->getstudentlist($examid);							
			echo '<table><tr><th>Roll no</th><th>Name</th><th>Marks</th><th>Result</th></tr>';
			foreach($getstud['result'] as $stud){						
				echo '<tr><td>'.$stud->roll_no .'</td><td>'.$stud->name .'</td><td>'.$stud->sub_marks .'</td><td>'.$stud->Result .'</td></tr>';				
			}			
			echo '</table>';			
			echo '<div class="error"></div>';
	}
	
}