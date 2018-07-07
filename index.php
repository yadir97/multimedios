<!DOCTYPE html>
<html lang="es">
<head>
	<title>Tienda Online</title>
	<?php include("head.php") ?>
	<script type="text/javascript" src="js/scripts.js"></script>
</head>	
<body style="">
	<div id="contenedor" class="container-fluid" >
		<!--En este apartado se define los anuncios con respecto a los diferentes gustos de los usuarios-->
				<div id="anuncio_estudio" class="text-center" title="UTN TE ESPERA" style="position: relative;display: none;">
					<img style="width: 30%;margin-bottom: 2%;position: absolute;top:10%;left: 10%;" src="img/logo utn 2014.png" alt="">
					<img style="width:825px;height: 450px;border-radius: 5px;" src="img/estudiante.jpg" alt="">
					<a href="http://www.utn.ac.cr/" style="position: absolute;top: 55%;left: 12%;color: white;font-size: 2em;text-decoration: none;border:0px;font-family: sans-serif;font-weight: bold" target="_blank">¡VISITANOS!</a>
				</div>

				<div id="anuncio_futbol" class="text-center" title="VIVE EL MUNDIAL" style="position: relative;display: none;">
					<img style="width:825px;height: 450px;border-radius: 5px;" src="img/anuncio_futbol.jpg" alt="">
					<a href="https://www.fifa.com/worldcup/organisation/ticketing/index.html" style="position: absolute;top: 82%;left: 55%;color: white;font-size: 2em;text-decoration: none;border:0px;font-family: sans-serif;font-weight: bold" target="_blank">¡COMPRAR!</a>
				</div>
		<!---------------------------------------------------------------------------------------------------->		

				<div class="row header">
					<div class="col-sm-12 text-right" >
						<span id="username" style="color:black;font-family: sans-serif;font-weight: bold;display: none;"></span>
					</div>
					<div class="col-sm-3">
						<img class="logo" src="img/logo2.png" alt="">
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-7">
						<ul class="nav">
							<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
							<li class="nav-item"><a class="nav-link" href="#nosotros">Nosotros</a></li>
							<li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
						</ul>

					</div>

				</div>
				<div id="slider" class="row" style="">
					<div class="col-sm-12">
						<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel">
						  <div class="carousel-inner">
						    <div class="carousel-item active">
						      <img class="d-block w-100" src="img/5.jpg" alt="First slide">
						      <div id="slide-first-message" class="carousel-caption d-none d-md-block" style="position:absolute; top: 70%;left: 37%;width: 30%;height: 20%; background-color: #030303;opacity: .6;border-radius: 5px;display: none !important;">
							    <h3 class="text-uppercase" style="width: 100%;border-radius: 5px 5px 0px 0px;padding: 2%;font-size: 2em;font-weight: bold;">¡Descubrete!</h3>
							    <h6 style="width: 80%;height: 1px;margin-left: 10%;background-color: white;"></h6>
							    <p></p>
							  </div>
						    </div>

						    <div class="carousel-item">
						      <img class="d-block w-100" src="img/6.jpg" alt="Second slide">
						      <div id="slide-second-message" class="carousel-caption d-none d-md-block" style="position: absolute; top: 10%;left: 10%;width: 30%;height: auto; background-color: #030303;opacity: .6;border-radius: 5px;display: none !important;">
							    <p class="text-uppercase" style="width: 100%;border-radius: 5px 5px 0px 0px;padding: 2%;font-family: sans-serif;font-size: 2em;margin-bottom: 40%;">"The difference between style and fashion is in the quality"</p>
							    <span class="text-right" style="width: 100%;font-family:serif;font-size: 1.5em;margin-left: 37%;bottom: 0;">Giorgio Armani</span>
							    <h6 style="width: 80%;height: 1px;margin-left: 10%;background-color: white;"></h6>
							 
							  </div>
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

				<div class="row row-coleccion" style="padding-top: 3%;padding-bottom: 3%;background-color: #E5E6E6;">
					<div class="col-md-6 col-lg-6 ocultar" style="">
						<img class="img-coleccion" src="img/girl-1848949_1920.jpg" alt="">
					</div>
					<div class="col-sm-12 col-md-6 col-lg-6 text-center  card-coleccion" style="background-color: #E5E6E6;">

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

				<div class="row row-coleccion" style="padding-bottom:3%;background-color: #E5E6E6;">
					<div class="col-sm-12 col-md-6 col-lg-6 text-center  card-coleccion" style="background-color: #E5E6E6;">

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

						<img class="img-coleccion" src="img/sport-girl_963.jpeg" alt="">
					</div>
				</div>

				<div class="row row-prox justify-content-lg-around justify-content-md-around justify-content-sm-around
				justify-content-xs-around" style="padding-bottom: 3%;background-color: #F7F9F9;">
					<div class="col-sm-12 text-center">
						<h1 class="text-uppercase titulo-prox" style="background-color: #52BE80; padding-top:20px;">¡Proximamente!</h1>
					</div>

					<div class="col-xs-9 col-sm-8 col-md-3 col-lg-3 text-center card-prox-parent">
						<section class="card-prox">
							<img class="img-prox" src="img/vw-camper-336606_1920.jpg" alt="">
							<h4 class="text-uppercase ">Verano</h4>
							<p class="info-prox ui-widget-content">Se aproxima el elemento especial para sol y palya, nuestros bikinis ya son realidad</p>
							<button id="ver-mas-prox" class="btn btn-danger" onclick="info_prox(0, this);">Ver mas</button>
						</section>

					</div>
					<div class="col-xs-9 col-sm-8 col-md-3 col-lg-3 text-center card-prox-parent">
						<section class="card-prox">
							<img class="img-prox" src="img/monsoon-3443345_1920.jpg" alt="">
							<h4 class="text-uppercase ">Invierno</h4>
							<p class="info-prox ui-widget-content">Despreocupate al salir de casa, las lluvia no seran problema, botas, sombrillas, abrigos... </p>
							<button id="ver-mas-prox" class="btn btn-danger" onclick="info_prox(1,this);">Ver mas</button>
						</section>

					</div>
					<div class="col-xs-9 col-sm-8 col-md-3 col-lg-3 text-center card-prox-parent">
						<section class="card-prox">
							<img class="img-circle img-prox" src="img/skateboard-331751_1920.jpg" alt="">
							<h4 class="text-uppercase">Skate</h4>
							<p class="info-prox ui-widget-content">No nos olvidamos de los hombres, mood skate...</p>
							<button id="ver-mas-prox" class="btn btn-danger" onclick="info_prox(2,this);">Ver mas</button>
						</section>

					</div>

				</div>


				<div id="row_nosotros" class="row justify-content-sm-between" style="background-color: #E4D9D9;padding-top:5%;padding-left: 5%;padding-right: 5%;height: 125.5vh;">
					<div class="col-sm-12">
						<h2 id="nosotros" class="text-center text-uppercase" style="position: relative;margin: 0% 5%;border-radius: 5px 5px 0px 0px;background-color: black;color: white;font-family: sans-serif;font-size: 2em;padding:3%;margin-bottom: 0px;box-shadow: 0px 3px 6px #5C5A5A;z-index: 10;">¿Quienes Somos? <div style="margin:1%;width: 100%;height: 1px;background-color: white"></div>	</h2>

						<p class="text-justify" style="font-family: sans-serif;padding: 3%;font-size: 1em;background-color: white;border-radius: 0px 0px 5px 5px;border: .5px solid #FCFCFC;margin:0px 5% 5% 5%;box-shadow: 2px 2px 3px #DBDBDB;z-index: -1;"> Somos una empresa joven, nacida con una clara vocación innovadora, buscando dar nuevas aplicaciones a tecnologías existentes y creando nuevas soluciones con el objetivo de dar una respuesta integral y eficaz a nuestros clientes.  La flexibilidad y capacidad de adaptación a las nuevas tecnologías es uno de nuestros principios básicos, pretendemos acercar las numerosas tecnologías que surgen en el ámbito de las comunicaciones e información a las empresas.</p>
					</div>

					<div id="mision" class="col-sm-5" style="padding-left: 0% !important;display: none;">
						<h3 class="text-right" style="position: relative;background-color: black; padding:5%;border-radius: 0px 5px 0px 0px;color: white;font-family: sans-serif;margin-bottom: 0px;box-shadow: 0px 3px 6px #5C5A5A;z-index: 1;">Misión</h3>
						<p class="text-justify" style="font-family: sans-serif;padding:5%;font-size: 1em;background-color: white;border-radius: 0px 0px 5px 5px;border: .5px solid #FCFCFC;margin-bottom: :5%;box-shadow: 2px 2px 3px #DBDBDB;z-index: -1">Proporcionar las tecnologías más innovadoras a medida de las necesidades empresariales, con el objetivo de incrementar su competitividad y productividad. Para ello implementamos soluciones prácticas adaptadas a sus necesidades y desarrollamos nuevas soluciones creativas. Nuestra base parte del aprovechamiento de las nuevas redes. </p>
					</div>

					<div id="vision" class="col-sm-5" style="padding-right: 0% !important;display: none;">
						<h3 class="text-left" style="position: relative;background-color: black; padding:5%;border-radius: 5px 0px 0px 0px;color: white;font-family: sans-serif;margin-bottom: 0px;box-shadow: 0px 3px 6px #5C5A5A;z-index: 10;">Visión</h3>
						<p class="text-justify" style="font-family: sans-serif;padding:5%;font-size: 1em;background-color: white;border-radius: 0px 0px 5px 5px;border: .5px solid #FCFCFC;margin-bottom: :5%;box-shadow: 2px 2px 3px #DBDBDB;z-index: -1">Queremos estar comprometidos con los problemas de nuestros clientes de forma transparente y eficaz para convertirnos en su socio de confianza. En nuestra visión queremos ser una empresa de referencia, que camina con el cambio de la tecnología y la sociedad, dando a conocer las posibilidades de los estándares y tecnologías libres. Esta labor se debe desempeñar de forma ética y satisfactoria para nosotros, nuestros clientes y el resto de la sociedad. </p>
					</div>

				</div>


				<div class="row justify-content-sm-between" style="padding:5% 2% 2% 2%;">
					<div class="col-sm-5 text-center" style="padding:1%;">
						<h4 id="contacto" style="font-family: sans-serif;font-size: 2em;">Contantenos</h4>
						<hr>
						<div class="row" style="margin-bottom: 1%;background-color: #F2F1F1;">
							<div class="col-sm-3" style="background-color: #E1E1E1;padding:1% !important;"><img src="img/icons/if_BT_phone_905557.svg" alt="" style="width: 50%;"></div>
							<div class="col-sm-7 align-self-center"><span>+(506)2447-01-11</span></div>
						</div>
						<div class="row"  style="margin-bottom: 1%;background-color: #F2F1F1;">
							<div class="col-sm-3" style="background-color: #E1E1E1;padding:1% !important;"><img src="img/icons/if_5303_-_Gmail_1314180.svg" alt="" style="width: 50%;"></div>
							<div class="col-sm-7 align-self-center"><span>yendris_boutique@gmail.com</span></div>
						</div>
					</div>

					<div class="col-sm-6" style="padding:1%;">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d491.0176358691876!2d-84.47106165855823!3d10.087523798115056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa044fb206f3ed5%3A0xe34c8d5fa0d6a605!2zMTDCsDA1JzE1LjYiTiA4NMKwMjgnMTUuNSJX!5e0!3m2!1ses-419!2scr!4v1530834918477" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
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
