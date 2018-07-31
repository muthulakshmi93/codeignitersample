
		
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
               echo "<td>".$r->class_id."</td>"; 
               echo "<td>".$r->section_id."</td>"; 
               echo "<td><a href = '".base_url()."stud/edit/"
                  .$r->roll_no."'>Edit</a></td>"; 
               echo "<td><a href = '".base_url()."stud/delete/"
                  .$r->roll_no."'>Delete</a></td>"; 
               echo "</tr>"; 
            } 
         ?>
      </table>
	  <?php if(!empty($result)){ ?>
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
	  <?php 
			echo form_open('StudController/search_city');
            echo form_label('Enter City name to search'); 
            echo form_input(array('id'=>'search_city','name'=>'search_city')); 
            echo "<br/>"; 
			echo form_submit(array('id'=>'search_submit','value'=>'Search')); 
            echo form_close(); 			
	?>
	<script>
	jQuery(document).ready(function(){
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
	});
	</script>
  