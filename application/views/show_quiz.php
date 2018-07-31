<!DOCTYPE html> 
<html lang = "en">
<head> 
<meta charset = "utf-8"> 
<title>Students Example</title> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body> 
<?php 
	$i =1;
	if(isset($records)){
	echo '<h1>Quiz Questions</h1>';
		foreach($records as $rec){
				echo form_open('quizcontroller/check_quiz_total');
				echo form_label( $rec->questions );             
				echo "<br/>"; 			
				echo form_hidden('form_ques'.$i,$rec->question_no);
			$answers = unserialize($rec->answers);
			shuffle($answers);
			foreach($answers as $ans){
				echo form_radio(array('id'=>'ques'.$i,'name'=>'ques'.$i,'value'=>$ans)); 
				echo form_label($ans, 'ques'.$i);
				echo "<br/>"; 				
			}
			$i++;
		} 
		echo form_submit(array('id'=>'submit_quiz','value'=>'Submit')); 
		echo form_close();
	}	
	if(isset($result)){
		echo '<h1>Quiz Result</h1>';
		echo 'Your score is '.$result .'. Thanks for your interest in quiz.';
	}
?>
</body>
</html>