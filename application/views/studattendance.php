  
<?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>

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
    text-decoration: none;
}
.form_details{width:50%;}
.form_details .left{width:20%; float:left;}
.clear{clear:both;}
.table_div{margin-top:40px;}
</style>
<script>
   jQuery(document).ready(function(){
	   jQuery('#choose_class').change(function(){
		   var class_id  = jQuery(this).val();
		   jQuery.ajax({
					url: 'attendance/getsection',									
					data: {											
						'class_id'	: class_id					
					},
					type: 'post',
					success: function(data){
						jQuery('.section_class').html(data);
						jQuery('.choose_sub').change(function(){
							var subj_id = jQuery(this).val();
							jQuery.ajax({
									url: 'attendance/getstudlist',									
									data: {
										'subj_id' : subj_id														
									},
									type: 'post',
									success: function(data){
										jQuery('.get_student_list').html(data);
										
									}
								});
						});
					}
		   });
	   });
   });
   </script>


<?php 
$day_array =array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
$total_day = count($day_array);
if(isset($classes)){
	echo 	form_open('StudentAttendance/getstudentdata');
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
	echo '<div class="table_div">';
	echo 	form_open('StudentAttendance/savestudentattendance');
	echo '<table><tr>';
	echo '<th></th>';
	foreach($day_array as $day){
	echo '<th>'.$day.'</th>';
	}
	echo '</tr>';
	$current_day =  date('l');
	$current_key = array_search ($current_day, $day_array);
	
	$args_list = array('id'=>'attendance','name'=>'attendance');

		foreach($student_list as $key => $student){				
			echo '<tr><td>'. $student->name .'</td>';
			$id 		= 'attendance_'.$key;
			$attendance_name 	='data[attendance]['.$key.'][attendance]';
			$id_name 	='data[attendance]['.$key.'][student_id]';
			$classid_name 	='data[attendance]['.$key.'][class_id]';
			$sectionid_name 	='data[attendance]['.$key.'][section_id]';
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
	echo 	form_close(); 
	echo '</div>';
}
if(isset($result_view)){
	echo '<h1> Attendance for class:'.$result_view[0]->class_name .' & Section:'.$result_view[0]->section .'</h1>';
	echo '<table><tr><th>Name</th><th>Attendance</th></tr>';
	foreach($result_view as $views){
		echo '<tr><td>'.$views->name .'</td><td>'.$views->attendance.'</td></tr>';
		
	}
	echo '</table>';
}
if(isset($status)){
	echo $status;
}

?>
