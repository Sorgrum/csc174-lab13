<?php  
$connect = mysqli_connect("66.147.242.186", "urcscon3_l13edm", "urcscon3_l13edm", "urcscon3_l13edm");
$sql = "INSERT INTO survey(name, favorite_planet, reason) 
		VALUES(
			'".$_POST["name"]."', 
			'".$_POST["favorite_planet"]."',
			'".$_POST["reason"]."')
		";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>