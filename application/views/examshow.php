
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
		jQuery('.examn').click(function(){
			var exam_name = jQuery(this).attr('data-ex');
			var exam_id = jQuery(this).attr('data-exid');
			jQuery.ajax({
					url: 'exam/getsub',									
					data: {
						'exam_name' : exam_name,					
						'exam_id'	: exam_id					
					},
					type: 'post',
					success: function(data){
						jQuery('.exam_subject').html(data);
						jQuery('.subjname').click(function(){
							var subjid = jQuery(this).attr('data-exid');
								jQuery.ajax({
									url: 'exam/entersubtotal',									
									data: {
										'subjid' : subjid														
									},
									type: 'post',
									success: function(data){
										jQuery('.enter_mark').html(data);
										/* jQuery('#submit_value').click(function(e){
											var max_marks = jQuery('')
										}); */
									}
								});
					});
			}
		});
		
	});
});
	</script>
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
	text-decoration: none;
	}
</style>
	
	  
	  <?php 
	  if(isset($result)){
		  foreach($result as $res){
			  echo '<button type="button" data-ex="'.$res->exam_name .'" class="examn" data-exid="'.$res->id.'">'.$res->exam_name . '</button>';
		  } 
	  }
	  if(isset($success)){
		  echo $success;
	  }?>
	  <div class="exam_subject"></div>
	