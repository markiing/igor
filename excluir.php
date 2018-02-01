<?php
	
	$parametro = null;
	if (defined('STDIN')) {
		$parametro = $argv[1];
	} else { 
		$parametro = $_GET['id'];
	}
	
	$conn = mysqli_connect("localhost:3306", "root", "", "bd_ceuma");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	
	$id = mysqli_real_escape_string($conn, $parametro);
	$sql = mysqli_query($conn, "DELETE FROM tb_produtos WHERE id='".$id."'");
	
	mysqli_close($conn);
?>