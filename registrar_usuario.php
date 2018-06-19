<?php 
	
	include("conexion.php");


	//Asignación de los valores del formulario a las distintas variables
	
	

	$nombre = $_POST['nombre'];
	$app_paterno=$_POST['app_paterno'];
	$app_materno=$_POST['app_materno'];
	$usuario=$_POST['usuario'];
	$contrasena=$_POST['contrasena'];
	$gusto=$_POST['gusto'];
	$email=$_POST['email'];

	//Creación de la sentencia de insersión sql
	$query = "insert into m_usuarios (nombre,app_paterno,app_materno,usuario,contrasena,gusto,email,tipo)
			values('$nombre','$app_paterno','$app_materno','$usuario','$contrasena','$gusto','$email','user')";

	
	//A la hora de hacer una impresión de una sentencia sql, el "echo" va a devolver un boolean en forma de número binario
	//la cual va ser respuesta a la sentencia "ajax" y por ende lo que le da sentido al método "success".		
	 echo mysqli_query($conexion,$query);
	
	


 ?>