<?php
   class quizcontroller extends CI_Controller {
	
       function __construct() 
		{ 
         parent::__construct(); 
		 $this->load->model('quiz_model');
		 $this->load->helper('form'); 
         $this->load->database(); 
		} 
	  
		public function index()
		{
			$data['page'] = "add_quiz";
			$this->load->view('template',$data);
			//$this->load->view('add_quiz'); 
			
		}
		
		public function addquestion(){
			$adddata = array( 				
				'questions' => $this->input->post('q_question'), 
				'answers' => $this->input->post('c_answer') ,				 
			); 
			$data= $this->quiz_model->question_insert($adddata); 
			 $data['page'] = "add_quiz";
			$this->load->view('template',$data);
//$this->load->view('add_quiz',$doinsert_quiz);
			 
		}
		
		public function getQuestions(){
			$data = $this->quiz_model->get_ques();
			 $data['page'] = "show_quiz";
			$this->load->view('template',$data);
		//	$this->load->view('show_quiz',$data);
			 
		}
		
		public function check_quiz_total(){
			$new_array = array();
			$ques_count = count($_POST)/2;			
			for($i = 1 ; $i<=$ques_count; $i++){
				$question_array[$_POST['form_ques'.$i]]=$_POST['ques'.$i];				
			}	
			$data['result'] = $this->quiz_model->check_ques($question_array);
			 $data['page'] = "show_quiz";
			$this->load->view('template',$data); 
		//	$this->load->view('show_quiz',$data);	
					
		}

   }	  
 
?>