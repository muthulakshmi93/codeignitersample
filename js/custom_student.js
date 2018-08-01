jQuery(document).ready(function (){

//stud page ajax city change

	jQuery('.choose_city').change(function(){
		var selected_value = jQuery(this).val();
		jQuery.ajax({
				url: 'stud/searchcityajax',									
				data: {
					'selected_value' : selected_value					
				},
				type: 'post',
				success: function(data){
					jQuery('.searched_result').html(data);
				}
		});
	});
// exam page
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
										
									}
								});
					});
			}
		});
		
	});
	
	//report page
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

	   //Attendance page
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
	   
	    jQuery('.choose_class').change(function(){
		   var class_id  = jQuery(this).val();
		   jQuery.ajax({
					url: 'getsection',									
					data: {											
						'class_id'	: class_id					
					},
					type: 'post',
					success: function(data){
						jQuery('.section_choose').html(data);
						
					}
		   });
	   });
});