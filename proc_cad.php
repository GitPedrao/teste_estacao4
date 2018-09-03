<?php

	session_start();
	include_once('conecta.php');

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);


	$query = "INSERT INTO produtos (nome, descricao, preco) VALUES('$nome', '$descricao','$preco')";
	$result = mysqli_query($cn, $query);

	if(mysqli_insert_id($cn))
	{
		$_SESSION['msg'] = "<p style = 'color:green;'>Produto cadastrado com sucesso!</p>";
		header("Location: listar.php");
	}
	else
	{
		$_SESSION['msg'] = "<p style = 'color:red;'>O Produto não foi cadastrado com sucesso!</p>";
		header("Location: cadastrar.php");
	}


?>
