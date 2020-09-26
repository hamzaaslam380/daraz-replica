<!DOCTYPE html>
<html>
<head>
	<?php include_once("link.php"); ?>
	<style>
	
		.header {
			background: orange;
		}
		button[name=register_btn] {
			background: orange;
			margin-top:10px;
		}
		#productCategory{
			height: 32px;
			width: 93%;
			padding: 5px 10px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
		}

	</style>
</head>
<body>
		<?php require_once("productScript.php"); ?>
		
		<nav class="navbar navbar-expand-sm navbar-light bg-light">

			<a style="margin-bottom:30px"class="navbar-brand" href="index.php" > <img src="download.png" style="height:50px;width:150px"> </a>
		  

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<form class="form-inline my-2 my-lg-0" style="border:1px solid ghostwhite" action="editProduct.php" method="post">
				<input class="form-control " name="id" type="text" placeholder="Enter Product ID">
				<input type="submit" class="btn btn-info" name="search" value="Search" style="background-color:orange">
			</form>
			
			</div>
		<button class="btn btn-info" style="background-color:orange;"><a href="AdminAccessPanel.php">Back</a></button>
		</nav>
		
		<div class="header">
			<h2>Admin - Create Product</h2>
		</div>
		
		
		<form method="post" action="product.php" enctype="multipart/form-data">			
			<div style="color:red;text-align:center">
			<?php 
				echo $productNameErr;
				echo "<br>".$productPriceErr;
				echo "<br>".$productQuantityErr;
				echo "<br>".$productCategoryErr;
				echo "<br>".$productImageErr;
				echo "<br>".$msg;
			?>
			</div>
			<div class="input-group">
				<label>Product Name</label>
				<input type="text" name="productName" value="">
			</div>
			<div class="input-group">
				<label>Product Price</label>
				<input type="text" name="productPrice" value="">
			</div>
			<div class="input-group">
				<label>Product Categories</label>
				<select name="productCategory" id="productCategory" class="input-group" >
					<option value=""></option>
					<option value="ElectronicAndDevices" > Electronic Devices </option>
					<option value="ElectronicAndAccessories" > Electronic Accessories </option>
					<option value="TVAndHomeAndAppliances" > TV Home Appliances </option>
					<option value="HealthAndBeauty" > Health Beauty </option>
					<option value="BabiesAndToys" > Babies Toys </option>
					<option value="GroceriesAndPets" > Groceries Pets </option>
					<option value="HomeAndLifestyle" > Home Lifestyle </option>
					<option value="WomenFashion" > Women Fashion </option>
					<option value="MenFashion" > Men Fashion</option>
					<option value="WatchesAndBagsAndJewelery" > Watches, Bags, Jewelery </option>
					<option value="SportsAndOutdoor" > Sports Outdoor </option>
					<option value="AutomotiveAndMotorbike" > Automotive and Motorbike </option>
				</select>
			</div>
			<div class="input-group">
				<label>Product Quantity</label>
				<input type="text" name="productQuantity">
			</div>
			<div class="input-group">
				<label>Product Image</label>
				<input type="file" accept="image/*" name="productimage" >
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="register_btn"> Add Product</button>
			</div>
		</form>
		<div style="margin-top:5%">
		</div>
</body>
</html>