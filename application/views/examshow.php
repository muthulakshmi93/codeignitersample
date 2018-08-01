<?php
if (isset($this->session->userdata['logged_in'])) {
	$username = ($this->session->userdata['logged_in']['username']);
	$email = ($this->session->userdata['logged_in']['email']);
} else {
	header("location: login");
}

if(isset($result)){
	echo '<div class="choose_exam_div">';
	echo '<h4>Choose exam and subject to enter marks.</h4>';
	foreach($result as $res){
		echo '<button type="button" data-ex="'.$res->exam_name .'" class="examn" data-exid="'.$res->id.'">'.$res->exam_name . '</button>';
	} 
	echo '</div>';
}
if(isset($success)){
	echo $success;
}?>
<div class="exam_subject"></div>
	