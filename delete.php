<?php
	session_start();
	include_once('conecta.php');
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$query = "DELETE FROM produtos WHERE id = '$id' ";
	$result = mysqli_query($cn,$query); 
	if(mysqli_affected_rows($cn))
	{
		$_SESSION['msg'] = "<p style = 'color:green;'> Produto apagado com sucesso!</p>";
		header("location:listar.php");
	}
	else
	{
		$_SESSION['msg'] = "<p style = 'color:red;'> O produto não foi apagado com sucesso :/ </p>";
		header("location:listar.php");
	}	
?>	