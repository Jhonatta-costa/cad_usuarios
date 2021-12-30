<?php
	//Inicia a sessão
	session_start();
	//Inclui a conexão do servidor
	include_once("conexao.php");
	//Reconhecimento de id do usuário e conexão 
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Edição de Usuário</title>		
	</head>
	<body>
		<a href="../index.php">Cadastrar</a><br>
		<a href="lista_usuarios.php">Listar</a><br>	
		<h1>Editar Usuário</h1>
		<?php
			//Exibe mensagem de execução
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<form method="POST" action="proc_edit_usuario.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>

			<label>Telefone: </label>
			<input type="tel" name="tel" placeholder="Digite o telefone" value="<?php echo $row_usuario['tel']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>