<?php include('functions.php');
include("link.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color:white">
	<nav class="navbar navbar-expand-sm navbar-light bg-light">
	<button class="btn btn-info" style="background-color:orange;margin:10px"><a href="index.php">Back</a></button>
	</nav>
	<div class="header" style="background-color:orange">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn" style="background-color:orange">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
</html>