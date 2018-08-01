  
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
<?php 
$day_array =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$total_day = count($day_array);
if(isset($classes)){
	$attributes = array('class'=>'form_details attendance_class');
	echo 	'<h4>Choose class to enter or view attendance </h4>';
	echo 	form_open('StudentAttendance/getstudentdata',$attributes);
	echo 	'<select id="choose_class" name="class_id">
			<option>Choose Class</option>';
			foreach($classes  as $class){
				echo '<option value="'.$class->id .'">'.$class->class_name .'</option>';
			}
	echo 	'</select>';
	echo 	'<div class="section_class"></div>';
    echo 	form_close(); 
}
if(isset($student_list)){
	$attributes = array('class'=>'form_details');
	echo '<div class="table_div">';
	echo 	form_open('StudentAttendance/savestudentattendance',$attributes);
	echo '<table><tr>';
	echo '<th></th>';
	foreach($day_array as $day){
	echo '<th>'.$day.'</th>';
	}
	echo '</tr>';
	$current_day 	= date('l');
	$current_key 	= array_search ($current_day, $day_array);
	
	$args_list 		= array('id'=>'attendance','name'=>'attendance');

		foreach($student_list as $key => $student){				
			echo '<tr><td>'. $student->name .'</td>';
			$id 				= 'attendance_'.$key;
			$attendance_name 	= 'data[attendance]['.$key.'][attendance]';
			$id_name 			= 'data[attendance]['.$key.'][student_id]';
			$classid_name		= 'data[attendance]['.$key.'][class_id]';
			$sectionid_name 	= 'data[attendance]['.$key.'][section_id]';
			for($ik=0; $ik<$total_day ; $ik++){
			if($current_key != $ik){			
				
			$args = array('id'=>$id,'name'=>$attendance_name,'disabled'=>'disabled');
			
			}	else{
				$args = array('id'=>$id,'name'=>$attendance_name);
			} 
			
			echo '<td>'.form_input($args) .'</td>';
			}
			'</tr>';
			echo form_hidden($id_name, $student->roll_no );
			echo form_hidden($classid_name, $student->class_id );
			echo form_hidden($sectionid_name, $student->section_id );
		}	
	echo '</table>';
	echo form_submit(array('id'=>'submit','value'=>'Submit')); 
	echo form_close(); 
	echo '</div>';
}
if(isset($result_view)){
	echo '<h1> Attendance for class:'.$result_view[0]->class_name .' & Section:'.$result_view[0]->section .'</h1>';
	echo '<table><tr><th>Name</th><th>Attendance</th><th>Date</th></tr>';
	foreach($result_view as $views){
		$datefull = strtotime($views->created);
		$date_attendance = date('d-m-Y',$datefull);
		echo '<tr><td>'.$views->name .'</td><td>'.$views->attendance.'</td><td>'.$date_attendance.'</td></tr>';		
	}
	echo '</table>';
}
if(isset($status)){
	echo $status;
}

?>
