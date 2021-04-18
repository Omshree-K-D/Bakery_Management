<?php
$conn = mysqli_connect("localhost","root","","managements") or die("Error in cnx");
    
    $query = "SELECT Id FROM tbl_product";

    $result = mysqli_query($conn, $query);
    $n = mysqli_num_rows($result);

   $conn -> close();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			
.bd{
  background: url(Cover3.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  padding-top: 50px;
  font-family: Arial, Helvetica, sans-serif;
  background-blend-mode: lighten;
}
.submitbtn {
  width: 60%;
  padding: 10px 10px;
  margin: 8px 0;
  border: 1px solid #ccc;
  background-color: #808080;
  
}
.container {
  border-radius: 25px;
     width: 60%;
  padding-left: 30%;
  padding-top: 40%;
  margin: 40px 0;
  border: 1px solid #ccc;
  color:white;
  height: 70%;
  padding: 10px;
  background: #4d4d4d;
  max-width: 650px;
  margin: -90px 360px;
    opacity: 1;
  text-align: center;

  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

}

.table{
	text-align: center;
	width: 100%;
	padding: 50px 20px;
	margin-left: 13%;
}
.container input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 90%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.container button {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  border: 2px solid #ccc;
  background-color: #666666;
  font-size: 20px;
  
}

.container button:hover {background-color: #32CD32;}

.container select {
  cursor: pointer;
  width: 300px;
  display: inline-block;
  background-color: #f2f2f2;
  border-radius: 5px;
  box-shadow: 0 0 2px rgb(204, 204, 204);
  position: relative;
  font-size: 14px;
  color: #474747;
  height: 5%;
  text-align: left
}
.container option {
    display: block;
    padding: 10px;
    font-size: 13px;
    color: #888;
    cursor: pointer;
    transition: all .3s ease-in-out;
    float: right;
    line-height: 20px
}
.container option:hover {
    box-shadow: 0 0 4px rgb(204, 204, 204)
}
.container option:active {
    background-color: #f8f8f8
}
		</style>
</head>
<body class="bd">
	<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Bakery</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="Bakery_admin.php">Home</a></li>
      <li class="active"><a href="add_product.php">Add Product</a></li>
      <li><a href="Bakery_admin_check.php">Check Manager</a></li>
      <li><a href="Bakery_history.php">History</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav><br><br><br><br><br><br>
<div class="container">
<form action="upload.php" method="POST" enctype="multipart/form-data">
	<div class="table">
	<table class="table-borderless table-dark table-responsive">
		<tr>
			<th>Product Id</th>
			<th>:  :  :</th>
			<th><input type="text" class="form-control form-control" name="Id" id="Id" value=<?php echo $n+1 ?> readonly></th>
		</tr>
		<tr>
			<td>Name </td>
			<td>:  :  :</td>
			<td><input type="text" name="productName" class="form-control form-control" id="productName" placeholder="Product Name ..." required></td>
		</tr>
		<tr>
			<td>Product Image </td>
			<td>:  :  :</td>
			<td><input type="file" class="btn btn-outline-primary" class="form-control-file border" name="file" required></td>
		</tr>
		<tr>
			<td>Product Cost </td>
			<td>:  :  :</td>
			<td><input type="number" name="productCost" class="form-control form-control" id="productCost" placeholder="Product Cost ..." required></td>
		</tr>
		<tr>
			<td colspan="3"><hr width="70%"></td>
		</tr>
		<tr><td colspan="3"><button type="submit" class="submitbtn" name="submit"><b>Add</b></button></td></tr>
		<tr>
			<td colspan="3"><hr width="50%"></td>
		</tr>
				
	</table>
	
</div>
</form>
</div>
</body>
</html>