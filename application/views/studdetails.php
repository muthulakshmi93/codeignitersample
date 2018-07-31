 <!DOCTYPE html> 
<html lang = "en">
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
<head> 
  <meta charset = "utf-8"> 
  <title>Students Example</title> 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<style>
.menu_link {
	margin-top: 20px;
	float: right;
}
.menu_link a{ 
    padding: 10px;
    background-color: burlywood;
    border-radius: 3px;
    margin: 5px;
    color: #000;
}
.form_details{width:50%;}
.form_details .left{width:20%; float:left;}
</style>
<div class="menu_link">
      <a href = "<?php echo base_url(); ?>stud/add_view">Add</a>
	  <a href = "<?php echo base_url(); ?>samplequiz">Add Quiz Questions and answer</a>
      <a href = "<?php echo base_url(); ?>login">Login</a>
      <a href = "<?php echo base_url(); ?>user_authentication/user_registration_show">Register</a>
      <a href = "<?php echo base_url(); ?>exam">Exam Details</a>
	  <a href = "<?php echo base_url(); ?>report">Report</a>
	  <b id="logout"><a href="logout">Logout</a></b>
</div>
<h1>Student application form</h1>
<h4>Student details:</h4>
<?php 
			$attributes = array('class' => 'form_details', 'id' => 'form_details');
			echo form_open('studdetails/add_details',$attributes);
				
			echo '<div class="left">';
            echo form_label('Name'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'name','name'=>'data[std][name]')); 
			echo '</div>';
            echo "<br/>"; 
			
			echo '<div class="left">';
			echo form_label('Phone number'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'phone_number','name'=>'data[std][phone_number]')); 
			echo '</div>';
            echo "<br/>"; 
			
			echo '<div class="left">';
			echo form_label('City'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'city','name'=>'data[std][city]')); 
			echo '</div>';
            echo "<br/>"; 
			
			echo '<div class="left">';
			echo form_label('Class id'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'class_id','name'=>'data[std][class_id]')); 
			echo '</div>';
            echo "<br/>";
			echo '<div class="left">';
			echo form_label('Section id'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'section_id','name'=>'data[std][section_id]')); 
			echo '</div>';
            echo "<br/>";
			
			echo '<h4>Student login details:</h4>';
			
			echo '<div class="left">';
			echo form_label('Username'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'username','name'=>'data[stdlog][user_name]')); 
			echo '</div>';
            echo "<br/>"; 
			
			echo '<div class="left">';
            echo form_label('Email'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'email','name'=>'data[stdlog][user_email]')); 
			echo '</div>';
            echo "<br/>";  
			
			echo '<div class="left">';
			echo form_label('Password'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'password','name'=>'data[stdlog][user_password]','type'=>'password')); 
			echo '</div>';
            echo "<br/>"; 
			
			echo '<h4>Student Exam details:</h4>';	
			echo '<div class="left">';
			echo form_label('Exam id'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'exam_id','name'=>'data[stdex][exam_id]')); 
			echo '</div>';
            echo "<br/>"; 
			
			echo '<div class="left">';
            echo form_label('Subjects Marks'); 
			echo '</div><div class="right">';
            echo form_input(array('id'=>'marks','name'=>'data[stdex][sub_marks]')); 
			echo '</div>';
            echo "<br/>";   			
					
            echo form_submit(array('id'=>'submit','value'=>'Submit')); 
            echo form_close(); 

			if(isset($status)){
				echo $status;
			}
?>

</body>
</html>