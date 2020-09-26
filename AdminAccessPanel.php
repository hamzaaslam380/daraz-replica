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
		<?php include_once("link.php"); ?>
	</head>
<body style="background-color:ghostwhite">
	<nav class="navbar navbar-expand-sm navbar-light bg-light">
			<a class="navbar-brand" href="AdminAccessPanel.php" style="margin-bottom:25px"> <img src="download.png" style="height:50px;width:150px"> </a>
			<div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
			<button class="btn btn-info" style="background-color:orange;"><a href="login.php">Back</a></button>
	</nav>
	<div class="container" style="">
		<div class="jumbotron" style="background-color:ghostwhite;">
		<h1 style="height:100px;padding-top:30px;font-size:30px;color:black;text-align:center;border:1px solid black;background-color:orange"> Admin Access Panel </h1>      
		</div>
		<div class="panel-body col-sm-3" style="font-size:20px;border:1px solid black;"> <a href="adminProfile.php" style="color:orange"> See Profile </div>
		<div class="panel-body col-sm-3" style="font-size:20px;border:1px solid black;"> <a href="create_user.php"  style="color:orange"> Add New User </div>
		<div class="panel-body col-sm-3" style="font-size:20px;border:1px solid black;"> <a href="order.php"  style="color:orange"> View Order </div>
		<div class="panel-body col-sm-3" style="font-size:20px;border:1px solid black;"> <a href="product.php"  style="color:orange"> Add View Delete Product </div>
	</div>
</body>
</html>