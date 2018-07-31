<?php
class AppController extends CI_Controller {
        function __construct() 
        { 
            parent::__construct(); 
            $this->load->helper('url'); 
            $this->load->helper('form');
        }
        public function index()
        {
            echo '<h1>Welcome to Sample CI</h1>';
        }
        public function student_info()
        {
            $stu_data = array();
            $stu_data['name'] = "test";
            $stu_data['age'] = "78";
            return $stu_data;
        }
   } 
?>