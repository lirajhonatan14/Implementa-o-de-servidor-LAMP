<?php
ini_set('display_errors', 1); error_reporting(-1);	
	$hostname="10.77.13.184";
	$username="cliente";
	$password="123";
	$dbname="loja";
	$usertable="cliente";
	
	$conexao = mysqli_connect($hostname,$username, $password, $dbname) or die ("html>script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)/script>/html>");



