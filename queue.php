
<!doctype html>
<html lang="en">

<head>
	<title>Queue Page</title>
	<base href="/">
	<meta charset="UTF-8">
	<meta name="author" content="Ali Cherchar">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="0; url=url-to-web-page"> -->
	<link rel="stylesheet" type="text/css" href="officeHours/styles/profile.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto">
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/home.php">Home</a>
				</li>   		
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

	<br>
	<h4 class="text-center">Current Queue</h4>
	<br>
	<br>

	<?php

		if(!isset($_COOKIE["usr"]))
			header("Location: login.php");
	?>

	<?php include("php/db_queue.php") ?>

	<?php 

	$students;

	try
	{
		$students = getStudents();

	}
	catch(Exception $e)
	{
		echo $e->getMessage();
	}


	foreach ($students as $student) {

	?>
		<div class="text-center">
		<h6>Computing ID: <?php echo $student[2]; ?></h6>
		<h6>Time: <?php echo $student[4]; ?></h6>
		<h6>Question(s): <?php echo $student[3]; ?></h6>
		<hr>
		<div>

	<?php
				
	}	

	?>


	<?php include 'footer.html'; ?>

</body>
</html>