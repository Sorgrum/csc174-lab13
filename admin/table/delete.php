<?php  
	$connect = mysqli_connect("66.147.242.186", "urcscon3_l13edm", "urcscon3_l13edm", "urcscon3_l13edm");
	$sql = "DELETE FROM survey WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>