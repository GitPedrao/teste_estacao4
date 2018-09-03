<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>teste_estacao4</title>
	</head>
	<body>
		<a href = "cadastrar.php">Cadastrar</a><br>
		<a href = "listar.php">Listar</a><br>
		<center><h1>Cadastrar Produto</h1></center><br><br>

		<?php

			if (isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}

		?>

		<form method = "POST" action = "proc_cad.php">
			<div class="container">

				<div class="form-group row">
			      <label class="col-sm-2 col-form-label">Nome:</label>
			      <div class="col-sm-10">
			        	<input type="text" name = 'nome' class="form-control"  placeholder="Digite o nome do produto">
			      </div>
			    </div>

			    <div class="form-group row">
			      <label class="col-sm-2 col-form-label">Descrição</label>
			      <div class="col-sm-10">
			        	<input type="text" name = 'descricao' class="form-control"  placeholder="Descreva seu produto">
			      </div>
			    </div>

			     <div class="form-group row">
			      <label class="col-sm-2 col-form-label">Preço</label>
			      <div class="col-sm-10">
			        	<input type="text" name = 'preco' class="form-control"  placeholder="Digite o preço">
			      </div>
			    </div><br><br>
		
			    <div class="form-group row">
			    	<div class="offset-sm-2 col-sm-10">
			        	<button type="submit" class="btn btn-primary">Cadastrar</button>
			 		</div>
				</div>
			</div>
		</form>
	</body>
</html>
