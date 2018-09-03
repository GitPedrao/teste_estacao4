<?php

	session_start();
	include_once('conecta.php');
?>


<!DOCTYPE html>
<html>
	<head>
		<title>teste_estacao4</title>
	</head>
	<body>
		<a href = "cadastrar.php">Cadastrar</a><br>
		<a href = "listar.php">Listar</a><br>
		<center><h1>Listar Produtos</h1></center>

		<?php

			if (isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}

			//Receber o número da página
			$pagina = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
			$verifica_pagina = (!empty($pagina)) ? $pagina : 1;

			//Setar a quantidade de itens por página
			$qnt_pg = 2;

			//Calcular o início da visualização
			$inicio = ($qnt_pg * $verifica_pagina) - $qnt_pg;

			$query = "SELECT * FROM produtos ORDER BY nome LIMIT $inicio, $qnt_pg";
			$result_usuarios = mysqli_query($cn, $query);

			while($row_produto = mysqli_fetch_assoc($result_usuarios))
			{
				echo "ID:" . $row_produto['id'] . "<br>";
				echo "Nome:" . $row_produto['nome'] . "<br>";
				echo "Descrição:" . $row_produto['descricao'] . "<br>";
				echo "Preço:" . $row_produto['preco'] . "<br>";
				echo "<a href = 'edit.php?id=" . $row_produto['id'] . "'>Editar </a><br>";
				echo "<a href = 'delete.php?id=" . $row_produto['id'] . "'>Apagar</a><br><hr>";
				
			}

			//Paginaçāo -  Somar a quantidade de usuários
			$query_pg = "SELECT COUNT(id) AS num_result FROM produtos";
			$result_pg = mysqli_query($cn, $query_pg);
			$row_pg = mysqli_fetch_assoc($result_pg);
			//echo $row_pg['num_result'];

			//Quantidade de página
			$quantidade_pg = ceil($row_pg['num_result'] / $qnt_pg);

			//Limitar os links antes e depois
			$max_links = 2;
			echo "<a href = 'listar.php?pagina=1'> Primeira </a>";

			for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++)
			{
				if($pag_ant >= 1)
				{
					echo "<a href = 'listar.php?pagina=$pag_ant'> $pag_ant </a>";
				}

			}
			echo "$pagina";

			for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++)
			{
				if($pag_dep <= $quantidade_pg)
				{
				echo "<a href = 'listar.php?pagina=$pag_dep'> $pag_dep </a>";
				}
			}

			echo "<a href = 'listar.php?pagina=$quantidade_pg'> Ultima </a>";

		?>
	</body>
</html>
