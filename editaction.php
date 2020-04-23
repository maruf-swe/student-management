<?php
	/*session_start();
	if(!isset($_SESSION['email'])){
		header('location:login.php');
	}*/
	include_once 'Crud.php';
	
	$crud = new Crud();
	
	
		$id = $_POST['id'];
		$name = $_POST['name'];
		$student_id = $_POST['student_id'];
		$email = $_POST['email'];
		
		$result = $crud->execute("Update student_info SET name='$name',student_id='$student_id',email='$email' where id=$id");
		
		if($result){
			echo 'success';
		}else{
			echo "problem";
		}
		
	
	
	
?>