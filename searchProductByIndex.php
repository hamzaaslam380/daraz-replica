<?php
include("header.php");
include("link.php");
include("dbcontroller.php");
$db_handle = new DBController();
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
<?php include_once("link.php"); ?>
</head>
<body style="1px solid black">
	<div class="container" class="col-sm-3" style="margin-top:5%;">
		<div class="row" class="col-sm-3" style="">
		<?php
			if($_POST['id']==""){
						$link_address ="index.php";
						echo "<a href='".$link_address."'.' height='200' width='300'> <== Product Not Exist</a>";
						die("Invalid Command");
				}		
				else if(isset($_POST['search']))
				{
				$name = $_POST['id'];
				//echo $name;
				$product_array = $db_handle->runQuery("SELECT * FROM products where name='$name'");
					
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
				}
				else{
					echo "No Record Find";
					//header("Refresh: 5;url=http://localhost/daraz/index.php/");
					echo "<script> window.location.replace('index.php'); </script>";
				}
				?>
				</div>
			</div>

</body>
</html>

