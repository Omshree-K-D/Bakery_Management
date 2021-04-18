<?php

if(isset($_POST['submit']))
{

$orderid = $_POST['order_id'];



$conn = new mysqli("localhost","root","","managements") or die("Error in cnx");
   

 $querry ="SELECT * FROM invoices WHERE Order_ID == '$orderid'"; 
	if($conn->query($querry))
	{
		echo"Data Saved Successfully";
	}
	else
	{
		echo"Error";
	}
	$conn -> close();
	header("Location: search_list.php?x=".$orderid);
}
?>
