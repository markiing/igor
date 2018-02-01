<?php
	
	$dados = json_decode(file_get_contents("php://input"));

	$conn = mysqli_connect("localhost:3306", "root", "", "bd_drivecar");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$cpf = mysqli_real_escape_string($conn, $dados->cpf);
	$nome = mysqli_real_escape_string($conn, $dados->nome);
	$dt_nascimento = mysqli_real_escape_string($conn, $dados->dt_nascimento);
	
	$sql = mysqli_query($conn, "UPDATE tb_produtos SET nome='".$nome."', dt_nascimento='".$dt_nascimento."' WHERE cpf='".$cpf."'");
	
	mysqli_close($conn);
	
	echo $sql;
?>