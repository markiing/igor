<?php
	
	$parametro = null;
	if (defined('STDIN')) {
		$parametro = $argv[1];
	} else { 
		$parametro = $_GET['cpf'];
	}
	
	$conn = mysqli_connect("localhost:3306", "root", "", "bd_drivecar");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$cpf = mysqli_real_escape_string($conn, $parametro);
	$sql = mysqli_query($conn, "SELECT * FROM tb_aluno LEFT JOIN tb_endereco ON tb_aluno.endereco=tb_endereco.id WHERE cpf='".$cpf."'");
	
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
				'dt_nascimento' => $row['dt_nascimento']
			);
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}
	mysqli_close($conn);
?>