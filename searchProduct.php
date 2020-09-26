<html>
<head>
<style>
		button[name=delete] {
			background: red;
			color:white;
		}
		#back {
			background: orange;
			width:100px;
			height:35px;
			color:white;
			padding:2px;
			padding-top:4px;
		}
</style>
<?php include_once("link.php"); ?>
</head>
<body>
	<nav class="navbar navbar-expand-sm navbar-light bg-light">
	<button class="btn btn-info" style="background-color:orange;margin:10px"><a href="editproduct.php">Back</a></button>
	</nav>
<?php require_once("editProductScript.php");?>
	<div class="header" style="background-color:orange">
		<h2><?php echo"$name"?></h2>
	</div>
	<div class="content" style="margin-bottom:40px">
		<?php 
				echo $productNameErr;
				echo "<br>".$productPriceErr;
				echo "<br>".$productQuantityErr;
				echo "<br>".$productCategoryErr;
				echo "<br>".$productImageErr;
				echo "<br>".$msg;
		?>
		<?php echo"<img  src='$image. ' height='200' width='300'/>"?>
		<div class="profile_info">
			<div>
			<p class="lead"> Price: <?php echo "$price"?></p>
			<p class="lead"> Quantity: <?php echo "$quantity"?></p>
			<p class="lead"> Price: <?php echo "$price"?></p>	
			<p class="lead"> Category: <?php echo "$category"?></p>	
			</div>
		</div>
	</div>	

</body>
</html>

