<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Students Example</title> 
   </head>
	
   <body> 
      <a href = "http://localhost/sampleci/index.php/stud/add_view">Add</a>
		
      <table border = "1"> 
         <?php 
            $i = 1; 
            echo "<tr>"; 
            echo "<td>Sr#</td>"; 
            echo "<td>Roll No.</td>"; 
            echo "<td>Name</td>"; 
            echo "<td>Phone number</td>"; 
            echo "<td>City</td>"; 
            echo "<td>Edit</td>"; 
            echo "<td>Delete</td>"; 
            echo "<tr>"; 
				
            foreach($result as $r) { 
               echo "<tr>"; 
               echo "<td>".$i++."</td>"; 
               echo "<td>".$r->roll_no."</td>"; 
               echo "<td>".$r->name."</td>"; 
               echo "<td>".$r->phone_number."</td>"; 
               echo "<td>".$r->city."</td>"; 
               echo "<td><a href = '".base_url()."index.php/stud/edit/"
                  .$r->roll_no."'>Edit</a></td>"; 
               echo "<td><a href = '".base_url()."index.php/stud/delete/"
                  .$r->roll_no."'>Delete</a></td>"; 
               echo "<tr>"; 
            } 
         ?>
      </table> 
	  <?php 
			echo form_open('Stud_controller/search_city');
            echo form_label('Enter City name to search'); 
            echo form_input(array('id'=>'search_city','name'=>'search_city')); 
            echo "<br/>"; 
			echo form_submit(array('id'=>'search_submit','value'=>'Search')); 
            echo form_close(); 
			
	?>
		
   </body>
	
</html>