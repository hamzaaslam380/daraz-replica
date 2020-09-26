<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$category="";
?>
<html>
	<head>
	<style>
	body{
		margin:0px;
	}
	.input-group {
	margin: 0px;
	}
	form  {
		margin:0px;
		margin-right:0%;
	width: 25%;
	border: 1px solid ghostwhite;
	background: white;
	}
	.container{
		margin:0px;
		margin-left:50px;
	}
	</style>
    </head>
<body style="1px solid black">
	<div class="container" style="margin-top:5%;">
		<div class="row"class="col-sm-3" style="">
		<?php
		$product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
		if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
		?>
		<form class=""style=""method="post" action="cart.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
		<div class="" style="">
			<?php echo "<img  src='$value[image]. ' height='200' width='250'/>" ?>
			<div class="text-center" style="margin-right:10px">
				<h2><?php echo $value["name"];  ?></h2>
				Price:<?php echo $product_array[$key]["price"] ."<br>" ?>
				Quantity:<?php echo $product_array[$key]["quantity"] ."<br>" ?>
			<input type="text" class="product-quantity" name="quantity" value="1" size="2" />
			<input type="submit" value="Add to Cart" class="btnAddAction" style="background-color:orange;padding:2px;color:white"/>
			</div>
		</div>
		</form>
		<?php 
		} 
		} 
		?>
		</div>
	</div>
			
	

	<?php	/*
		if($stmt = $con->query("SELECT * FROM products")){
			echo "No of records : ".$stmt->num_rows."<br>";
			echo "<table class='table my_table'>
				<tr class='info'> <th> Image </th><th>Name</th><th>ID</th><th>Price</th></th><th>Quantity</th></th><th>Category</th></tr>";
				while ($row = $stmt->fetch_assoc()) {
					echo 	"<tr>	<td><img  src='$row[image]. ' height='200' width='300'/></td>
									<td>$row[name]</td>
									<td>$row[id]</td>
									<td>$row[price]</td>
									<td>$row[quantity]</td>
									<td>$row[category]</td>
							</tr>";
				}
					echo "</table>";
				}
				else{
					echo $connection->error;
				}*/
	?>
</body>
</html>