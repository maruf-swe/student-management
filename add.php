<?php
	
	include_once 'Crud.php';
	
	$crud = new Crud();
	

		$name = $_POST['name'];
		$student_id = $_POST['student_id'];
		$email = $_POST['email'];
		
		$result = $crud->execute("INSERT into student_info(name,student_id,email) VALUES('$name','$student_id','$email')");
		
		if($result){
			echo "success";
		}else{
			echo "problem";
		}
		
	
	
?>