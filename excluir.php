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
	$sql = mysqli_query($conn, "DELETE FROM tb_aluno WHERE cpf='".$cpf."'");
	
	mysqli_close($conn);
	
	echo $parametro;
?>