<?php 

	include("conexion.php");
	//Obtención de datos desde el ajax
		$accion = $_POST['accion'];
		$nombre = $_POST['nombre'];
		$coleccion = $_POST['coleccion'];
	//
		$resultado;//Esta variable nos da el resultado de la sentencia sql(true or false)
	//	
		$tmp="";//ruta temporal de la imagen seleccionada
		$name_img="";//nombre de la imagen seleccionada
		$img_extension="";//extención de la imagen seleccionada
		$parametros;
		$array_result;
	//Definición del directorio para las imagenes
		$directorio = "img/uploads/";
	//Tratamiento de imagen 
		if($accion=="registrar"){
			
			
			$tipo = $_POST['tipo'];
			$precio = $_POST['precio'];
			

			$tmp= $_FILES['imagen']['tmp_name'];
			$name_img = $_FILES['imagen']['name'];
			$img_extension=$directorio . $name_img;

			move_uploaded_file($tmp,$directorio.$name_img);
			
		}


	//Selección de la acción a ejecutar 
		switch ($accion) {
			case "registrar":
					if ($coleccion=="deportiva") {
						$sql = "INSERT INTO m_deportiva(tipo,nombre,precio,extension_img,cant_s,cant_m,cant_l,cant_xl)
						VALUES('$tipo','$nombre','$precio','$img_extension','$_POST[s]','$_POST[m]','$_POST[l]','$_POST[xl]')";

						$resultado = mysqli_query($conexion,$sql);

					}else {
						$sql = "INSERT INTO m_casual(tipo,nombre,precio,extension_img,cant_s,cant_m,cant_l,cant_xl)
						VALUES('$tipo','$nombre','$precio','$img_extension','$_POST[s]','$_POST[m]','$_POST[l]','$_POST[xl]')";

						$resultado = mysqli_query($conexion,$sql);
					}
					
				break;
			case "consultar":

					if ($coleccion=="deportiva") {
						$sql = "SELECT * FROM m_deportiva WHERE nombre='$nombre'";
						$sql_result = mysqli_query($conexion,$sql);

						if ((mysqli_num_rows($sql_result)>0) && (mysqli_num_rows($sql_result)<2)) {
							$resultado=true;
							while ($row = mysqli_fetch_array($sql_result)) {
						

							    $array_result = array("tipo" => $row['tipo'],"precio" => $row['precio'],"cant_s" => $row['cant_s'],"cant_m" => $row['cant_m'],
								"cant_l" => $row['cant_l'],"cant_xl" => $row['cant_xl'],"extension" => $row['extension_img']);
							}
						}else{
							$resultado=false;
						}

					}else {
						$sql = "SELECT * FROM m_casual WHERE nombre='$nombre'";
						$sql_result = mysqli_query($conexion,$sql);

						if ((mysqli_num_rows($sql_result)>0) && (mysqli_num_rows($sql_result)<2)) {
							$resultado=true;
							while ($row = mysqli_fetch_array($sql_result)) {
						

							    $array_result = array("tipo" => $row['tipo'],"precio" => $row['precio'],"cant_s" => $row['cant_s'],"cant_m" => $row['cant_m'],
								"cant_l" => $row['cant_l'],"cant_xl" => $row['cant_xl'],"extension" => $row['extension_img']);
							}

						}else{
							$resultado=false;
						}						
					}

				break;
			case "modificar":
					
					if ($coleccion=="deportiva") {

						if(($_FILES['imagen']['name'] != null) || ($_FILES['imagen']['name'] !="") ){
							$tmp= $_FILES['imagen']['tmp_name'];
							$name_img = $_FILES['imagen']['name'];
							$img_extension=$directorio . $name_img;

							//unlink($_POST['img_actual']);;
							move_uploaded_file($tmp,$directorio.$name_img);
							

							$sql = "UPDATE m_deportiva
								SET precio='$_POST[precio]',
									cant_s='$_POST[s]',
									cant_m='$_POST[m]',
									cant_l='$_POST[l]',
									cant_xl='$_POST[xl]',
									extension_img='$img_extension'
								WHERE nombre='$nombre'";

							$resultado = mysqli_query($conexion,$sql);

						}else{

							$sql = "UPDATE m_deportiva
								SET precio='$_POST[precio]',
									cant_s='$_POST[s]',
									cant_m='$_POST[m]',
									cant_l='$_POST[l]',
									cant_xl='$_POST[xl]'
								WHERE nombre='$nombre'";

							$resultado = mysqli_query($conexion,$sql);
						}
						

					}else {
						if(($_FILES['imagen']['name'] != null) && ($_FILES['imagen']['name'] !="") ){
							$tmp= $_FILES['imagen']['tmp_name'];
							$name_img = $_FILES['imagen']['name'];
							$img_extension=$directorio . $name_img;

							//unlink($_POST['img_actual']);
							move_uploaded_file($tmp,$directorio.$name_img);
							

							$sql = "UPDATE m_casual
								SET precio='$_POST[precio]',
									cant_s='$_POST[s]',
									cant_m='$_POST[m]',
									cant_l='$_POST[l]',
									cant_xl='$_POST[xl]',
									extension_img='$img_extension'
								WHERE nombre='$nombre'";

							$resultado = mysqli_query($conexion,$sql);
						}else{


							$sql = "UPDATE m_casual
								SET precio='$_POST[precio]',
									cant_s='$_POST[s]',
									cant_m='$_POST[m]',
									cant_l='$_POST[l]',
									cant_xl='$_POST[xl]'
								WHERE nombre='$nombre'";

							$resultado = mysqli_query($conexion,$sql);
						}
					}
				break;
			case "eliminar":

					sleep(2);
					if($coleccion=="deportiva"){
						$sql="DELETE FROM m_deportiva WHERE nombre='$nombre'";

						$resultado= mysqli_query($conexion,$sql);
					}else{
						$sql="DELETE FROM m_casual WHERE nombre='$nombre'";

						$resultado= mysqli_query($conexion,$sql);
					}
					
				break;		
			default:
				// code...
				break;
		}


	
	//Array que contiene todos los datos que se ocupan en el front-end
	if ($accion=="registrar") {
		$parametros = array("accion"=>$accion,"resultado"=>$resultado);
	}
	if ($accion=="consultar") {
		if ($resultado == true) {
			$parametros = array("accion"=>$accion,"resultado"=>$resultado,"prenda"=>$array_result,"coleccion_consulta"=>$coleccion);
		}else{
			$parametros = array("accion"=>$accion,"resultado"=>$resultado);
		}
		
	}
	if ($accion=="modificar") {
			$parametros = array("accion"=>$accion,"resultado"=>$resultado);
	}
	if ($accion=="eliminar") {
			$parametros = array("accion"=>$accion,"resultado"=>$resultado,"nombre"=>$nombre);
	}
	

	//Se envia el array en formato json para que sea recibido por el ajax
	echo json_encode($parametros);
 ?>