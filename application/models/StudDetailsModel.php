<?php
class StudDetailsModel extends CI_Model {
	
      function __construct() { 
         parent::__construct(); 
      } 
	  
	  public function InsertValue($tablename,$data){
		    $query = $this->db->insert($tablename, $data);
			return $this->db->insert_id();
		  
	  }
	  
	  
}