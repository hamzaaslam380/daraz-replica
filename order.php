<?php
include("link.php");
require_once("dbcontroller.php");
$db_handle = new DBController();
$total="";
?>
<html>
<head>
<style>
tr{
	border:1px solid green;
}
td,th{
	padding:10px;
	border:1px solid green;
	width:10%;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-light bg-light">

			<a class="navbar-brand" href="AdminAccessPanel.php" style="margin-bottom:25px"> <img src="download.png" style="height:50px;width:150px"> </a>
		  

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<form class="form-inline my-2 my-lg-0" style="border:1px solid ghostwhite" action="order.php" method="post">
				<input style="width:250px"class="form-control " name="id" type="text" placeholder="Enter Order ID ">
				<input type="submit" class="btn btn-info" name="search" value="Search" style="background-color:orange">
			</form>
			
			</div>
		<button class="btn btn-info" style="background-color:orange;"><a href="AdminAccessPanel.php">Back</a></button>
</nav>
<?php
if(!empty($_POST["id"])){
	$id=$_POST["id"];
	$product_array = $db_handle->runQuery("SELECT * FROM orders where paymentId = '$id' LIMIT 1");
if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
		}
}

		?>
<div style="border:2px solid orange;margin:5px" >
<table class="tbl-cart" cellpadding="10" cellspacing="1" style="border:1px solid black;margin:20px">
<tbody>
<h1 style="margin:20px;font-size:20px;border:1px solid  green;padding:10px"> Order No : <?php 		echo $product_array[$key]["paymentId"]."<br>"; ?>
<?php
if(!empty($_POST["id"])){
	$id=$_POST["id"];
	$product_array = $db_handle->runQuery("SELECT * FROM payments LIMIT 1");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
			echo "<br>"."Customer Id: ".$product_array[$key]["customerId"]."<br>";
			echo "Customer Name: ".$product_array[$key]["name"]."<br>";
			echo "Customer Address: ".$product_array[$key]["address"]."<br>";
			echo "Customer Phone No: ".$product_array[$key]["phone"]."<br>";
			echo "Customer Email: ".$product_array[$key]["email"]."<br>";
			echo "Customer Payment Type: ".$product_array[$key]["payment"]."<br>";
		}
	}
}?>
</h1>
<tr style="">
<th style="text-align:left;">Product Name</th>
<th style="text-align:left;">Product Code</th>
<th style="text-align:right;" width="5%">Product Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
</tr>	
	<?php
	if(!empty($_POST["id"])){
		$id=$_POST["id"];
		$product_array = $db_handle->runQuery("SELECT * FROM orders where paymentId = '$id' ");
	}	
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
<div style="float:right;margin:20px;font-size:30px;border:2px solid green;padding:10px">Total:<?php echo $total ?>	</div>
<?php 
}
?>
</div>
</body> 
</html>
