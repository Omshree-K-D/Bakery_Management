<html>
<head><title>Admin</title>
<link rel="stylesheet" type="text/css" href="laundrystyle3.css">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body class="bd">
	<div class="nav"><a class="abut" href="login.php"><img src="lg.png" height="30px" width="30px"><div class="logout">LOGOUT</div></a></div>
	<h1 class="h1d">Bakery Admin Panel</h1>
	<div class="inp2">
	<input class="ibut" type="button" id="bt1" value="Create Manager" onclick="createAdm()" /><br>
	<input class="ibut" type="button" id="bt1" value="Add Product" onclick="location.href='add_product.php'" /><br>
	<input class="ibut" type="button" id="bt2" value="Check" onclick="check()" /><br>
	<input class="ibut" type="button" id="bt2" value="History" onclick="location.href='Bakery_history.php'" />
	
</div>
	
	<script>
	var counter1 = 0;
	var counter2 = 0;
	var dept=window.location.search.split('&')[1];

	var b=window.location.search.split('&')[0];

	var id = b.split('=')[1];
		function createAdm() {
			counter1++;
			if(counter1 == 1) {
				if(document.getElementById('container')) {
					var element = document.getElementById('container');
					element.parentNode.removeChild(element);
				}
				var p = document.createElement('P');
				p.setAttribute('id', 'container');
				document.body.appendChild(p);
				var h = document.createElement('H1');
				h.appendChild(document.createTextNode('Create Manager'));
				container.appendChild(h);
				var br = document.createElement('br');
				container.appendChild(br);
				var br = document.createElement('br');
				container.appendChild(br);
				var txt = document.createElement('input'); 
				txt.setAttribute('type', 'text');       
				txt.setAttribute('id', 'blank');
				txt.setAttribute('placeholder','Enter Details Below..')
				container.appendChild(txt);
				var br = document.createElement('br');
				container.appendChild(br);
				var lbl = document.createElement('label');
				lbl.appendChild(document.createTextNode('Full Name'));
				container.appendChild(lbl);	
				var txt = document.createElement('input'); 
				txt.setAttribute('type', 'text');       
				txt.setAttribute('id', 'fname'); 
				txt.setAttribute('placeholder','Enter Full Name');
				container.appendChild(txt);
				var lbl = document.createElement('label');
				lbl.appendChild(document.createTextNode('Username'));
				container.appendChild(lbl);	
				var txt = document.createElement('input'); 
				txt.setAttribute('type', 'text');       
				txt.setAttribute('id', 'username');
				txt.setAttribute('placeholder','Enter Username'); 
				container.appendChild(txt);
				var br = document.createElement('br');
				container.appendChild(br);
				var lbl = document.createElement('label');
				lbl.appendChild(document.createTextNode('Password'));
				container.appendChild(lbl);	
				var txt = document.createElement('input'); 
				txt.setAttribute('type', 'password');       
				txt.setAttribute('id', 'password');
				txt.setAttribute('placeholder','Set Password');
				container.appendChild(txt);
				var br = document.createElement('br');
				container.appendChild(br);
				
				var br = document.createElement('br');
				container.appendChild(br);
				var btn = document.createElement('button');
				btn.appendChild(document.createTextNode("Save"));
				btn.setAttribute('onclick', 'save()');
				container.appendChild(btn);
				var br = document.createElement('br');
				container.appendChild(br);
				var br = document.createElement('br');
				container.appendChild(br);
				counter2 = 0;
			}
		}
		
		function save() {
			if(username.value !== '' && password !== '' && fname !== '' ) {
				window.location.href = "Bakery_admin.php?w1=" + username.value + "&w2=" + password.value + "&w3=" + fname.value + "&w4=" + id + "&w5=" + dept ;
			}
			else {
				alert('Fill all details');
				window.location.href = 'Bakery_admin.php?x=' + id + '&' + dept;
			}
		}
		
		function check() {
			var ap = " WHERE admin_code = " + id;
			window.location.href = "Bakery_admin_check.php?ap=" + ap;
		}
		
	</script>
</body>
</html>

<?php
	if(isset($_GET["w1"]) && isset($_GET["w2"]) && isset($_GET["w3"]) && isset($_GET["w4"]) && isset($_GET["w5"])) {
		$x = $_GET["w4"];
		$conn = mysqli_connect("localhost", "root", "", "managements") or die("Unable to connect");
		$query = "INSERT INTO login (user_name, password, status, full_name, admin_code ,department) VALUES ('".$_GET["w1"]."', '".$_GET["w2"]."', 'normal', '".$_GET["w3"]."', '".$_GET["w4"]."', '".$_GET["w5"]."');";
		mysqli_query($conn, $query);
		mysqli_close($conn);
		echo '<script language="javascript">';
		echo "var x = $x";
		echo '</script>';
		echo '<script language="javascript">';
		echo 'window.location.href="Bakery_admin.php?x=" + x + "&Bakery"';
		echo '</script>';
	}
?>