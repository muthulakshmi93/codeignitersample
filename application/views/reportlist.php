
 <?php
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
} else {
header("location: login");
}
?>
  
   <script>
   jQuery(document).ready(function(){
	   jQuery('.choose_exam').change(function(){
		   var exam_name  = jQuery(this).val();
		   jQuery.ajax({
					url: 'report/getsub',									
					data: {											
						'exam_name'	: exam_name					
					},
					type: 'post',
					success: function(data){
						jQuery('.subject_list').html(data);
						jQuery('.choose_sub').change(function(){
							var subj_id = jQuery(this).val();
							jQuery.ajax({
									url: 'report/getstudlist',									
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
</style>
	  
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
	  
