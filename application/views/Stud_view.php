<div class="table_list">	
	<table border = "1" style="float:left;"> 
		<?php 
		$i = 1; 
		echo "<tr>";             
		echo "<td>Roll No.</td>"; 
		echo "<td>Name</td>"; 
		echo "<td>Phone number</td>"; 
		echo "<td>City</td>"; 
		echo "<td>Class id</td>"; 
		echo "<td>Section id</td>"; 
		echo "<td>Edit</td>"; 
		echo "<td>Delete</td>"; 
		echo "<tr>"; 

		foreach($records as $r) { 
			echo "<tr>";               
			echo "<td>".$r->roll_no."</td>"; 
			echo "<td>".$r->name."</td>"; 
			echo "<td>".$r->phone_number."</td>"; 
			echo "<td>".$r->city."</td>"; 
			echo "<td>".$r->class_name."</td>"; 
			echo "<td>".$r->section."</td>"; 
			echo "<td><a href = '".base_url()."stud/edit/".$r->roll_no."'>Edit</a></td>"; 
			echo "<td><a href = '".base_url()."stud/delete/".$r->roll_no."'>Delete</a></td>"; 
			echo "</tr>"; 
		} 
		?>
	</table>
</div>
<?php if(!empty($result)){ ?>
<div class="ajax_search">
	<h4>Search by city without page load </h4>
	<select id="choose_city" class="choose_city">
		<option>Choose City</option>
		<?php
		foreach($result as $results){
			echo '<option value="'.$results->city.'">'. $results->city .'</option>';
		} ?>
	</select>

	<?php } ?>
	<div class="searched_result"></div>
	<div class="clear" style="clear:both;"></div>
</div>
<?php 
$attributes = array('class' => 'form_details_stud');
echo form_open('StudController/search_city',$attributes);
echo '<h4>Search by city with page load</h4>';
echo '<div class="left">';
echo form_label('Enter City name to search'); 
echo form_input(array('id'=>'search_city','name'=>'search_city')); 
echo form_submit(array('id'=>'search_submit','value'=>'Search')); 
echo '</div>';
echo form_close(); 			
?>
	
  