<?php 


	$conexion = mysqli_connect("127.0.0.1","root","","multimedios");

		if(!$conexion){
			echo 'Error: No se pudo conectar a MySql. ' . PHP_EOL;
			echo 'error de depuración:' . mysqli_connect_error() . PHP_EOL;
			echo 'error de depuración:' . mysqli_connect_error() . PHP_EOL;
			exit;
		}


 ?>