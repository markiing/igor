<?php
	
	$dados = json_decode(file_get_contents("php://input"));
	
	$conn = mysqli_connect("localhost:3306", "root", "", "bd_drivecar");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$nome = mysqli_real_escape_string($conn, $dados->nome);
	$cpf = mysqli_real_escape_string($conn, $dados->cpf);
	$dt_nascimento = mysqli_real_escape_string($conn, $dados->dt_nascimento);
	$usuario = mysqli_real_escape_string($conn, $dados->usuario);
	$senha = mysqli_real_escape_string($conn, $dados->senha);
		
	$rua = mysqli_real_escape_string($conn, $dados->rua);
	$bairro = mysqli_real_escape_string($conn, $dados->bairro);
	$complemento = mysqli_real_escape_string($conn, $dados->complemento);
	$numero = mysqli_real_escape_string($conn, $dados->numero);
	
	$sql_endereco = mysqli_query($conn, "INSERT INTO tb_endereco(rua, bairro, complemento, numero) VALUES('".$rua."','".$bairro."','".$complemento."','".$numero."')");
	
	$id_endereco = mysqli_insert_id($conn);
	
	echo $id_endereco;
	
	mysqli_close($conn);
	
	// arranjo tecnico - mudar para multiple queries	
	
	$conn = mysqli_connect("localhost:3306", "root", "", "bd_drivecar");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$sql_aluno = mysqli_query($conn, "INSERT INTO tb_aluno(cpf, nome, endereco, dt_nascimento, usuario, senha) VALUES('".$cpf."','".$nome."','".$id_endereco."','".
										$dt_nascimento."','".$usuario."','".$senha."')");
	
	mysqli_close($conn);

?>