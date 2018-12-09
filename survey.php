<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["name"])
		&& !empty($_POST["favorite_planet"])
		&& !empty($_POST["reason"])) {

		$connect = mysqli_connect("66.147.242.186", "urcscon3_l13edm", "urcscon3_l13edm", "urcscon3_l13edm");
		$sql = "INSERT INTO survey(name, favorite_planet, reason) 
		VALUES(
			'".$_POST["name"]."', 
			'".$_POST["favorite_planet"]."',
			'".$_POST["reason"]."')
		";  
		if(mysqli_query($connect, $sql))  
		{  
		     echo 'Thank you for your feedback!';  
		}  
	}
}

?>
<html lang=en>
    <head>
        <title>Space Travel - Survey</title>
    </head>
    
    <h1>Survey</h1>
    <h2>Fill out a survey on your favorite planet!</h2>

    <form action="survey.php" method="POST">
    	Name: <br /><input type="text" name="name"><br />
    	Favorite Planet: <br />
    	<input type="radio" name="favorite_planet" value="Mercury">Mercury <br />
    	<input type="radio" name="favorite_planet" value="Venus">Venus <br />
    	<input type="radio" name="favorite_planet" value="Earth">Earth <br />
    	<input type="radio" name="favorite_planet" value="Mars">Mars <br />
    	<input type="radio" name="favorite_planet" value="Jupiter">Jupiter <br />
    	<input type="radio" name="favorite_planet" value="Saturn">Saturn <br />
    	<input type="radio" name="favorite_planet" value="Uranus">Uranus <br />
    	<input type="radio" name="favorite_planet" value="Neptune">Neptune <br />
    	Reason: <br />
    	<textarea name="reason"></textarea>
    	<input type="submit" value="Submit">
    </form>
</html>