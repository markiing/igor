<?php

	$conn = mysqli_connect("localhost:3306", "root", "", "bd_ceuma");
	
	if(!$conn){
		die("Nao foi possivel se conectar ao banco!" . mysqli_error($conn));
	}
	$sql = mysqli_query($conn, "SELECT * FROM tb_produtos");
	if(mysqli_num_rows($sql)){
		$data = array();
		while($row = mysqli_fetch_array($sql)){
			$data[] = array(
				'id' => $row['id'],
				'descricao' => $row['descricao'],
				'quantidade' => $row['quantidade'],
				'data' => $row['data']
			);
		}
		header('Content-type: application/json');
		echo json_encode($data);
	}
	mysqli_close($conn);
?>