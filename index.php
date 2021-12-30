<?php
	//Inicia sessão com banco de dados
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastrar</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="header">
				<nav class="navbar navbar-dark text-white bg-dark justify-content-between">
					<a class="navbar-brand">LOGO</a>
					<form class="form">
						<a href="index.php"><button type="button" class="btn btn-primary .ml-1">Cadastrar</button></a>
						<a href="php/lista_usuarios.php"><button type="button" class="btn btn-primary .ml-1">Registros</button></a>
					</form>
				</nav>
			</div>
			<div class="mt-5">
				<h1>Cadastrar Usuário</h1>
			</div>			
			<?php
				//Exibe mensagem de execução
				if(isset($_SESSION['msg'])){
					echo $_SESSION['msg'];
					unset($_SESSION['msg']);
				}
			?>
			<div class="formulario mt-5 border border-dark rounded p-2">
				<form method="POST" action="php/proc_cad_usuario.php" id="form-cad">
					<div class="form-row">
						<div class="form-group col-md-12 mt-4">
							<div class="form-row">
								<div class="form-group col">
									<label for="inputName4">Nome</label>
									<input type="text" name="nome" class="form-control" id="clientName4" placeholder="Nome"  required>
								</div><!--Form Group-->
							</div><!--Form Row-->
							<div class="form-group">
								<label for="inputEmail4">E-mail</label>
								<input type="email" name="email" class="form-control" id="email" placeholder="E-mail" required>
							</div><!--Form Group-->
							<div class="form-group">
								<label for="inputTelephone4">Telefone</label>
								<input type="tel" name="tel" class="form-control" id="inputTelephone4" placeholder="Telefone" required>
							</div><!--Form Group-->
						</div> <!--Form Group-->
					</div><!--Form Row-->
					<div class="form-row flex justify-content-center">
						<input type="submit" value="Cadastrar cliente" class="btn btn-primary">
					</div><!--Form Row-->				
				</form><!--Form-->
			</div><!--Formulario-->
		</div><!--container-->
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
	</body>
</html>