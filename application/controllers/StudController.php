<?php 
include_once (dirname(__FILE__) . "/AppController.php");
   class StudController extends AppController {
	
      function __construct() 
      { 
         parent::__construct(); 
		 $this->load->model('Stud_Model');
         $this->load->database(); 
		 
      } 

    
  
      public function index() { 
	  $data=array();
	
	    $data = $this->Stud_Model->studentview(); 
		$data['page'] = "Stud_view";
		$this->load->view('template',$data);
		
      } 
  
      public function add_student_view() { 
	  $data=array();
         $this->load->helper('form'); 
		$data['page'] = "Stud_add";
		$this->load->view('template',$data);
         
		
      } 
  
      public function add_student() { 
		$data=array();
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|max_length[10]');      
		 if ($this->form_validation->run() == FALSE) {	
			//$this->form_validation->set_message('name', 'Name should not be empty');		 
			$data['page'] = "Stud_add";
			$this->load->view('template',$data);
         }else{
            $this->session->set_flashdata('item', 'form submitted successfully');            
			$savedata = array(           
				'name' 			=> $this->input->post('name') ,
				'phone_number' 	=> $this->input->post('phone_number'),
				'city' 			=> $this->input->post('city'), 
				'class_id' 		=> $this->input->post('class_id'), 
				'section_id' 	=> $this->input->post('section_id') 
			); 			
			$data = $this->Stud_Model->studentinsert($savedata);     
			$data['page'] = "Stud_view";
			$this->load->view('template',$data);
         }      
		 
      } 
  
		public function search_city(){
			$data=array();
			$searchdata = array( 
					'search_city' => $this->input->post('search_city')
			);
			$data= $this->Stud_Model->searchstudent($searchdata);  
			$data['page'] = "Stud_view";
			$this->load->view('template',$data);
		//	$this->load->view('Stud_view',$dosearch);	
			 			
		}
		public function searchcityajax(){
			$data=array();
			$data = array( 
					'selected_value' => $this->input->post('selected_value')
			);
			$doajsearch= $this->Stud_Model->searchstudentajax($data);
			
			if(is_array($doajsearch)){
				echo  '<table border = "1" style="float:left;"> ';
        
            $i = 1; 
            echo "<tr>"; 
        //    echo "<td>Sr#</td>"; 
            echo "<td>Roll No.</td>"; 
            echo "<td>Name</td>"; 
            echo "<td>Phone number</td>"; 
            echo "<td>City</td>"; 
            echo "<td>Edit</td>"; 
            echo "<td>Delete</td>"; 
            echo "<tr>"; 
				
            foreach($doajsearch['records'] as $r) { 
               echo "<tr>"; 
        //       echo "<td>".$i++."</td>"; 
               echo "<td>".$r->roll_no."</td>"; 
               echo "<td>".$r->name."</td>"; 
               echo "<td>".$r->phone_number."</td>"; 
               echo "<td>".$r->city."</td>"; 
               echo "<td><a href = '".base_url()."stud/edit/"
                  .$r->roll_no."'>Edit</a></td>"; 
               echo "<td><a href = '".base_url()."stud/delete/"
                  .$r->roll_no."'>Delete</a></td>"; 
               echo "<tr>"; 
            } 

			echo '</table>'; 
				
				
			}
			
			
		}
      public function update_student_view() { 
        $data =array();
         $roll_no = $this->uri->segment('3'); 
         $query = $this->db->get_where("student",array("roll_no"=>$roll_no));
         $data['records'] = $query->result(); 
         $data['old_roll_no'] = $roll_no; 
		 
		 $data['page'] = "Stud_edit";
			$this->load->view('template',$data);
      //   $this->load->view('Stud_edit',$data); 
		 
      } 
  
      public function update_student(){ 
        		
         $data = array( 
            'roll_no' => $this->input->post('roll_no'), 
            'name' => $this->input->post('name'),
            'phone_number' => $this->input->post('phone_number'),
            'city' => $this->input->post('city') 
         ); 
			
         $old_roll_no = $this->input->post('old_roll_no'); 
		 $data = $this->Stud_Model->studentupdate($data,$old_roll_no); 
		 $data['page'] = "Stud_view";
			$this->load->view('template',$data);
      //   $this->load->view('Stud_view',$data); 
		 
      } 
  
      public function delete_student() { 
         $this->load->model('Stud_Model'); 
         $roll_no = $this->uri->segment('3'); 
         $data = $this->Stud_Model->studentdelete($roll_no);  
		 $data['page'] = "Stud_view";
			$this->load->view('template',$data);	 
      //   $this->load->view('Stud_view',$data); 
		  
      } 
   } 
?>