<?php
        $conn = new mysqli("localhost","root","","managements") or die("Error in cnx");

$sql = "SELECT * FROM invoicecar where invoiceno='".$_GET['x']."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    
    echo "<form>";
    echo "<fieldset>";
    echo "<center><h1>Invoice</h1><hr><hr>";
    echo "<table class='a' border='0'>";
            echo "<tr>";
                echo "<th>Invoice No</th>";
                echo "<th>Parking Slot</th>";
                echo "<th>Customer Name</th>";
                echo "<th>Mobile No</th>";
                echo "<th>Address</th>";
                echo "<th>Vehicle</th>";
                echo "<th>Date</th>";
                echo "<th>Time_in</th>";
                echo "<th>Time_out</th>";
                echo "<th>Price</th>";
                echo "<th>Amount</th>";
            echo "</tr>";

        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
                echo "<td>" . $row['invoiceno'] . "</td>";
                echo "<td>" . $row['parkingslot'] . "</td>";
                echo "<td>" . $row['Customer_name'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['vehcle'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['timein'] . "</td>";
                echo "<td>" . $row['timeout'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['amount'] . "</td>";
            echo "</tr>";

         }
    echo "</table>";
    echo "<font size='4 '><p class='font'><b>Signature</b></p></font>";
    echo "</fieldset>";
    echo "</center>";
    echo "</form>";
    
 } 
$conn -> close();
?>

<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        fieldset
        {
            margin-left: 250px;
            margin-right: 250px;
            background-color: darkgray;
            padding-bottom: 10px; 
            border:3px solid blue;
           /* background-image: url("o.jpg");
            background-repeat: no-repeat;
            background-size: 420px 230px;*/
            
        }
        .a
        {
           /* margin-top: 30px;
            margin-left: 465px;
            margin-right: 700px;*/
            background-color: black;
        }
        th
        {
            background-color: pink;
            padding:7px;

        }
        td{
            background-color: white;
            padding: 7px;
        }
        body{
            background-color: whitesmoke;
            background-size: 1370px 670px;
            padding-top: 100px;
        }
        h1{
            padding-top: 10px;
            color: black;
        }
        .font
        {
            margin-left: 800px;
            margin-top: 45px;

        }
       
    </style>
</head><body></body>
</html>             