<?php
$attributes = array('class' => 'form_details');
echo '<div class="content-page">';
echo form_open('quizcontroller/addquestion',$attributes);

echo '<div class="left">';
echo form_label('Question'); 
echo '</div>';
echo form_input(array('quiz'=>'q_question','name'=>'q_question')); 
echo "<br/>"; 

echo '<div class="left">';
echo form_label('Correct Answer'); 
echo '</div>';
echo form_input(array('id'=>'c_answer','name'=>'c_answer[]')); 
echo "<br/>";  

echo '<div class="left">';
echo form_label('Other answers'); 
echo '</div>';
echo form_input(array('id'=>'c_answer1','name'=>'c_answer[]')); 
echo "<br/>"; 

echo '<div class="left">';
echo form_label('Other answers'); 
echo '</div>';
echo form_input(array('id'=>'c_answer2','name'=>'c_answer[]')); 
echo "<br/>"; 

echo form_submit(array('id'=>'submit','value'=>'Add')); 
echo form_close();
if(isset($success)){
	echo 'Inserted successfully.';
}
echo '</div>';

?> 
  