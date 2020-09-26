<?php 
	include('functions.php');
	include("link.php");
	include("dbcontroller.php");
	$db_handle = new DBController();
	$total="";
	$id="";

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	td,th{
	 border:1px solid orange;
	 width:10%;
	 padding:10px;
	}
	</style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light" style="background-color:white">
	<button class="btn btn-info" style="float:left;background-color:orange;margin:10px;color:white"><a style="color:white"href="login.php">Back</a></button>
</nav>
		<!-- notification message -->
		<div style="margin:30px;font-size:15px">
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
			<strong>User Name: <?php echo $_SESSION['user']['username'],"<br>"; ?></strong>
			<strong>Id: <?php echo $_SESSION['user']['id'],"<br>"; $customerId=$_SESSION['user']['id'] ?></strong>

			<small>
				<i  style="color: #888;">Type:(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
					<br>
					<a href="index.php?logout='1'" style="color: red;">logout</a>
			</small>
		</div>
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM payments where customerId = '$customerId' limit 1");
	if (!empty($product_array)) { 
			foreach($product_array as $key=>$value){
			}
	

		?>
<div style="border:1px solid orange;margin:10px;padding:10px;font-size:15px" > <h2>Customer Last Order Details: </h2>
<h2 style="margin-bottom:0px;font-size:20px;border:1px solid orange;padding:10px"> Order No : <?php 		echo $product_array[$key]["id"]."<br>"; ?>
	<?php
	}
	?>
	</h2>
<table style="margin-top:10px;padding:10px;font-size:15px"class="tbl-cart" cellpadding="10" cellspacing="1" >
<tbody style="">
<?php
	$product_array = $db_handle->runQuery("SELECT * FROM payments where customerId='$customerId'");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			echo "<br>"."Customer Id: ".$product_array[$key]["customerId"]."<br>";
			echo "Customer Name: ".$product_array[$key]["name"]."<br>";
			echo "Customer Address: ".$product_array[$key]["address"]."<br>";
			echo "Customer Phone No: ".$product_array[$key]["phone"]."<br>";
			echo "Customer Email: ".$product_array[$key]["email"]."<br>";
			echo "Customer Payment Type: ".$product_array[$key]["payment"]."<br>";
			$id=$product_array[$key]["id"];
		}
	}

?>
<tr style="">
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Product Code</th>
<th style="text-align:right;" width="5%">Product Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
</tr>	
	<?php
		$product_array = $db_handle->runQuery("SELECT * FROM orders where paymentId = '$id' ");	
		if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			if (is_numeric($product_array[$key]["quantity"]) && is_numeric($product_array[$key]["price"])) {
				  	(int)$total=(int)$total+$product_array[$key]["quantity"]*$product_array[$key]["price"];
				}
		?>
		<tr>
		<td><?php echo $value["name"]; ?></td>
		<td><?php echo $value["productId"]; ?></td>
		<td style="text-align:right;"><?php echo $product_array[$key]["quantity"]; ?></td>
		<td  style="text-align:right;"><?php echo "$ ".$product_array[$key]["price"]; ?></td>
		<td  style="text-align:right;"><?php echo "$ ".$product_array[$key]["quantity"]*$product_array[$key]["price"] ?></td>
		</tr>
		<?php
				}
		} 
		?>
</tbody>
</table>
</div>	
<div style="float:right;margin:20px;font-size:30px;border:2px solid green;padding:10px">Total:<?php echo $total ?>	</div>
</body>
</html>