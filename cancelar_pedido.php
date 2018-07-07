<?php 

	include("conexion.php");

	$pedido = $_POST["pedido"];
	$coleccion = $_POST["coleccion"];
	$resultado;

	if ($coleccion == "deportiva") {
		
		$sql = "DELETE FROM m_deportiva WHERE id='$pedido'";

		$resultado = mysqli_query($conexion,$sql);
	}else {
		$sql = "DELETE FROM m_casual WHERE id='$pedido'";

		$resultado = mysqli_query($conexion,$sql);
	}



 ?>