<?php 
	include('functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location:login.php');
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body style="background-color:ghostwhite;">
	<div class="container">
	  <div class="jumbotron" style="background-color:ghostwhite;text-align:center">
		<h1>Admin Access Panel</h1>      
	  </div>
		<div class="panel-body col-sm-6" style="font-size:20px;border:1px solid black"> <a href="adminProfile.php" style="color:orange"> See Profile </div>
		<div class="panel-body col-sm-6" style="font-size:20px;border:1px solid black;margin-top:1px;"> <a href="create_user.php"  style="color:orange"> Add New User </div>
		<div class="panel-body col-sm-6" style="font-size:20px;border:1px solid black;margin-top:1px;"> <a href=""  style="color:orange"> Add View Edit Product </div>
	</div>
</body>
</html>