<?php 
   class StudController extends AppController {
	
      function __construct() 
      { 
         parent::__construct(); 
		 $this->load->model('Stud_Model');
         $this->load->database(); 
		 
      } 
	   public function index() { 
		
	     $this->load->helper('form'); 
		  $this->load->view('page_header'); 
         $this->load->view('user_register'); 
		  $this->load->view('page_footer'); 
      } 
   }

?>