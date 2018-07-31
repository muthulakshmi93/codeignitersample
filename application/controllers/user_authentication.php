<?php

//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('form'); 	// Load form helper library		
		$this->load->library('form_validation'); // Load form validation library		
		$this->load->library('session');// Load session library		
		$this->load->model('login_database'); // Load database
	}

	// Show login page
	public function index() {
						$data['page'] = "login_form";
				$this->load->view('template',$data);
	//	$this->load->view('login_form');
		
	}

	// Show registration page
	public function user_registration_show() {
					$data['page'] = "registration_form";
				$this->load->view('template',$data);
	//	$this->load->view('registration_form');
		 
	}

	// Validate and store registration data in database
	public function new_user_registration() 
	{
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|Enter valid name');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean|Enter valid email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|Enter valid password');
		if ($this->form_validation->run() == FALSE) 
		{
				$data['page'] = "registration_form";
				$this->load->view('template',$data);
		//	$this->load->view('registration_form');
			
		} 
		else 
		{
			$data = array(
			'user_name' => $this->input->post('username'),
			'user_email' => $this->input->post('email_value'),
			'user_password' => $this->input->post('password')
			);
			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) 
			{
				$data['message_display'] = 'Registration Successfully !';
								$data['page'] = "login_form";
				$this->load->view('template',$data);
			//	$this->load->view('login_form', $data);
				
			} 
			else 
			{
				$data['message_display'] = 'Username already exist!';
								$data['page'] = "registration_form";
				$this->load->view('template',$data);
			//	$this->load->view('registration_form', $data);
				
			}
		}
	}

	// Check for user login process
	public function user_login_process() 
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		$this->login_database->change_user_status();
		if ($this->form_validation->run() == FALSE) 
		{
			if(isset($this->session->userdata['logged_in']))
			{
				$data['page'] = "admin_page";
				$this->load->view('template',$data);
				//$this->load->view('admin_page');
				
			}
			else
			{
				 $data['page'] = "login_form";
				$this->load->view('template',$data);
				//$this->load->view('login_form');
				
			}
		} 
		else 
		{
			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);
			$result = $this->login_database->login($data);
			if ($result == TRUE) 
			{
				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if ($result != false) 
				{
					$session_data = array(
					'username' => $result[0]->user_name,
					'email' => $result[0]->user_email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$data['page'] = "admin_page";
				$this->load->view('template',$data);
//$this->load->view('admin_page');

				}
			} 
			else 
			{
				$username = $this->input->post('username');
				$result = $this->login_database->changecount($username);
				$user_count = $result['records'][0]->usercount;
				if($user_count >=5){
				$data = array(
					'error_message' => 'Limit exceed. Please contact admin for login.'
				);
				} elseif (($user_count >=3)&&($user_count <5)){
					$data = array(
					'error_message' => 'Your account has been diabled. Please try after one hour.'
				);
				} else {
					$data = array(
					'error_message' => 'Invalid Username or Password'
					);
				}
				$data['page'] = "login_form";
				$this->load->view('template',$data);
			}
		}
	}

	// Logout from admin page
	public function logout() 
	{

		// Removing session data
		$sess_array = array(
		'username' => ''
		);
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$data['page'] = "login_form";
		$this->load->view('template',$data);
		//$this->load->view('login_form', $data);
		
}

}

?>