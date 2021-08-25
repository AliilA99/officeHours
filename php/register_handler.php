<?php

include 'db_connection.php';
$connection = connect();

$msg_username =  NULL;

function uniqueUsername()
{
	global $connection;
	global $msg_username;

	$first_name = $_POST["first-name"];
	$username = $_POST["username"];

	$sql = "SELECT * FROM user WHERE username = ?";
	$statement = $connection -> prepare($sql); //Handle Sql injections
	$statement -> bind_param("s", $username);
	$statement -> execute();
	$result = $statement -> get_result();

	if(mysqli_num_rows($result) > 0)
	{
		$msg_username = "Username exists";
	}


	return(mysqli_num_rows($result) > 0);
}


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


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(!uniqueUsername())
	{
		try
		{
			addUserInfo($_POST["first-name"], $_POST["last-name"], $_POST["dob"], $_POST["uva-cid"], $_POST["username"], $_POST["password"]);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

		echo "<div style='position:fixed; bottom:80px; height:30px; color:green;'>Thank you, {$_POST["first-name"]} <br> Your account has been created.</div>";

		header("Refresh:3; url=login.php"); //Redirect after 3 seconds
	}	
}


?>