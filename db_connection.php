<?php

function connect()
 {
	$dbhost = "localhost";
	$dbname = "officeHours";
	$dbuser = "Base";
	$dbpass = "Saveddata?";
	 
 	$connection = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connection failed: %s\n". $connection -> error);
 
 	return $connection;
 }
 
function stop($connection)
{
 	$connection -> close();
}
   
?>