<?php

if(isset($_POST['submit']))
{
unset($_SESSION['shopping_cart']);
$orderid = $_POST['order_id'];
$total_quantity = $_POST['total_quantity'];
$total = $_POST['total'];

$conn = new mysqli("localhost","root","","managements") or die("Error in cnx");
   

 $querry ="INSERT INTO invoices VALUES('$orderid','$total_quantity','$total')"; 
	if($conn->query($querry))
	{
		echo"Data Saved Successfully";
	}
	else
	{
		echo"Error";
	}
	$conn -> close();
	header("Location: prizelist.php?x=".$orderid);
}
?>
