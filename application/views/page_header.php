<!DOCTYPE html> 
<html lang = "en">
<head> 
	<meta charset = "utf-8"> 
	<title>Students Example</title> 
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/custom_student.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
	
</head>	
<body>
	<div class="menu_link">
		<a href = "<?php echo base_url(); ?>stud">Student list</a>
		<a href = "<?php echo base_url(); ?>stud/add_view">Add</a>
		<a href = "<?php echo base_url(); ?>samplequiz">Add Quiz Questions and answer</a>
		<?php if (!(isset($this->session->userdata['logged_in']))) { ?>
		<a href = "<?php echo base_url(); ?>login">Login</a>
		<a href = "<?php echo base_url(); ?>user_authentication/user_registration_show">Register</a> 
		<?php } ?>
		<a href = "<?php echo base_url(); ?>exam">Exam Details</a>
		<a href = "<?php echo base_url(); ?>report">Report</a>
		<a href = "<?php echo base_url(); ?>attendance">Attendance</a>
		<a href = "<?php echo base_url(); ?>studentdetails">Student details</a>
		<!--<a href = "<?php echo base_url(); ?>attendance/viewatten">View Attendance</a>-->
		<?php if (isset($this->session->userdata['logged_in'])) { ?>
		<a href="<?php echo base_url(); ?>logout">Logout</a>
		<?php } ?>
	</div>
<div class="clear"></div>

<div class="container">