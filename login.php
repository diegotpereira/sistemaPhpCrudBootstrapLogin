<?php
session_start();
include('config.php');

if(empty($_POST['usuario_nome']) || empty($_POST['usuario_senha'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario_nome']);
$senha = mysqli_real_escape_string($conexao, $_POST['usuario_senha']);

$query = "select usuario_nome from tab_usuario where usuario_nome = '{$usuario_nome}' and usuario_senha = md5('{$usuario_senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario_nome'] = $usuario_nome;
	header('Location: painel.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}