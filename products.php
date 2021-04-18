<?php
$conn = mysqli_connect("localhost","root","","managements") or die("Error in cnx");
    
    $query = "SELECT Order_Id FROM invoices";

    $result = mysqli_query($conn, $query);
    $n = mysqli_num_rows($result);

   $conn -> close();
?>


<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "managements");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				// echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="products.php"</script>';
			}
		}
	}
}

?>
<!-- unset($_SESSION['shopping_cart']); -->
<!DOCTYPE html>
<html>
	<head>
		<title>Bakery Shopping Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	</head>
	<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >Bakery</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="Bakery_manager.php">Home</a></li>
      <li class="active"><a href="products.php">Bucket</a></li>
      <li><a href="create_invoice.php">Place Order</a></li>
      <li><a href="Bakery_history.php">History</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
		<br />
		<div class="container">
			<br /><h3 align="center">Bucket</h3><br />
			<?php
				$query = "SELECT * FROM tbl_product ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="products.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
						<img src="product/<?php echo $row["image"]; ?>" class="img-responsive" /><br/>

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">INR <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br /><br><hr width="17%" align="left"><br><hr width="17%" align="left">
			<input class="btn btn-primary" type="button" id="bt2" value="Back" onclick="location.href='Bakery_manager.php'" />
			
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						$total_quantity = 0;
						$cntr = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><a href="products.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$cntr = $cntr + 1;
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
							$total_quantity = $total_quantity + $values["item_quantity"];

						}
					?>
					<tr><h3>Bucket <span class="label label-default">0<?php echo number_format($cntr); ?></span></h3></tr><tr></tr>
					<tr>
						<td>Total Quantity</td>
						<td><?php echo number_format($total_quantity); ?></td>
						<td colspan="1" align="right">Total</td>
						<td align="right">INR <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
					<input class="btn btn-success" type="button" id="bt2" name="Place_order" value="Place Order" onclick="location.href='create_invoice.php'"  />
		</div>
	</div>
	<br />
	</body>
</html>

