<?php

	$conn = mysqli_connect("localhost:3306", "root", "", "bd_drivecar");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	$sql = mysqli_query($conn, "SELECT tb_aluno.cpf, tb_aluno.nome, tb_aluno.dt_nascimento, tb_endereco.rua, tb_endereco.bairro, tb_endereco.complemento, tb_endereco.numero, tb_nota.nota_pratica, tb_nota.nota_teorica " 
								. "FROM tb_aluno LEFT JOIN tb_endereco ON tb_aluno.endereco=tb_endereco.id LEFT JOIN tb_nota ON tb_aluno.cpf=tb_nota.cpf");
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
				'nota_teorica' => $row['nota_teorica'],
				'nota_pratica' => $row['nota_pratica']
			);
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}
	mysqli_close($conn);
?>