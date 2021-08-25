<?php

include 'db_connection.php';
$connection = connect();


function addRequestInfo($f_name, $l_name, $cid, $q)
{
	global $connection;

	//$sql = "INSERT INTO request (name_first, name_last, uva_cid, questions) VALUES ('$f_name', '$l_name','$cid', '$q')";

	$sql = "INSERT INTO request (name_first, name_last, uva_cid, questions) VALUES (?, ?, ?, ?)";
	$statement = $connection -> prepare($sql); //Handle Sql injections
	$statement -> bind_param("ssss", $f_name, $l_name, $cid, $q);
	$statement -> execute();

	stop($connection);
}


?>