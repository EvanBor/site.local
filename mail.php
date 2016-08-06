<?php
	include("check.php");	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mail</title>
</head>

<body>
<h1>Сообщения</h1>
<br>
<div align='center'>
<?php
	$muid=$_SESSION['uid'];
	$sql="SELECT * FROM dialogs WHERE fuid='$muid' OR suid='muid'";
	$result=mysqli_query($db,$sql);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	foreach($row as $dialog)
	{
		echo "Диалог $row[fuid] и $row[suid]</br>";
	}
		
?>
</div>
<br><br>
<a href="logout.php" style="font-size:18px">Logout?</a>
</body>
</html>