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
<?php include("link.php"); ?>
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
<body style="font-size:15px;background-color:white">
	<nav class="navbar navbar-expand-sm navbar-light bg-light">
		<button class="btn btn-info" style="background-color:orange;margin:10px"><a href="AdminAccessPanel.php">Back</a></button>
	</nav>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
						&nbsp; <a href="create_user.php"> + add user</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>		
</body>
</html>