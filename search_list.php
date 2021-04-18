<!DOCTYPE html>
<html>
<head>
	<title>Prize list</title>
	<style>
body
    {
      background-image: url("cover2.jpg");
      background-repeat: no-repeat;
      background-repeat: no-repeat;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover; 
      padding-top: 100px;
    }
 td{
    background-color: white;
    text-align:left;
    margin-left: 20px; 
    font-size:15px;
    color: #616A6B ;
    padding: 5px;
    }
th
    {

     padding-bottom: 5px;
     color : 
     }
input[type=text]
     {
        padding: 5px;
       
     }       
input[type=number]
     {
        padding: 5px;
       
     }      
input[type=date]
     {
        padding: 5px;
        
     }
button[type=submit]
     {
  font-size: 22px;
  font-family: 'Oswald', sans-serif;
  border-radius: 5px;
  width: 150px;
  height: 40px;
  margin: 10px;
  border: 1px solid #ccc;
            } 
.ibut
  {     
        font-size: 22px;
  font-family: 'Oswald', sans-serif;
  border-radius: 5px;
  width: 150px;
  height: 40px;
  margin: 10px;
  border: 1px solid #ccc;
            }  
.button:hover {background-color: #3e8e41}
.text-danger{
  color: red;
}         
.container1{

   border-radius: 25px;
   width: auto;
  padding-left: 30%;
  padding-top: 50%;
  margin: 40px 0;
  border: 1px solid #ccc;
  color:white;
  height: auto;
  padding: 10px;
  background: #4d4d4d;
  max-width: auto;
  margin: -90px 360px;
    opacity: 1;
  text-align: center;

  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);

}
 th
  {
    font-size:20px;
  }
 h1
  {
    font-family: cursive;
    font-size:35px;  
  }

    </style>
    <div class="container1">
	<?php 

	$conn = mysqli_connect("localhost", "root", "", "managements") or die("Unable to connect.");
	$sql = "SELECT * FROM invoices WHERE Order_ID= '".$_GET['x']."'";
	$result = mysqli_query($conn, $sql);
	echo "<fieldset>";
	echo "<center><h1>Invoice</h1></center><hr>";
	echo "<form class='d'>";
	echo "<table class='a'>";
	echo "<tr><th>Order Id</th><th></th>
			<th>Total Quantity</th><th></th>			
			<th>Total</th></tr>";
	while($w = mysqli_fetch_array($result))
	{

		echo "<tr>";
		echo "<td>{$w[0]}</td>";
		echo "<td></td>";
		echo "<td>{$w[1]}</td>";
		echo "<td></td>";
		echo "<td>{$w[2]}</td>";		
		echo "</tr>";
	}
	echo "</table>";
	echo "<font size='4 '><p class='font'><b>Signature</b></p></font>";
	
	echo "</form>";
	
	echo "</fieldset>";
	
	mysqli_free_result($result);

	mysqli_close($conn);

	?>

 
<body>
	<button type="submit" onclick="location.href='search.php'">Back</button>
</div>
</head>
</body>
</html>
