<?php

include 'db_connection.php';
$connection = connect();


function getStudents()
{
	global $connection;

	$sql = "SELECT * FROM request";
	$statement = $connection -> prepare($sql); //Handle Sql injections
	$statement -> execute();

	$result = $statement -> get_result();

	$user = $result -> fetch_all();

	stop($connection);

	return $user;
}


?>