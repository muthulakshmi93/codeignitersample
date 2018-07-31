<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Students Example</title> 
   </head> 
   <body> 
         <?php 
            echo form_open('StudController/add_student');
            /* echo form_label('Roll No.'); 
            echo form_input(array('id'=>'roll_no','name'=>'roll_no')); 
            echo "<br/>";  */
			
            echo form_label('Name'); 
            echo form_input(array('id'=>'name','name'=>'name','value' => set_value('name'))); 
            echo "<br/>";  
			
			echo form_label('Phone number'); 
            echo form_input(array('id'=>'phone_number','name'=>'phone_number','value' => set_value('phone_number'))); 
            echo "<br/>"; 
			
			echo form_label('City'); 
            echo form_input(array('id'=>'city','name'=>'city','value' => set_value('city'))); 
            echo "<br/>";
			echo form_label('Class id'); 
            echo form_input(array('id'=>'class_id','name'=>'class_id','value' => set_value('class_id'))); 
            echo "<br/>"; 
			echo form_label('Section id'); 
            echo form_input(array('id'=>'section_id','name'=>'section_id','value' => set_value('section_id'))); 
            echo "<br/>"; 
			
            echo form_submit(array('id'=>'submit','value'=>'Add')); 
            echo form_close(); 
         ?> 
   </body>
</html>