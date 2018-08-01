<?php 

class examcontroller extends CI_Controller {
		function __construct(){ 
			 parent::__construct(); 
			 $this->load->model('exammodel');
			 $this->load->helper('form'); 
			 $this->load->database(); 
		} 
		public function index(){
			$data = array();
			$data = $this->exammodel->getexam();
			 $data['page'] = "examshow";
			$this->load->view('template',$data);
			//$this->load->view('examshow',$getexam);
						
		}
		public function GetExamSub(){
			$examid = $this->input->post('exam_id');
			$data = array(
			'exam_name' => $this->input->post('exam_name')			
			);
			$getexamsub = $this->exammodel->getexamsub($data);	
			echo '<h4>Choose subject for <strong>'.$this->input->post('exam_name') .'</strong></h4>';
			foreach($getexamsub['result'] as $res){
				  echo '<button type="button" class="subjname" data-exid="'.$res->id.'">'.$res->subject_name . '</button>';
			} 
			echo '<div class="enter_mark"></div>';					
		}		
		public function getfield(){
			$examid = $this->input->post('subjid');
			$getstud = $this->exammodel->getstudentlist($examid);			
			echo 'Enter details for Exam: <strong>'.$getstud['result'][0]->exam_name .'</strong> & Subject <strong>'.$getstud['result'][0]->subject_name .'</strong>' ;
			echo form_open('examcontroller/savemarks');
			echo '<table><tr><th>Name</th><th>max mark('.$getstud['result'][0]->max_mark .')</th></tr>';
			foreach($getstud['result'] as $stud){				
				echo '<tr><td>'.$stud->name.'</td><td>'. form_input(array('id'=>'marks'.$stud->roll_no,'name'=>'marks'.$stud->roll_no,'type'=>'number','max'=>$stud->max_mark)).'</td></tr>';				
			}
			echo form_hidden('subjectid',$examid);
			echo form_hidden('max_marks',$getstud['result'][0]->max_mark);			
			echo '<tr><td>'. form_submit(array('id'=>'submit_value','value'=>'Submit')) .'</td></tr>';
			echo '</table>';
			echo form_close(); 
			echo '<div class="error"></div>';
		}
		public function savemarks(){			
			$data = $this->exammodel->savemarks();	
			$data['page'] = "examshow";
			$this->load->view('template',$data);
			//$this->load->view('examshow',$save_data);
			
		}
}