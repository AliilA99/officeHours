<?php

include 'db_connection.php';
$connection = connect();


if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$f_name = $_POST["first-name"];
	$l_name = $_POST["last-name"];
	$dob = $_POST["dob"];
	$cid = $_POST["uva-cid"];


	$sql = "UPDATE user SET name_first = ?, name_last = ?, dob = ?  WHERE uva_cid = ?";
	$statement = $connection -> prepare($sql); //Handle Sql injections
	$statement -> bind_param("ssss", $f_name, $l_name, $dob, $cid);
	$statement -> execute();

	echo "<div style='position:fixed; bottom:80px; height:30px; color:green;'>Profile updated successfuly.</div>";

	header("Refresh:3; url=profile.php"); //Redirect after 3 seconds

}



function getUser($usr)
{
	global $connection;

	$sql = "SELECT * FROM user WHERE username = ?";
	$statement = $connection -> prepare($sql); //Handle Sql injections
	$statement -> bind_param("s", $usr);
	$statement -> execute();

	$result = $statement -> get_result();

	$user = $result -> fetch_assoc();

	stop($connection);

	return $user;
}


?>