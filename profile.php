
<!doctype html>
<html lang="en">

<head>
	<title>Profile Page</title>
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

	<?php

		if(!isset($_COOKIE["usr"]))
			header("Location: login.php");
	?>

	<?php include("php/db_profile.php") ?>

	<?php 

		$profile;

		try
		{
			$profile = getUser($_COOKIE["usr"]);
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}

	?>


	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto">
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/home.php">Home</a>
				</li>   
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/join.php">Join Office Hours</a>
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

		<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-body">
					<form action="officeHours/profile.php" method="post">
						<div class="input-group form-group">
							<label>First name:</label>
	    					<input type="text" name="first-name" class="form-control" id="first-name" value=<?php echo $profile["name_first"] ?>>
						</div>
						<br>
						<div class="input-group form-group">
							Last name:
							<br>
	    					<input type="text" name="last-name" class="form-control" id="last-name" value=<?php echo $profile["name_last"] ?>>
						</div>
						<br>
						<div class="input-group form-group">
							DOB:
							<br>
	    					<input type="text" name="dob" class="form-control" id="dob" value=<?php echo $profile["dob"] ?>>
						</div>
						<br>
						<div class="input-group form-group">
							UVA computingID:
							<br>
	    					<input type="text" name="uva-cid" class="form-control" id="uva-cid" value=<?php echo $profile["uva_cid"] ?> readonly>
						</div>
						<br>
						<div class="text-center">
							<input type="submit" value="Update" class="btn login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.html'; ?>

</body>
</html>