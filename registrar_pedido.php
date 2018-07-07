<?php 
	
	include("conexion.php");

	//Declaración de variables
	$user_id;
	$prenda_id;
	$prenda_precio;
	$monto;
	$result;


	//Consulta a la BD para obtener el id del usuario
	$sql = "SELECT id from m_usuarios where usuario='$_POST[username]'";
	$resultado= mysqli_query($conexion,$sql);
	while ($row=mysqli_fetch_array($resultado)) {
		$user_id = $row['id'];	    
	}
	



	switch ($_POST['coleccion']) {
		case "deportiva":
			

				/************************************************/
				//Consulta a la BD oara obtener el id de la prenda solicitada
				$sql = "SELECT id,precio from m_deportiva where nombre='$_POST[prenda]'";
				$resultado= mysqli_query($conexion,$sql);
				while ($row=mysqli_fetch_array($resultado)) {
					$prenda_id = $row['id'];
					$prenda_precio = $row['precio'];	    
				}

				$monto = (int)$_POST['cantidad'] * (int)$prenda_precio;

				$sql="INSERT INTO m_pedidos_deportiva(user,prenda,talla,cant,monto,estado)
					  VALUES('$user_id','$prenda_id','$_POST[talla]','$_POST[cantidad]','$monto','Pendiente')";

				$result = mysqli_query($conexion,$sql);


			break;
		
		case "casual":

				/************************************************/
				//Consulta a la BD oara obtener el id de la prenda solicitada
				$sql = "SELECT id,precio from m_casual where nombre='$_POST[prenda]'";
				$resultado= mysqli_query($conexion,$sql);
				while ($row=mysqli_fetch_array($resultado)) {
					$prenda_id = $row['id'];
					$prenda_precio = $row['precio'];	    
				}

				$monto = (int)$_POST['cantidad'] * (int)$prenda_precio;

				$sql="INSERT INTO m_pedidos_casual(user,prenda,talla,cant,monto,estado)
					  VALUES('$user_id','$prenda_id','$_POST[talla]','$_POST[cantidad]','$monto','Pendiente')";

				$result = mysqli_query($conexion,$sql);
			break;
		default:
			// code...
			break;
	}


	$parametros = array("resultado"=>$result);
	echo json_encode($parametros);


 ?>