
 <?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
<h4>Choose exam to check result</h4>	  
<select name="choose_exam" class="choose_exam">
<option value="">Choose exam</option>
<?php 
if(isset($result)){
  foreach($result as $res){
	  echo '<option value="'.$res->exam_name .'">'.$res->exam_name . '</option>';
  } 
}

?>  
</select>
<div class="subject_list"></div>
	  
