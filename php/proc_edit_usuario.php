<?php
	session_start();
	include_once("conexao.php");

	//Dados recebidos do banco de dados
	$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_FLOAT);

	//Atualização dos dados no banco de dados
	$result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', tel='$tel', modified=NOW() WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	//Mensagem de acordo com a execução
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
		header("Location: lista_usuarios.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
		header("Location: editar.php?id=$id");
	}
?>
