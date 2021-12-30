<?php
	session_start();
	include_once("conexao.php");

	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	if(!empty($id)){
		//Processo de deletar usuário
		$result_usuario = "DELETE FROM usuarios WHERE id='$id'";
		$resultado_usuario = mysqli_query($conn, $result_usuario);

		//Exibição de mensagem de acordo com a execução
		if(mysqli_affected_rows($conn)){
			$_SESSION['msg'] = "<p style='color:green;'>Usuário apagado com sucesso</p>";
			header("Location: lista_usuarios.php");
		} else {			
			$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi apagado com sucesso</p>";
			header("Location: lista_usuarios.php");
		}

	} else {
		//Se id estiver vazio, exibe mensagem de erro	
		$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
		header("Location: lista_usuarios.php");
	}
?>