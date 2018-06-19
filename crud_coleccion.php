<!DOCTYPE html>
<html lang="es">
<head>
	<title>Manejador Colecciones</title>
	<?php include("head.php") ?>
<body>
	<div>
		<div class="row header" style="margin-bottom: 3%;">
					<div class="col-sm-11 offset-sm-1 text-right" >
						<span id="username" style="color:black;font-family: sans-serif;font-weight: bold;"></span>
					</div>
					<div class="col-sm-3">
						<img class="logo" src="img/logo2.png" alt="">
					</div>
					<div class="col-sm-6 offset-sm-3">
						<ul class="nav">
							<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
							<li class="nav-item"><a class="nav-link" href="">Nosotros</a></li>
							<li class="nav-item"><a class="nav-link" href="">Contacto</a></li>
						</ul>

					</div>

		</div>

		<div class="row crud-contenedor justify-content-sm-between">
			<div class="col-sm-7">
				<form action="crud_coleccion_submit" method="get" accept-charset="utf-8">
					<fieldset class="text-center">
						<legend>Adminitrador de Colecciones</legend>
						<br><hr>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="nombre">Nombre</label> <input class="" type="text" name="nombre" value="" placeholder="Nombre de la prenda">
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="coleccion">Colección </label><select name="coleccion" >
								<option value="deportiva">Deportiva</option>
								<option value="casual">Casual</option>
							</select>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="tipo">Tipo </label><select name="tipo" >
								<option value="licra">Licra</option>
								<option value="gorra">Gorra</option>
								<option value="tops">Tops</option>
								<option value="medias">Medias</option>
							</select>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group">
							<label for="precio">Precio</label> <input class="" type="text" name="precio" value="" placeholder="">
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group" style="border:1px solid #D6D1D1;padding: 20px;border-radius: 5px; box-shadow: 1px 1px 2px #C2C1C1;">
							<h5 class="text-center ">Detalle de Tallas</h5>
							<div class="row justify-content-sm-around">
								<label class="col-sm-3 text-center" for="">S</label>
								<label class="col-sm-3 text-center" for="">M</label>
								<label class="col-sm-3 text-center" for="">L</label>
								<label class="col-sm-3 text-center" for="">XL</label>

								<input class="col-sm-2 text-center" type="number"min="1" max="10" step="2" name="s"value="0" >
								<input class="col-sm-2 text-center" type="number"min="1" max="10" step="2" name="m"value="0" >
								<input class="col-sm-2 text-center" type="number"min="1" max="10" step="2" name="l"value="0" >
								<input class="col-sm-2 text-center" type="number"min="1" max="10" step="2" name="xl"value="0" >

							</div>
						</div>
					</fieldset>
				</form>
				
				<ul class="text-center">
					<li><button type="" class="btn btn-success">Registar</button></li>
					<li><button type="" class="btn btn-primary">Consultar</button></li>
					<li><button type="" class="btn btn-primary">Modificar</button></li>
					<li><button type="" class="btn btn-danger">Eliminar</button></li>
				</ul>
			</div>
			<div class="col-sm-4">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>




	</div><!--Fin del contenedor principal-->
</body>
</html>