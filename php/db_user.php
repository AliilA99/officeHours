<?php

include 'db_connection.php';
$connection = connect();


function addUserInfo($f_name, $l_name, $dob, $cid, $usr, $pwd)
{
	global $connection;

	$pwd = password_hash($pwd, PASSWORD_BCRYPT);

	//$sql = "INSERT INTO user (name_first, name_last, dob, uva_cid, username, password) VALUES ('$f_name', '$l_name', '$dob', '$cid', '$usr', '$pwd')";

	$sql = "INSERT INTO user (name_first, name_last, dob, uva_cid, username, password) VALUES (?, ?, ?, ?, ?, ?)";

	$statement = $connection -> prepare($sql); //Handle Sql injections
	$statement -> bind_param("ssssss", $f_name, $l_name, $dob, $cid, $usr, $pwd);
	$statement -> execute();

	stop($connection);

}


?>