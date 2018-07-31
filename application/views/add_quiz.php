<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Students Example</title> 
   </head> 
   <body> 
         <?php
			
            echo form_open('quizcontroller/addquestion');
            echo form_label('Question'); 
            echo form_input(array('quiz'=>'q_question','name'=>'q_question')); 
            echo "<br/>"; 
			
            echo form_label('Correct Answer'); 
            echo form_input(array('id'=>'c_answer','name'=>'c_answer[]')); 
            echo "<br/>";  
			
			echo form_label('Other answers'); 
            echo form_input(array('id'=>'c_answer1','name'=>'c_answer[]')); 
            echo "<br/>"; 
			
			echo form_label('Other answers'); 
            echo form_input(array('id'=>'c_answer2','name'=>'c_answer[]')); 
            echo "<br/>"; 
			
            echo form_submit(array('id'=>'submit','value'=>'Add')); 
            echo form_close();
			if(isset($success)){
				echo 'Inserted successfully.';
			}
			
         ?> 
   </body>
</html>