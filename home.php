<?php
	include("check.php");	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
</head>

<body>
<h1 class="hello">Hello, <em><?php echo $_SESSION['username'];?>, your id: <?php echo $_SESSION['uid'];?>! IP: <?php echo $_SESSION['uip'];?></em></h1>
<br><br><br>
<a href="logout.php" style="font-size:18px">Logout?</a>
</body>
</html>