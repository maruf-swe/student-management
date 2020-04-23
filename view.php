<?php
 header("Access-Control-Allow-Origin: *");
/*session_start();
if(!isset($_SESSION['email'])){
	header('location:login.php');
}*/
include_once 'Crud.php';

$crud = new Crud();

$query = "Select * from student_info order by id DESC";

$result = $crud->getData($query);

?>
<button id="add-data">Add New Data</button>
<!--<center> Welcome <?php //echo $_SESSION['name'];?>

</center>
<a href="logout.php">Log Out</a>-->
<table border="1">

	<tr>
		<td> Name </td>
		<td> Student ID </td>
		<td> Email </td>
		<td> Action </td>
	</tr>
	<?php
	 foreach($result as $key=>$res){
		 echo "<tr >";
		 echo "<td>".$res['name']."</td>";
		 echo "<td>".$res['student_id']."</td>";
		 echo "<td>".$res['email']."</td>";
		 echo "<td><button id=".$res['id']." class='edit'>Edit</button> | 
		 <button id=".$res['id']." class='delete'>Delete</button></td>";
		 echo "</tr>";
	 }
	 ?>
</table>
<script type="text/javascript">
	$(document).ready(function(){
		$('#add-data').click(function(){
			$('#add-form').slideDown();
		})
		
		$('.edit').click(function(){
			var id = $(this).attr('id');
			//alert(id);
			$.ajax({
				url:"edit.php",
				type:"POST",
				data: {id:id},
				success: function(data){
					$('#edit-form').show();
					$('#edit-form').html(data);
				}
			})
		})
		
		$('.delete').click(function(){
			var id = $(this).attr('id');
			//alert(id);
			$.ajax({
				url:"delete.php",
				type:"POST",
				data: {id:id},
				success: function(data){
					//$('#edit-form').show();
					//$('#edit-form').html(data);
					if(data == 'success'){
					$.get('view.php',function(data){
							$('#data-show').html(data);
						})
					}
				}
			})
		})
		
		
		
	})
</script>