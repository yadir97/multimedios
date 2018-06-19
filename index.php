<!DOCTYPE html>
<html lang="es">
<head>
	<title>Tienda Online</title>
	<?php include("head.php") ?>

<body style="">
	<div class="container-fluid" >


				<div class="row header">
					<div class="col-sm-11 offset-sm-1 text-right" >
						<span id="username" style="color:black;font-family: sans-serif;font-weight: bold;display: none;"></span>
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
				<div id="slider" class="row" style="margin-bottom: 3%;">
					<div class="col-sm-12">
						<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="img/5.jpg" alt="First slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="img/6.jpg" alt="Second slide">
						    </div>
						    <div class="carousel-item">
						      <img class="d-block w-100" src="img/guitar-1139397_1920.jpg" alt="Third slide">
						    </div>
						  </div>

							   <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
							    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
							    <span class="sr-only">Previous</span>
							  </a>
							  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
							    <span class="carousel-control-next-icon" aria-hidden="true"></span>
							    <span class="sr-only">Next</span>
							  </a>
						</div>
					</div>
				</div>

				<div class="row row-coleccion" style="margin-bottom: 3%;">
					<div class="col-md-6 col-lg-6 ocultar" style="">
						<img class="img-coleccion" src="img/girl-1848949_1920.jpg" alt="">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 text-center  card-coleccion" style="background-color: #F7F9F9;">

						<section style="background-color: #F7F9F9; ">
							<h2 class="text-uppercase">Colección ropa <br> casual</h2>
							<hr>
						    <p class="text-center" style="font-size: 1em;">
						    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						    <a class="btn btn-danger" href="">Ver Colección</a>
						</section>
					</div>
				</div>

				<div class="row row-coleccion" style="margin-bottom: 3%;">
					<div class="col-sm-12 col-md-6 col-lg-6 text-center  card-coleccion" style="background-color: #F7F9F9;">

						<section style="background-color: #F7F9F9;">
							<h2 class="text-uppercase">Colección ropa <br> deportiva</h2>
							<hr>
						    <p class="text-center" style="font-size: 1em;">
						    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim vnia,
						    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

						    <a class="btn btn-danger" href="">Ver Colección</a>
						</section>
					</div>
					<div class="col-md-6 col-lg-6 ocultar">

						<img class="img-coleccion" src="img/girl-1848949_1920.jpg" alt="">
					</div>
				</div>

				<div class="row row-prox justify-content-lg-around justify-content-md-around justify-content-sm-around
				justify-content-xs-around" style="padding-bottom: 3%;background-color: #F7F9F9;">
					<div class="col-sm-12 text-center">
						<h1 class="text-uppercase titulo-prox" style="background-color: #52BE80; padding-top:20px;">¡Proximamente!</h1>
					</div>

					<div class="col-xs-9 col-sm-9 col-md-3 col-lg-3 text-center card-prox-parent">
						<section class="card-prox">
							<img class="img-prox" src="img/vw-camper-336606_1920.jpg" alt="">
							<h4 class="text-uppercase ">Verano</h4>
							<p class="info-prox ui-widget-content">Esto es una belleza si funca, y Yadir le da a Melber</p>
							<button id="ver-mas-prox" class="btn btn-danger" onclick="info_prox(0, this);">Ver mas</button>
						</section>

					</div>
					<div class="col-xs-9 col-sm-9 col-md-3 col-lg-3 text-center card-prox-parent">
						<section class="card-prox">
							<img class="img-prox" src="img/monsoon-3443345_1920.jpg" alt="">
							<h4 class="text-uppercase ">Invierno</h4>
							<p class="info-prox ui-widget-content">No hay element.style, Paleto </p>
							<button id="ver-mas-prox" class="btn btn-danger" onclick="info_prox(1,this);">Ver mas</button>
						</section>

					</div>
					<div class="col-xs-9 col-sm-9 col-md-3 col-lg-3 text-center card-prox-parent">
						<section class="card-prox">
							<img class="img-circle img-prox" src="img/skateboard-331751_1920.jpg" alt="">
							<h4 class="text-uppercase">Skate</h4>
							<p class="info-prox ui-widget-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. </p>
							<button id="ver-mas-prox" class="btn btn-danger" onclick="info_prox(2,this);">Ver mas</button>
						</section>

					</div>

				</div>



				<div class="row footer">
					<div class="col-sm-12 text-center">
						<p style="color:white;">©2018 Yendri's Boutique Todos los derechos reservados. Prohibida su reproducción total o parcial.</p>
					</div>
					<div class="col-sm-3 offset-sm-9">
						<ul class="redes-Sociales">
							<li><a href=""> <img class="redes-img" src="img/facebook.png" alt=""> </a></li>
							<li><a href=""> <img class="redes-img" src="img/instagram.png" alt=""> </a></li>
							<li><a href=""> <img class="redes-img" src="img/twitter.png" alt=""> </a></li>
						</ul>
					</div>
				</div>

	</div>


</body>
</html>
