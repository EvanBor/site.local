<?php
	session_start();
	include("connection.php"); //Подключаемся к базе данных
	
	$error = ""; //Ошибки.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["captcha"])) //Проверка на заполненность всех полей.
		{
			$error = "Все поля обязательны для заполнения.";
		}
		else
		{
			if($_POST["captcha"] == $_SESSION['secpic'])
			{
				//Определяем $username и $password
				$username=$_POST['username'];
				$password=$_POST['password'];

				//Защищаемся от MySQL-инъекции
				$username = stripslashes($username);
				$password = stripslashes($password);
				$username = mysqli_real_escape_string($db, $username);
				$password = mysqli_real_escape_string($db, $password);
				
				//Щифруем пароль
				$password = md5($password);
			
				//Проверяем $username и $password из базы
				$sql="SELECT uid, username FROM users WHERE username='$username' and password='$password'";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
				//Создаем сессию и переводим на главную страницу, если $username и $password существуют в нашей базе данных
			
				if(mysqli_num_rows($result) == 1)
				{
					$_SESSION['uid'] = $row[uid];
					$_SESSION['username'] = $row[username];
					$_SESSION['uip'] = $_SERVER['REMOTE_ADDR'];
					header("location: home.php");
				}
				else
				{
					$error = "Неверный пароль или логин.";
				}
			}
			else
			{
				$error = "Неверная каптча.";
			}
		}
	}

?>