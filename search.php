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
        'item_id'     =>  $_GET["id"],
        'item_name'     =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_quantity'   =>  $_POST["quantity"]
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
      'item_id'     =>  $_GET["id"],
      'item_name'     =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_quantity'   =>  $_POST["quantity"]
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
        //echo '<script>alert("Item Removed")</script>';
        echo '<script>window.location="products.php"</script>';
      }
    }
  }
}

// unset($_SESSION['shopping_cart']);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bakery Shopping Cart</title>
    <style>

body
    {
      background-image: url("Cover1.jpg");
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
  padding-top: 20%;
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
  </head>
  <body >
    <br />
    <div class="container">
      <br /><br />
           
      <div class="container1">
        <form action="db2.php" method="post">
        <table>
          <tr><th colspan="3"><h3 align="center"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Order Details</h3></th>
            <th colspan="2"><input class="ibut" type="button" id="bt2" value="Back" onclick="location.href='Bakery_manager.php'" />
          <tr>
            <th>Order ID</th>
            <th><input type="text" name="order_id" id="a1" required></th>
          </tr>
          <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
          </tr>
          <?php
          if(!empty($_SESSION["shopping_cart"]))
          {
            $total = 0;
            $total_quantity = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
          ?>
          <tr>
            <td><?php echo $values["item_name"]; ?></td>
            <td><?php echo $values["item_quantity"]; ?></td>
            <td>INR <?php echo $values["item_price"]; ?></td>
            <td>INR <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
            <td><a href="products.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
          </tr>
          <?php
              $total = $total + ($values["item_quantity"] * $values["item_price"]);
              $total_quantity = $total_quantity + $values["item_quantity"];

            }
          ?>
          <tr>
            <td>Total Quantity</td>
            <td><?php echo number_format($total_quantity); ?></td>
            <td colspan="1" align="right">Total</td>
            <td align="right">INR <?php echo number_format($total, 2); ?></td>
            <td></td>
          </tr>
          
          <tr><td colspan="3"></td>
             <td>
                <input type="hidden" name="total_quantity" value=<?php echo $total_quantity; ?>>
                <input type="hidden" name="total" value=<?php echo $total; ?>>
              </td><td></td>

          </tr>
          
          <?php
          }
          ?>            
        </table>
                 <button type="submit" name="submit" value="Search" onclick=location.href='search_list.php'>Search</button>      
                  </form>
      </div>
    </div>
  </div>
  <br />
  </body>
</html>

