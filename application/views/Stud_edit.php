<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Students Example</title> 
   </head> 
	
   <body> 
		
         <?php 
            echo form_open('StudController/update_student'); 
            echo form_hidden('old_roll_no',$old_roll_no); 
            echo form_label('Roll No.'); 
            echo form_input(array('id'=>'roll_no','name'=>'roll_no','value'=>$records[0]->roll_no)); 
            echo "<br/>"; 

            echo form_label('Name'); 
            echo form_input(array('id'=>'name','name'=>'name','value'=>$records[0]->name)); 
            echo "<br/>"; 
			
			echo form_label('Phone number'); 
            echo form_input(array('id'=>'phone_number','name'=>'phone_number','value'=>$records[0]->phone_number)); 
            echo "<br/>"; 
			
			echo form_label('City'); 
            echo form_input(array('id'=>'city','name'=>'city','value'=>$records[0]->city)); 
            echo "<br/>"; 
			

            echo form_submit(array('id'=>'submit','value'=>'Edit')); 
            echo form_close();
         ?> 
	
   </body>
	
</html>