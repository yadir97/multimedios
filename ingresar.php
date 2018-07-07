<?php 

	include("conexion.php");

	//Obteción de los datos del formulario
	$user="";
	$tipo="";
	$estatus="";
	$encontrado=false;
	$gusto="";
	//
	$user=$_POST["usuario"];
	$password=$_POST["password"];


	$resultado=mysqli_query($conexion, "SELECT usuario,contrasena,tipo,gusto FROM m_usuarios WHERE usuario='$user' and contrasena='$password'");
		

		if (mysqli_num_rows($resultado)>0) {
			
			while ($row = mysqli_fetch_array($resultado)) {
				$tipo = $row[2];
				$user = $row[0];
				$gusto = $row[3];   
			}

			$estatus = "Usuario encontrado";
			$encontrado=true;

		}else{
			$estatus = "Usuario no encontrado";
		}

	$parametros = array("tipo"=>$tipo,"estatus"=>$estatus,"encontrado"=>$encontrado,"user"=>$user,"gusto"=>$gusto);

	echo json_encode($parametros);

 ?>