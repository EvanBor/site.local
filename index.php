<?php
	include('login.php'); //Login Script
	if ((isset($_SESSION['username']) != '') && (isset($_SESSION['uid']) != '') && $_SESSION['ip'] = $_SERVER['REMOTE_ADDR']) 
	{
		header('Location: home.php');
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
<title>Test site</title>

</head>

<body>
<div align="center">
<h1>Добро пожаловать</h1>
<div class="loginBox">
    <br>
    <fieldset>
    <legend>Форма входа</legend>
    <form method="post" action="">
        <label>Логин</label><br>
        <input type="text" name="username" placeholder="логин" /><br><br>
        <label>Пароль</label><br>
        <input type="password" name="password" placeholder="пароль" /><br><br>
        <img src="secpic.php" alt="captcha"><br>
        <input type="text" name="captcha" placeholder="captcha" /><br><br>
        <input type="submit" name="submit" value="Login" /> 
    </form>
    <div class="error"><?php echo $error;?></div><br>
    </fieldset>
    <a href="registration.php">Зарегистрироваться</a>
</div>
</body>
</html>