<?php
require_once("dbcontroller.php");
include("mysqli_connect.php");
require_once("functions.php");
$db_handle = new DBController();
$customerId = $_SESSION["loggedInCustomer"];
$orderNo="";
?>
 
<HTML>
<HEAD>
<link href="styles.css" type="text/css" rel="stylesheet" />
<style>
a{
	color:white;
	}
</style>

</HEAD>
<BODY style="font-size:20px;border:2px solid orange;padding:5px">

<div id="shopping-cart" style="padding:10px">
<div class="txt-heading" style="margin:20px">Shopping Cart</div>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1" style="border:1px solid black">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["id"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				
				$productName =$item["name"];
				$productId=$item["id"];
				$productPrice=$item["price"];
				$productQuantity=$item["quantity"];
				
				$query2 = "SELECT * from payments where customerId=$customerId";
				$result1 = mysqli_query($db, $query2);
				if($result1){
				
				$row = mysqli_fetch_array($result1);
				$result= $row['id'];
				$orderNo=$row['id'];
				echo "<h2> Order No:";
				echo $orderNo;
				echo "</h2>";
				
				$query = "insert into orders(paymentId,productId,name,price,quantity)
				Values('$result','$productId','$productName','$productPrice','$productQuantity')";
				if(!mysqli_query($db, $query))
					die("error");
				}
				else
					die();
			}
		?>

<tr style="margin-top:40px">
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>	
<a style="color:white;float:right;width:130px;height:25px;text-align:center;background-color:orange;padding:5px;margin-top:10px;border:1px solid black;"id="" href="finalPayment.php">Check Out</a>	
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

</div>
</BODY>
</HTML>