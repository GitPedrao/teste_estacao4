<?php

	session_start();
	include_once('conecta.php');
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);



	$query = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', preco = '$preco' WHERE id = '$id' ";
	$result = mysqli_query($cn, $query);

	if(mysqli_affected_rows($cn))
	{
		$_SESSION['msg'] = "<p style = 'color:green;'>Produto editado com sucesso!</p>";
		header("Location: listar.php");
	}
	else
	{
		$_SESSION['msg'] = "<p style = 'color:red;'>WRONGG!! O produto não foi editado :/ </p>";
		header("Location: editar.php?id=$id");
	}


?>