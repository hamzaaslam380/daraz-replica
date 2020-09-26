<?php
	$id="";
	$price="";
	$name="";
	$quantity="";
	$category="";
	$image="";
	// php code to search data in mysql database and set it in input text
	if(isset($_POST['delete'])){
		include("mysqli_connect.php");	
			$id = $_POST['id'];
			$query2 = "DELETE FROM products WHERE id=$id";
			mysqli_query($con, $query2);
			die("Record Deleted Succesfully");
	}
	else if(isset($_POST['edit']))
	{
    // id to search
	include("mysqli_connect.php");	
		$productNameErr = "";
		$productPriceErr = "";
		$productQuantityErr = "";
		$productCategoryErr = "";
		$productImageErr = "";
		$msg = "";
		$count = 1;
		if($_SERVER["REQUEST_METHOD"] == "POST"){			
			$productName = $_POST["productName"];
			$productPrice = $_POST["productPrice"];
			$productQuantity = $_POST["productQuantity"];
			$productCategory = $_POST["productCategory"];
			
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["productimage"]["name"]);
			$fileType = pathinfo($target_file, PATHINFO_EXTENSION);
			
			if($_FILES["productimage"]["size"] > 5000000 ){
				$productImageErr = "File is too large";
				$count++;
			}
			if($fileType != "jpg"){			
				$productImageErr = "Image Only JPG";
				$count++;
			}

			if(empty($productName)){
				$productNameErr = "Please Enter Name";
				$count++;
			}
			if(empty($productPrice)){
				$productPriceErr = "Please Enter Price";
				$count++;
			}
			if(empty($productQuantity)){
				$productQuantityErr = "Please Enter Quantity";
				$count++;
			}
			if(empty($productCategory)){
				$productCategoryErr = "Please Select Category";
				$count++;
			}
			else if($count==1)
			{	
			move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file);
			
			
			$id = $_POST['id'];
			$name = $_POST['productName'];
			$price = $_POST['productPrice'];
			$quantity = $_POST['productQuantity'];
			$category = $_POST['productCategory'];
			// connect to mysql
			$connect = mysqli_connect("localhost", "root", "","daraz");
			
			$query2 = "update products set
				name='$name', price='$price', quantity='$quantity', price='$price',
				category='$category',image='$target_file' where id='$id'";
				mysqli_query($connect, $query2);
			
			$query1 = "SELECT * FROM `products` WHERE `id` = $id LIMIT 1";
			$result1 = mysqli_query($connect, $query1);	
			// if id exist 
			// show data in inputs
			if(mysqli_num_rows($result1) > 0)
			{
				while ($row = mysqli_fetch_array($result1))
				{
					$id = $row['id'];
					$name = $row['name'];
					$price = $row['price'];
					$category = $row['category'];
					$quantity = $row['quantity'];
					$image = $row['image'];
			  }
			}
			else 
			{
				$link_address ="product.php";
				echo "<a href='".$link_address."'> <== Product Not Exist</a>";
				die("Invalid Command");
			} 
			}
		}	
	}
?>