<?php 

if (isset($_POST['submit'])) {
	$product_Id = $_POST['Id'];
	$product_Name = $_POST['productName'];
	$product_cost = $_POST['productCost'];

	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));


	$allowed = array('jpg' , 'jpeg' , 'png');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 1000000000) {
				
				$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = 'product/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
			}else{
				echo "Your File is too big !";
			}


		}else{
			echo "There Was an error!";
		}
	}
	else{

		echo "Please Upload image only !";
	}

	$conn = new mysqli("localhost","root","","managements") or die("Error in cnx");
   

	 $querry ="INSERT INTO tbl_product VALUES('$product_Id','$product_Name','$fileNameNew','$product_cost')"; 
		if($conn->query($querry))
		{
			echo"Data Saved Successfully";
		}
		else
		{
			echo"Error";
		}
		$conn -> close();
		echo '<script>alert("Product Added !")</script>';
		header("Location: add_product.php?Fileuploaded");
}


?>