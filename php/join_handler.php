<?php


if($_SERVER["REQUEST_METHOD"] == "POST")
{

	echo "<div style='position:fixed; bottom:80px; height:30px; color:green;'>Your request has been submitted.</div>";

	header("Refresh:3; url=home.php"); //Redirect after 3 seconds
	
}


?>