<!doctype html>
<html lang="en">

<head>
	<title>Logout Page</title>
	<base href="/">
	<meta charset="UTF-8">
	<meta name="author" content="Ali Cherchar">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="0; url=url-to-web-page"> -->
	<link rel="stylesheet" type="text/css" href="officeHours/styles/logout.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>	

	<?php 

		//Delete cookies
		if(count($_COOKIE) > 0) 
		{
			foreach ($_COOKIE as $key => $value) 
			{
				unset($_COOKIE[$key]); //Server side 
				setcookie($key, "", time()-3600); //Client side
			}
		}
		

		session_start();

		//Remove session info
		if(count($_SESSION) > 0)
		{
			foreach ($_SESSION as $key => $value) 
			{
				unset($_SESSION[$key]);
			}
		}

		//Discard session object
		session_destroy();

		
		setcookie("PHPSESSID", "", time()-3600, "/");

	?>

	<div class="alert alert-success" role="alert">
  		You have successfully logged out!
	</div>

	<?php header("Refresh:5; url=login.php"); //Redirect after 5 seconds ?>

	<?php include 'footer.html'; ?>

</body>
</html>