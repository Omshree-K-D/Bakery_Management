<!DOCTYPE html>
<html>
<head>
 <title>Table with database</title>
 <style>
  
  table {
   border-collapse: collapse;
   width: 100%;
   color: black;
   font-family: monospace;
   font-size: 25px;
   text-align: center;
     } 
  th {
   background-color: black;
   color: white;
   padding: 8px;
    }
  tr:nth-child(even) 
  {
    background-color: #f2f2f2;
  }
  td
  {
    padding: 8px;
  }
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="laundrystyle3.css">
    
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<table border=1>
 <tr>
  <th>Order Id</th>
  <th>Quantity</th> 
  <th>Total</th>
</tr>
 <?php
 $total = 0;
 $qu_total = 0;
 $conn = mysqli_connect("localhost", "root", "", "managements");
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	$sql = "SELECT * FROM invoices";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		 while($row = $result->fetch_array()) {
      echo "<tr>
              <td>".$row[0]."</td>
              <td>".$row[1]."</td>
              <td>".$row[2]."</td>
              
      </tr>";
       $total  = $total + $row[2];
       $qu_total = $qu_total + $row[1];
     }
     echo "  <tr><td></td></tr>
              <tr>
              <td>Total</td>
              <td>".$qu_total."</td>
              <td>".$total."</td>
              </tr> 
          ";
     echo "</table>";
		}
	 else { 
	 	echo '<script>alert("No Record found..")</script>'; 
	 }
 $conn->close();
 ?>

</table>
</body>
</html>