
<?php
	$conn = mysqli_connect("localhost", "root", "", "ManagementS") or die("Unable to connect");
	session_start();
	if(isset($_POST['username']) && isset($_POST['password'])) {
		$query = "SELECT * FROM login WHERE user_name='".$_POST['username']."'";
		$result = mysqli_query($conn, $query);
		$data = mysqli_fetch_array($result);
		if(isset($data)) {
			if($_POST['password'] == $data[2]) {
				if(($data[6] == 'null')&& ($data[3]=='super')){
					header("Location: super.php?x=".$data[0]."&".$data[6]);
				}
				elseif((($data[6] == 'Bakery')&& ($data[3]=='admin'))) 
				{
					
					header("Location: Bakery_admin.php?x=".$data[0]."&".$data[6]);

				}
				
				else {
					header("Location: Bakery_manager.php?x=".$data[0]."&".$data[6]);
				}
			}
			else {
				echo '<script language="javascript">';
				echo "alert('Wrong Password')";
				echo '</script>';
			}
		}
		mysqli_free_result($result);
	}
	mysqli_close($conn);
?>

<html>
	<head><title>Login page</title>
<link rel="stylesheet" type="text/css" href="laundrystyle3.css">
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<body class="login">
		<div class=h><h1 >BAKERY MANAGEMENT SYSTEM</h1></div>
	<div class="form">
		<h2>LOGIN</h2><br>
		<form action="login.php" method="post">
		<h3><input type="text" name="username" placeholder="User Name"/></h3>
		<h3><input type="password" name="password" placeholder="Password"/></h3>
		<input class="button" type="submit" value="Login">
		</form>
		</div>
	</body>
</html>