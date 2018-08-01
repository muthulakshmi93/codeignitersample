<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Students Example</title> 
   </head> 
	
   <body> 
		
         <?php 
		 $attributes = array('class'=>'form_details');
            echo form_open('StudController/update_student',$attributes); 
			
            echo form_hidden('old_roll_no',$records[0]->roll_no); 
			/* echo '<div class="left">';
            echo form_label('Roll No.'); 
			echo '</div>';
            echo form_input(array('id'=>'roll_no','name'=>'roll_no','value'=>$records[0]->roll_no)); 
            echo "<br/>"; 
			 */
			echo '<div class="left">';
            echo form_label('Name'); 
			echo '</div>';
            echo form_input(array('id'=>'name','name'=>'name','value'=>$records[0]->name)); 
            echo "<br/>"; 
			
			echo '<div class="left">';
			echo form_label('Phone number'); 
			echo '</div>';
            echo form_input(array('id'=>'phone_number','name'=>'phone_number','value'=>$records[0]->phone_number)); 
            echo "<br/>"; 
			
			echo '<div class="left">';
			echo form_label('City');
			echo '</div>';
            echo form_input(array('id'=>'city','name'=>'city','value'=>$records[0]->city)); 
            echo "<br/>";
			
/* 			echo '<div class="left">';
			echo form_label('Class');
			echo '</div>';
            echo form_input(array('id'=>'class','name'=>'class_id','value'=>$records[0]->class_name)); 
            echo "<br/>";
			
			echo '<div class="left">';
			echo form_label('Section');
			echo '</div>';
            echo form_input(array('id'=>'section_id','name'=>'section_id','value'=>$records[0]->section)); 
            echo "<br/>";  */
			

            echo form_submit(array('id'=>'submit','value'=>'Edit')); 
            echo form_close();
         ?> 
	
   </body>
	
</html>