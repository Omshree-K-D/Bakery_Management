<!DOCTYPE html>
<html>
    <head>
    <title>Table with database</title>
        <style>
            table 
            {
                border-collapse: collapse;
                width: 100%;
                color: black;
                font-family: monospace;
                font-size: 25px;
                text-align: left;
            } 
            th 
            {
                background-color: black;
                color: white;
            }
            tr:nth-child(even) 
            {
                background-color: #f2f2f2
            }
        </style>
    </head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <body>
            <table>
                <tr>
                <th>User_id</th> 
                <th>User_name</th> 
                <th>Status</th>
                <th>Full Name</th>
                </tr>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "managements");
                if ($conn->connect_error) 
                {
                    die("Connection failed: " . $conn->connect_error);
                } 
                if(isset($_GET["ap"]))
                {
                    $sql = "SELECT user_id, user_name, status, full_name FROM login".$_GET["ap"];
                }
                else 
                {
                    $sql = "SELECT user_id, user_name, status, full_name FROM login";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                    {
                        echo "<tr><td>".$row["user_id"]."</td><td>".$row["user_name"]."</td><td>".$row["status"]."</td><td>".$row["full_name"]."</td></tr>";
                    }
                    echo "</table>";
                } 
                else 
                { 
                    echo "0 results"; 
                }
            $conn->close();
            ?>
            </table>
        </body>
</html>