<?php
session_start();
ini_set('display_errors', 1); error_reporting(-1);
include('conexao.php');

if(empty($_POST['NOME']) || empty($_POST['SENHA'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['NOME']);
$senha = mysqli_real_escape_string($conexao, $_POST['SENHA']);

$query = "select NOME from cliente where NOME = '{$usuario}' and SENHA = '{$senha}'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
if($row == 1) {
	$usuario_bd = mysqli_fetch_assoc($result);
	$_SESSION['NOME'] = $usuario_bd['NOME'];
	header('Location: menu.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}

