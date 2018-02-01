<?php
	
	$p_usuario = null;
	$p_senha = null;
	if (defined('STDIN')) {
		$p_usuario = $argv[1];
		$p_senha = $argv[2];
	} else { 
		$p_usuario = $_GET['usuario'];
		$p_senha = $_GET['senha'];
	}
	
	$conn = mysqli_connect("localhost:3306", "root", "", "bd_drivecar");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$usuario = mysqli_real_escape_string($conn, $p_usuario);
	$senha = mysqli_real_escape_string($conn, $p_senha);
	$sql = mysqli_query($conn, "SELECT * FROM tb_aluno LEFT JOIN tb_endereco ON tb_aluno.endereco=tb_endereco.id LEFT JOIN tb_nota ON tb_aluno.cpf=tb_nota.cpf WHERE usuario like '".$usuario."' and senha like '".$senha."'");
	
	if(mysqli_num_rows($sql)){
		$data = array();
		while($row = mysqli_fetch_array($sql)){
			$data[] = array(
				'nome' => $row['nome'],
				'cpf' => $row['cpf'],
				'rua' => $row['rua'],
				'bairro' => $row['bairro'],
				'complemento' => $row['complemento'],
				'numero' => $row['numero'],
				'dt_nascimento' => $row['dt_nascimento'],
				'nota' => $row['nota_teorica'],
				'nota' => $row['nota_pratica']
			);
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}
	mysqli_close($conn);
?>