<?php

session_start();

include 'db_connection.php';
$connection = connect();

$usr = NULL;
$pwd = NULL;
$msg_usr = NULL;
$msg_pwd = NULL;
$number_attempt = 0;

function authenticate()
{
	global $connection;
	global $usr;
	global $pwd;
	global $msg_usr;
	global $msg_pwd;
	global $number_attempt;

	$usr = $_POST["usr"];

	//Handle injections
	$pwd = htmlspecialchars($_POST["pwd"]);

	$sql = "SELECT * FROM user WHERE username = ?";
	$statement = $connection -> prepare($sql); //Handle Sql injections
	$statement -> bind_param("s", $usr);
	$statement -> execute();
	$result = $statement -> get_result();
	$profile = $result -> fetch_assoc();

	$hash = $profile["password"];

	if(!strcmp($usr, $profile["username"]) && password_verify($pwd, $hash))
	{

		//Client side session
		setcookie("usr", $usr, time()+3600);
		setcookie("pwd", password_hash($pwd, PASSWORD_DEFAULT), time()+3600);

		//Server side session
		$_SESSION["usr"] = $usr;
		$_SESSION["pwd"] = password_hash($pwd, PASSWORD_DEFAULT);


		header("Location: home.php?usr=" .$usr); //Redirect
	}
	else
	{
		if(strcmp($usr, $profile["username"]) != 0)
			$msg_usr = "Invalid username";
		
		if(!password_verify($pwd, $hash))
			$msg_pwd = "Invalid password";
		
		$number_attempt = intval($_POST["attempt"]) + 1;

		header("Refresh:2; url=login.php?attempt=".$number_attempt ."&msg=no match&usr=" .$usr); //Redirect as GET
	}

		stop($connection);

}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	authenticate();
}

if($_SERVER["REQUEST_METHOD"] == "GET")
{

	if(isset($_GET["attempt"]))
	{
		//echo "<div style='position:fixed; bottom:150px; height:30px; color:red; justify-content:center;'>Number of attempts =  {$_GET["attempt"]} <br></div>";

		$number_attempt = intval($_GET["attempt"]);

		if($number_attempt >= 3)
			echo "<div style='position:fixed; bottom:130px; height:30px; color:red;'>Please contact admin. More information can be found on the Help page.<br></div>";
	}
}




?>