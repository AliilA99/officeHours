
<!doctype html>
<html lang="en">

<head>
	<title>Registration Page</title>
	<base href="/">
	<meta charset="UTF-8">
	<meta name="author" content="Ali Cherchar">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="0; url=url-to-web-page"> -->
	<link rel="stylesheet" type="text/css" href="officeHours/styles/register.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

	<script type="text/javascript">

		// Arrow function
		var dob_format = (str) => {

			var pattern = new RegExp("[0-9]{2}[/][0-9]{2}[/][0-9]{4}");
			return pattern.test(str);
		}

		
		// Anonymous function
		var match = function(str) {

			var pattern = new RegExp("[a-z]{2,3}[1-9][a-z]{1,3}");
			return pattern.test(str);
		}
		
	 	
		function checkRegistration()
		{   
		   var number_error = 0;

		   var cid = document.getElementById("uva-cid");
		   var dob = document.getElementById("dob");
		   var flag1 = dob_format(dob.value);
		   var flag2 = match(cid.value);


		   if(!flag1)
		   {
		   	number_error++;
		   	document.getElementById("dob").value = dob.value;
		   	document.getElementById("msg_dob").innerHTML = "Invalid DOB format";
		   }

		   if (cid.value.length < 4 || cid.value.length > 6)  
		   {
		      number_error++;
		      document.getElementById("uva-cid").value = cid.value;
		      document.getElementById("msg_uva_cid").innerHTML = "Invalid computingID";
		   }
		   else if (!flag2)
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

	<?php include('php/register_handler.php') ?>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto">
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/login.php">Login</a>
				</li>   		
			</ul>

			<ul class="navbar-nav ms-auto">
				<li class="nav-item active">
					<a class="nav-link" href="officeHours/help.php">Help</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-body">
					<form action="officeHours/register.php" method="post" name="RegistrationForm"  onsubmit="return checkRegistration()">
						<div class="input-group form-group">
							<input type="text" name="first-name" class="form-control" id="first-name" placeholder="First name" minlength="2" value=<?php if(!empty($_POST["first-name"])) echo $_POST["first-name"] ?>>	
							<span></span>
						</div>
						<br>
						<div class="input-group form-group">
							<input type="text" name="last-name" class="form-control" id="last-name" placeholder="Last name" required value=<?php if(!empty($_POST["last-name"])) echo $_POST["last-name"] ?>>
							<span></span>
						</div>
						<br>
						<div class="input-group form-group">
							<input type="text" name="dob" class="form-control" id="dob" placeholder="DD/MM/YYYY" required value=<?php if(!empty($_POST["dob"])) echo $_POST["dob"] ?>>
							<span></span>	
						</div>
						<br>
						<div class="input-group form-group">
							<input type="text" name="uva-cid" class="form-control" id="uva-cid" placeholder="UVA computingID" value=<?php if(!empty($_POST["uva-cid"])) echo $_POST["uva-cid"] ?>>
							<span></span>
						</div>
						<br>
						<div class="input-group form-group">
							<input type="text" name="username" class="form-control" id="username" placeholder="Username" value=<?php if(!empty($_POST["username"])) echo $_POST["username"] ?>>	
							<br>
						</div>
						<span class="error_message" id="msg_username">
								<?php echo $msg_username ?>
						</span>
						<br>
						<div class="input-group form-group">
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required minlength="8" value=<?php if(!empty($_POST["password"])) echo $_POST["password"] ?>>
							<span></span>
						</div>
						<div class="card-footer text-center">
								<input type="submit" value="Register" class="btn login_btn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.html'; ?>

</body>
</html>

