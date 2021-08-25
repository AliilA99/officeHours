
<?php require("php/db_join.php") ?>

<!doctype html>
<html lang="en">

<head>
	<title>Join Page</title>
	<base href="/">
	<meta charset="UTF-8">
	<meta name="author" content="Ali Cherchar">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="0; url=url-to-web-page"> -->
	<link rel="stylesheet" type="text/css" href="officeHours/styles/join.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

	<?php

		if(!isset($_COOKIE["usr"]))
			header("Location: login.php");
	?>


	<script type="text/javascript">

		// Anonymous function
		var match = function(str) {

			var pattern = new RegExp("[a-z]{2,3}[1-9][a-z]{1,3}");
			return pattern.test(str);
		}


		function checkRequest()
		{   
		   var number_error = 0;
		   var cid = document.getElementById("uva-cid");

		   var flag = match(cid.value);


		   if (cid.value.length < 4 || cid.value.length > 6)  
		   {
		      number_error++;
		      document.getElementById("uva-cid").value = cid.value;
		      document.getElementById("msg_uva_cid").innerHTML = "Invalid computingID";
		   }
		   else if (!flag)
		   {
		      number_error++;
		      document.getElementById("uva-cid").value = cid.value;
		      document.getElementById("msg_uva_cid").innerHTML = "Invalid computingID";
		   }
		   else 
			   document.getElementById("msg_uva_cid").innerHTML = ""; 

		  	return (number_error > 0) ? false : true;
		}

	</script>


	<?php 

		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			try
			{
				addRequestInfo($_POST["first-name"], $_POST["last-name"], $_POST["uva-cid"], $_POST["questions"]);
			}
			catch(Exception $e)
			{
				echo $e->getMessage();
			}
		}

	?>

	<?php include('php/join_handler.php') ?>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto">
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/profile.php">Profile</a>
				</li>   
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


	<h2>Join Office Hours</h2>


	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-body">
					<form action="officeHours/join.php" method="post" name="RequestForm" onsubmit="return checkRequest()">
						<div class="input-group form-group">
	    					<input type="text" name="first-name" class="form-control" id="first-name" placeholder="First name" required minlength="2">
	    					<span class="error_message" id="msg_first_name"></span>
						</div>
						<br>
						<div class="input-group form-group">
	   						<input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last name" required minlength="2">
	   	    				<span class="error_message" id="msg_last_name"></span>
						</div>
						<br>
						<div class="input-group form-group">
	    					<input type="text" name="uva-cid" class="form-control" id="uva-cid" placeholder="UVA computingID" required>
	   	   					<span class="error_message" id="msg_uva_cid"></span>
						</div>
						<br>
						<div class="input-group form-group">
	    					<textarea name = "questions" class="form-control" id="questions" placeholder="Question(s)" rows="5" minlength="10"></textarea>
	    					<span class="error_message" id="msg_questions"></span>
						</div>
						<br>
						<div class="text-center">
							<input type="submit" value="Join" class="btn float-right login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<?php include 'footer.html'; ?>

</body>
</html>



