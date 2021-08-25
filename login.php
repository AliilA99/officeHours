

<!doctype html>
<html lang="en">

<head>
	<title>Login Page</title>
	<base href="/">
	<meta charset="UTF-8">
	<meta name="author" content="Ali Cherchar">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="refresh" content="0; url=url-to-web-page"> -->
	<link rel="stylesheet" type="text/css" href="officeHours/styles/login.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item active">
						<a class="nav-link" href="officeHours/help.php">Help</a>
					</li>
				</ul>
			</div>
		</nav>

	<script type="text/javascript">


		function checkUsername() {

			var msg = document.getElementById("msg-username");
			var user = document.getElementById("username");


			if(user.value.length < 3 && user.value.length > 0)
				msg.textContent = "Username is too short";
			else
				msg.textContent = "";
		}

	</script>


	<?php include('php/login_handler.php') ?>

	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-body">
					<form action="officeHours/login.php" method="post">
						<div class="input-group form-group">
							<input type="text" name="usr" class="form-control" id="username" placeholder="Username" autofocus required onblur=" checkUsername()" value=<?php if(!empty($_POST["usr"])) echo $usr; 
								else if(isset($_GET["usr"])) echo $_GET["usr"]; ?>>	
							<div id="msg-username" class="feedback"> </div>
							<span class="error_message" id="msg_usr">
								<?php echo $msg_usr ?>
							</span>	
						</div>
					    <br>
						<div class="input-group form-group">
							<input type="password" name="pwd" class="form-control" id="pwd" placeholder="Password" required minlength="8">
							<div id="msg-password" class="feedback"> </div>
							<span class="error_message" id="msg_pwd">
								<?php echo $msg_pwd ?>
							</span>	
						</div>
						<br>
						<div class="row align-items-center remember">
							<input type="checkbox">Remember Me
						</div>
						</br>
						<div class="input-group form-group">
							<input type="hidden" name="attempt" value=<?php 
							//echo $number_attempt
							if(isset($_GET["attempt"])) echo $_GET["attempt"];
							 ?>>
						</div>
						<div class="card-footer text-center">
							<input type="submit" value="Login" class="btn login_btn" <?php if($number_attempt >= 3) { ?>disabled
							<?php } ?>>
						</div>			
					</form>
				</div>
				<div class="card-footer">
					<div class="d-flex justify-content-center links">
						Don't have an account ?<a href="officeHours/register.php">Sign up</a>
					</div>
					<div class="d-flex justify-content-center">
						<a href="officeHours/help.php">Forgot your password ?</a>
					</div>
				</div>
			</div>
		</div>
	</div>

   <?php include 'footer.html'; ?>

</body>
</html>

