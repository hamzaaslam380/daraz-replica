<?php 
include('functions.php');
include("link.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		.header {
			background: orange;
		}
		button[name=register_btn] {
			background: orange;
		}
	</style>
</head>
<body style="background-color:white">
	<nav class="navbar navbar-expand-sm navbar-light bg-light">
	<button class="btn btn-info" style="background-color:orange;margin:10px;color:white"><a style="color:white"href="cart.php">Back</a></button>
	</nav>
	
	<div class="header" style="color:white">
		<h2> Payment </h2>
	</div>
	
	<form method="post" action="payment.php">

		<?php echo display_error(); ?>
		<label style="color:red;margin-top:20px">If You Don't Know Cusomter-Id ==> <a href="register.php">Please Sign-Up </a></label>
		<div class="input-group">
			<label>Customer Id</label>
			<input type="text" name="customer_id">
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="">
		</div>
		<div class="input-group" style="width:480px;">
			<label>Payment Type</label>
			<select name="payment_type" id="payment_type" style="background-color:white;height:30px;width:465px;">
				<option value=""></option>
				<option value="cod">Cash On Delivery</option>
				<option value="bank">Bank Transfer</option>
			</select>
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address">
		</div>
		<div class="input-group">
			<label>Phone No</label>
			<input type="text" name="ph_no">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn2" style="color:white;background-color:orange"> Submit </button>
		</div>
	</form>
	
</body>
</html>