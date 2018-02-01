<?php
	
	$dados = json_decode(file_get_contents("php://input"));

	$conn = mysqli_connect("localhost:3306", "root", "", "bd_ceuma");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$id = mysqli_real_escape_string($conn, $dados->id);
	$descricao = mysqli_real_escape_string($conn, $dados->descricao);
	$quantidade = mysqli_real_escape_string($conn, $dados->quantidade);
	$data = mysqli_real_escape_string($conn, $dados->data);
	
	$sql = mysqli_query($conn, "UPDATE tb_produtos SET descricao='".$descricao."', quantidade='".$quantidade."', data='".$data."' WHERE id='".$id."'");
	
	mysqli_close($conn);
	
	echo $sql;
?>