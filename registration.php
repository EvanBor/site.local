<?php
	session_start();
	include ("connection.php");

	$msg = "";
	if(isset($_POST["submit"]))
	{
		if($_POST["captcha"] == $_SESSION['secpic'])
		{
			$name = $_POST["name"];
			$password = $_POST["password"];

			$name = mysqli_real_escape_string($db, $name);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);


			$sql="SELECT uid FROM users WHERE username='$name'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			if(mysqli_num_rows($result) == 1)
			{
				$msg = "Sorry... Username " + "'$name' " + "already exist...";
			}
			else
			{
				$query = mysqli_query($db, "INSERT INTO users (username, password) VALUES ('$name', '$password')");
				if($query)
				{
					$msg = "Thank You! you are now registered.";
				}
			}
		}
		else
		{
			$msg = "Incorrect captcha. Try again!";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<style>
/* user format */
fieldset, legend {
    border: 1px solid #ddd;
    background-color: #eee;
    -moz-border-radius-topleft: 5px;
    border-top-left-radius: 5px;
    -moz-border-radius-topright: 5px;
    border-top-right-radius: 5px;
    }
legend {
    font-weight: normal;
    font-style: italic;
    font-size: 1.2em;
    text-shadow: #fff 1px 1px 1px; }
fieldset {
    background-color: #f7f7f7;
    width: 360px;
    -moz-border-radius-bottomleft: 5px;
    border-bottom-left-radius: 5px;
    -moz-border-radius-bottomright: 5px;
    border-bottom-right-radius: 5px; }
</style>
<title>Registration</title>

</head>

<body>
<div align="center">
<form method="post" action="">
<fieldset>
<legend>Форма регистрации</legend>
	<form method="post" action="">
        <label>Логин</label><br>
        <input type="text" name="name" placeholder="логин" /><br><br>
        <label>Пароль</label><br>
        <input type="password" name="password" placeholder="пароль" /><br><br>
        <img src="secpic.php" alt="captcha"><br>
        <input type="text" name="captcha" placeholder="captcha" /><br><br>
        <input type="submit" name="submit" value="Login" />
    </form>
    <div class="msg"><?php echo $msg;?></div><br>
</fieldset>
</form>
</div>
</body>
</html>
