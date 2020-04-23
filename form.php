<?php 
include('config.php');
error_reporting(0);
$_GET['re'];
?>
<html>
<body>

<form action="" method="post">
Name:<input type="textbox" name="t1"><br><br>
Age:<input type="textbox" name="t2"><br><br>
Email:<input type="textbox" name="t3" ><br><br>
HomeTown:<input type="textbox" name="t4" ><br><br>
Birthday:<input type="textbox" name="t5"><br><br>
<input type="submit" name="submit" value="submit">
<input type="submit" name="submit1" value="Show">

</form>


<?php

include('config.php');
if(isset ($_POST['submit'])){

	
	$name = mysqli_real_escape_string($link,$_POST['t1']);
	$age = mysqli_real_escape_string($link,$_POST['t2']);
	$Email = mysqli_real_escape_string($link,$_POST['t3']);
	$HomeTown = mysqli_real_escape_string($link,$_POST['t4']);
	$Birthday = mysqli_real_escape_string($link,$_POST['t5']);
	
	$query1 = mysqli_query($link,"insert into student values('','$name','$age','$Email','$HomeTown','$Birthday')");
	if($query1)
	{
		header("location:form.php");
	}
	else
	{
			die("error:could not found".mysqli_error($link));

	}
}


?>


<?php
include('config.php');
	$query2= mysqli_query($link,"select * from student");
if(isset ($_POST['submit1'])){
	echo "<table>
<tr> <td>ID</td>
 <td>Name</td>
 <td>Age</td>
 <td>Email</td>
  <td>HomeTown</td>
   <td>Birthday</td>
</tr>
	";
	while ($res=mysqli_fetch_assoc($query2)) {
echo "<tr>
<td>".$res['ID']."</td>
 <td>".$res['Name']."</td>
 <td>".$res['Age']."</td>
 <td>".$res['Email']."</td>
 <td>".$res['Hometown']."</td>
      <td>".$res['Birthday']."</td>
      <td><a href='delete.php?re=$res[ID]'>Delete</a></td>

</tr>";
	}
echo "</table>";
	}
?>



</body
</html>

