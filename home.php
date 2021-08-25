<!doctype html>
<html lang="en">

<head>
	<title>Home Page</title>
	<base href="/">
	<meta charset="UTF-8">
	<meta name="author" content="Ali Cherchar">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="0; url=url-to-web-page"> -->
	<link rel="stylesheet" type="text/css" href="officeHours/styles/home.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

	<?php
	
		//if(!isset($_COOKIE["usr"]))
			//header("Location: login.php");

		session_start(); //Join session to use it

		if(!isset($_SESSION["usr"]))
			header("Location: login.php");
	?>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto">
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/profile.php">Profile</a>
				</li>   
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/join.php">Join Office Hours</a>
				</li>

				<?php
					if(strcmp($_SESSION["usr"], "Admin") == 0)
					{
				?>	
					<li class="nav-item active">
						<a class="nav-link" href="officeHours/queue.php">Queue</a>
					</li> 
				<?php
					}
					else
					{
				?>

					<li class="nav-item active">
						<a class="nav-link" href="officeHours/status.php">Status</a>
					</li> 
				<?php
					}
				?>
			</ul>


			<ul class="navbar-nav ms-auto">
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/help.php">Help</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/logout.php">Logout</a>
				</li>	
			</ul>
		</div>
	</nav>


	<section>
			
		<h2>Welcome to Office Hours, 
			<?php   //if(isset($_GET["usr"])) echo $_GET["usr"]; 
					//if(isset($_COOKIE["usr"])) echo $_COOKIE["usr"];
					if(isset($_SESSION["usr"])) echo $_SESSION["usr"];
			?>!</h2>

			<div class="leaf">
			<div>  <img src="http://www.pngmart.com/files/13/Alarm-Emoji-Transparent-PNG.png" height="75px" width="75px"></div>
			<div>  <img src="http://www.pngmart.com/files/7/Happy-Teachers-Day-PNG-Transparent.png" height="75px" width="75px"></div>
			<div>  <img src="http://www.pngmart.com/files/16/Vector-Laptop-Notebook-PNG-Pic.png" height="75px" width="75px" ></div>
			<div>  <img src="http://www.pngmart.com/files/12/Boy-Emoji-Avatar-PNG.png" height="75px" width="75px"></div>
			<div>  <img src="http://www.pngmart.com/files/15/School-Blackboard-Transparent-PNG.png" height="75px" width="75px"></div>
			<div>  <img src="http://www.pngmart.com/files/15/Happy-Yellow-Smiley-PNG.png" height="75px" width="75px"></div>
			<div>  <img src="http://www.pngmart.com/files/7/Web-Design-PNG-Free-Download.png" height="75px" width="75px"></div>
		    </div>

	</section>

	<?php include 'footer.html'; ?>

</body>
</html>