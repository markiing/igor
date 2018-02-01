<?php
	
	$dados = json_decode(file_get_contents("php://input"));

	$conn = mysqli_connect("localhost:3306", "root", "", "bd_drivecar");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$cpf = mysqli_real_escape_string($conn, $dados->cpf);
	$nota_teorica = mysqli_real_escape_string($conn, $dados->nota_teorica);
	$nota_pratica = mysqli_real_escape_string($conn, $dados->nota_pratica);
	
	$sql = mysqli_query($conn, "UPDATE tb_nota SET nota_teorica='".$nota_teorica."', nota_pratica='".$nota_pratica." WHERE cpf='".$cpf."'");
	
	mysqli_close($conn);
	
	echo $sql;
?>