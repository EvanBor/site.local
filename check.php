<?php
include('connection.php'); //Подключаемся к базе
session_start(); //Запускаем сессию
if (!((isset($_SESSION['username']) != '') && (isset($_SESSION['uid']) != '') && $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'])) 
	{
		header('Location: index.php');
	}	
?>