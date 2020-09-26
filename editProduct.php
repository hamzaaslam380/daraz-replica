<html>
<head>
<?php include_once("link.php"); ?>
</head>
<style>	
		.header {
			background: ghostwhite;
			border:1px solid orange;
		}
		button[name=edit] {
			background: green;
			margin-top:10px;
			color:white;
		}
		button[name=delete] {
			background: red;
			margin-top:10px;
			color:white;
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
<body style="margin-bottom:40px">
	<nav class="navbar navbar-expand-sm navbar-light bg-light">
		<button class="btn btn-info" style="background-color:orange;margin:10px"><a href="product.php">Back</a></button>
	</nav>

	<?php

	$id="";
	$price="";
	$name="";
	$quantity="";
	$category="";
	$image="";
	// php code to search data in mysql database and set it in input text
	if($_POST['id']==""){
			$link_address ="product.php";
			echo "<a href='".$link_address."'.' height='200' width='300'> <== Product Not Exist</a>";
			die("Invalid Command");
	}		
	else if(isset($_POST['search']))
	{
		// id to search
		$id = $_POST['id'];
		
		// connect to mysql
		$connect = mysqli_connect("localhost", "root", "","daraz");
		
		// mysql search query
		$query = "SELECT * FROM `products` WHERE `id` = $id LIMIT 1";
		
		$result = mysqli_query($connect, $query);
		
		// if id exist 
		// show data in inputs
		if(mysqli_num_rows($result) > 0)
		{
			while ($row = mysqli_fetch_array($result))
			{
				$id = $row['id'];
				$name = $row['name'];
				$price = $row['price'];
				$category = $row['category'];
				$quantity = $row['quantity'];
				$image = $row['image'];
			}
		}		
		// if the id not exist
		// show a message and clear inputs
		else{
			die("Invalid Command");
		}   
	}
	?>
		
		<div class="header">
			<h1 class="display-4"><?php echo"<img  src='$image. ' height='200' width='300'/>"?></h1>
		</div>
		<form method="post" action="searchProduct.php" enctype="multipart/form-data">		
			<div class="input-group">
				<label>Product ID</label>
				<input type="text" name="id" value="<?php echo "$id"?>">
			</div>
			<div class="input-group">
				<label>Product Name</label>
				<input type="text" name="productName" value="<?php echo "$name"?>">
			</div>
			<div class="input-group">
				<label>Product Price</label>
				<input type="text" name="productPrice" value="<?php echo "$price"?>">
			</div>
			<div class="input-group">
				<label>Product Categories</label>
				<select name="productCategory" id="productCategory">
					<option value=""> Please Select Any One </option>
					<option value="ElectronicAndDevices" > Electronic Devices </option>
					<option value="ElectronicAndAccessories" > Electronic Accessories </option>
					<option value="TVAndHomeAndAppliances" > TV Home Appliances </option>
					<option value="HealthAndBeauty" > Health Beauty </option>
					<option value="BabiesandToys" > Babies Toys </option>
					<option value="GroceriesAndPets" > Groceries Pets </option>
					<option value="HomeAndLifestyle" > Home Lifestyle </option>
					<option value="WomenFashion" > Women Fashion </option>
					<option value="Men Fashion" > Men Fashion</option>
					<option value="WatchesAndBagsAndJewelery" > Watches, Bags, Jewelery </option>
					<option value="SportsAndOutdoor" > Sports Outdoor </option>
					<option value="AutomotiveAndMotorbike" > Automotive and Motorbike </option>
				</select>
			</div>
			<div class="input-group">
				<label>Product Quantity</label>
				<input type="text" name="productQuantity" value="<?php echo "$quantity"?>">
			</div>
			<div class="input-group">
				<label>Product Image</label>
				<input type="file" accept="image/*" name="productimage" >
			</div>
			<div class="input-group">
				<button type="submit" class="btn" name="edit"> Edit Product</button>
				<button type="submit" class="btn" name="delete" onclick="delete()"> Delete Product</button>
			</div>
		</form>
</body>
</html>