<!DOCTYPE html>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="js/additional-methods.min.js"></script>
	<script type="text/javascript" src="plugins/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/login_.js"></script>
</head>

<body style="background-color:#7F7D7D;">		
	
		
		<div id="respuesta" class="content-respuesta text-center">
			<h4></h4>
		</div>
	


	<div class="container-fluid" style="padding-top:10%!important;">
				
				<a href="index.php" title=""><img src="img/logo2.png" alt="" style="width: 10%;position: absolute;top: 5%;left: 5%;"></a>
		

		<div class="row justify-content-around" style="height: auto">
			<div class="col-sm-6 content-login text-center" >

				<form id="form-registro" class="formulario-registro"  accept-charset="utf-8">
					<div style="position: absolute;top: 0;left: 0;width: 100%;height: 9%;border-radius: 5px 5px 0px 0px;background-color:#E0DBDB;"></div>
					<img id="back-inicio" style="position: absolute;top:2%;left:2%;width: 5%" src="img/flecha_atras.svg" alt="">
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Nombre </label></div>
							<div class="col-sm-8"><input class="" style="width:90%;" type="text" name="nombre" autocomplete="give-name"></div>
							
						</div>
					</fieldset>
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Apellidos </label></div>
							<div class="col-sm-4"><input class="" style="width:80%;" type="text" name="app_paterno" autocomplete="family-name"></div>
							<div class="col-sm-4"><input class="" style="width:80%;" type="text" name="app_materno" autocomplete="family-name"></div>
							
						</div>
					</fieldset>
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Email</label></div>
							<div class="col-sm-8"><input class="" style="width:90%;" type="email" name="email" autocomplete="email"></div>
							
						</div>
					</fieldset>
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Usuario</label></div>
							<div class="col-sm-8"><input class="" style="width:90%;" type="text" name="usuario" autocomplete="username"></div>
							
						</div>
					</fieldset>
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Contraseña</label></div>
							<div class="col-sm-8" style="position: relative"><input id="contrasena" class="" style="width:90%;" type="password" name="contrasena" autocomplete="new-password">
								<span id="reglas-contrasena" style="">
									<h6>La contraseña debe contener:</h6>
									<ul>
										<li>Al menos una minúscula.</li>
										<li>Al menos una mayúscula.</li>
										<li>Al menos un dígito.</li>
										<li>Al menos un símbolo no alfanumérico.</li>
									</ul>
								</span>
							</div>
							
						</div>
					</fieldset>
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Confirmar contraseña</label></div>
							<div class="col-sm-8"><input class="" style="width:90%;" type="password" name="conf_contrasena" autocomplete="conf_password"></div>
							
						</div>
					</fieldset>
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Gustos</label></div>
							<div class="col-sm-8"><select style="width: 90%;" name="gusto" >
								<option value="estudiar">Estudiar</option>
								<option value="futbol">Futbol</option>
								<option value="pintar">Pintar</option>
							</select></div>
							
						</div>
					</fieldset>
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4 offset-sm-8">
								<input id="btn-registrar" class="btn btn-primary" type="submit" name="btn-registrar" value="Registrar">
							</div>
							
								
						</div>
					</fieldset>
				</form>





				<form id="form-inicio" class="formulario-ingreso" accept-charset="utf-8">
					<fieldset>
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Usuario </label></div>
							<div class="col-sm-8"><input class="" style="width:90%;" type="text" name="usuario" value="" placeholder=""></div>
							
						</div>
					</fieldset>

					<fieldset style="padding-bottom:5%;">
						<div class="row form-group">
							<div class="col-sm-4"><label class="login-label text-right" style="">Contraseña </label></div>
							<div class="col-sm-8"><input class="" style="width:90%;" type="password" name="password" autocomplete="conf_contrasena"></div>
						</div>
						<div class="row align-items-sm-end">
							<div class="col-sm-4 offset-sm-8"><input id="btn-ingresar" type="submit" name="btn-ingresar" class="btn btn-success" value="Ingresar"></div>
						</div>
					</fieldset>
					<a id="registrar-usuario" href="#" title="">Registrese aquí</a>
				</form>


				

			</div>
			<div class="col-sm-4 content-login-photo text-center">
				<img src="img/user_icon.svg" alt="">
			</div>
		</div>
	</div>
</body>
</html>