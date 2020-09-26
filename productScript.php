<?php
		
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
			$count=0;
			move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file);
			
			$sql = "INSERT INTO products (image,name,price,quantity,category) 
			VALUES ('$target_file','$productName','$productPrice','$productQuantity','$productCategory')";
			
			if (mysqli_query($con, $sql)) {
				$msg = "New record created successfully";
					$productNameErr = "";
					$productPriceErr = "";
					$productQuantityErr = "";
					$productCategoryErr = "";
					$productImageErr = "";
			}
			else{
				$msg = "not added";
			}

			}
		}
			
		?>