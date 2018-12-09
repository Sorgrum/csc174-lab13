<?php  
	$connect = mysqli_connect("66.147.242.186", "urcscon3_l13edm", "urcscon3_l13edm", "urcscon3_l13edm");
	$id = $_POST["id"];  
	$text = $_POST["text"];  
	$column_name = $_POST["column_name"];  
	$sql = "UPDATE survey SET ".$column_name."='".$text."' WHERE id='".$id."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Updated';  
	}  
 ?>