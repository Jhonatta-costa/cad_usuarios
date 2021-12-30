<?php
	session_start();
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Lista de Usuários</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="header">
                <!-- Just an image -->
                <nav class="navbar navbar-dark text-white bg-dark justify-content-between">
                    <a class="navbar-brand">LOGO</a>
                    <form class="form">
						<a href="../index.php"><button type="button" class="btn btn-primary .ml-1">Cadastrar</button></a> 
						<a href="lista_usuarios.php"><button type="button" class='btn btn-primary ml-1'>Registros</button></a>	
                    </form>
                </nav>
       		</div>
			<div class="mt-5">
				<h1>Listar Usuário</h1>
			</div>
			<div class="formulario mt-5 border border-dark rounded p-2">
				<?php
					//Exibe mensagem de execução
					if(isset($_SESSION['msg'])){
						echo $_SESSION['msg'];
						unset($_SESSION['msg']);
					}
			
					//Receber o número da página
					$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
					$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
					
					//Setar a quantidade de itens por pagina
					$qnt_result_pg = 3;
					
					//calcular o inicio visualização
					$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
					
					$result_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
					$resultado_usuarios = mysqli_query($conn, $result_usuarios);

					//Exibição dos dados do usuário
					while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)) {				
						echo "ID: " . $row_usuario['id'] . "<br>";
						echo "Nome: " . $row_usuario['nome'] . "<br>";
						echo "E-mail: " . $row_usuario['email'] . "<br>";
						echo "Telefone: " . $row_usuario['tel'] . "<br>";
						echo "<a href='edit_usuario.php?id=". $row_usuario['id'] . "'>Editar<br></a>";
						echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><hr>";
					} 
			
					//Paginção - Somar a quantidade de usuários
					$result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
					$resultado_pg = mysqli_query($conn, $result_pg);
					$row_pg = mysqli_fetch_assoc($resultado_pg);
					
					//Quantidade de pagina 
					$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
				
					//Limitar os link antes depois
					$max_links = 2;
					
					echo "<a href='lista_usuarios.php?pagina=1'>Primeira</a> ";
				
					for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
						if($pag_ant >= 1){
							echo "<a href='lista_usuarios.php?pagina=$pag_ant'>$pag_ant</a> ";
						}
					}
					
					echo "$pagina ";
					
					for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
						if($pag_dep <= $quantidade_pg){
							echo "<a href='lista_usuarios.php?pagina=$pag_dep'>$pag_dep</a> ";
						}
					}
				
					echo "<a href='lista_usuarios.php?pagina=$quantidade_pg'>Ultima</a>";		
				?>	
        	</div>           
		</div>			
	</body>
</html>