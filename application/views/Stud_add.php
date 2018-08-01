<?php 
$attributes = array('class' => 'form_details', 'id' => 'add_student_details');
echo '<div class="content-page">';
echo form_open('StudController/add_student',$attributes);

echo '<div class="whole_div"><div class="left">';
	echo form_label('Name'); 
echo '</div>';
echo form_input(array('id'=>'name','name'=>'name','value' => set_value('name'))); 
echo form_error('name'); 
echo "</div><br/>";  

echo '<div class="whole_div"><div class="left">';
	echo form_label('Phone number'); 
echo '</div>';
echo form_input(array('id'=>'phone_number','name'=>'phone_number','value' => set_value('phone_number'))); 
echo "</div><br/>"; 

echo '<div class="whole_div"><div class="left">';
	echo form_label('City'); 
echo '</div>';
echo form_input(array('id'=>'city','name'=>'city','value' => set_value('city'))); 
echo "</div><br/>";

echo '<div class="whole_div"><div class="left">';
	echo form_label('Class'); 
echo '</div>';
$class_array[]='Choose Class';
foreach($classes as $class){
	$class_array[$class->id] = $class->class_name; 
	//echo form_input(array('id'=>'class_id','name'=>'class_id','value' => set_value('class_id'))); 
}
echo form_dropdown('class_id',$class_array,'','class=choose_class');
echo "</div><br/>"; 

echo '<div class="whole_div"><div class="section_choose">';
echo '</div></div>';
echo "<br/>"; 

echo form_submit(array('id'=>'submit','value'=>'Add')); 
echo form_close(); 
echo '</div>';
?> 
   