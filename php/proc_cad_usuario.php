<?php
	session_start();
	include_once("conexao.php");

	//Dados a enviar para o banco de dados
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_FLOAT);

	//Inserção de dados de acordo com as colunas do banco de dados
	$result_usuario = "INSERT INTO usuarios (nome, email, tel, created) VALUES ('$nome', '$email', '$tel', NOW())";
	$resultado_usuario = mysqli_query($conn, $result_usuario);

	if(mysqli_insert_id($conn)) {
		$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
		header("Location: lista_usuarios.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
		header("Location: index.php");
	}

?>