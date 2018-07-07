<!DOCTYPE html>
<html>
<head>
	<title>Colección Deportiva</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="plugins/jquery.cookie.js"></script>
	<script type="text/javascript">

		 

		  function set_logOut(log,tipo){
			  if(log=="true"){
			      $("#username").after("<a id='log_out' href='#' style='color:black;'>(Cerrar sesión)</a>")
			      if (tipo=="admin") {
			        $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='admin_armario' class='nav-link' href='crud_coleccion.php'>Armario</a></li>");
			      }else {
			        $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='user_deportiva' class='nav-link' href='col_deportiva.php'>Deportiva</a></li>");
			         $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='user_casual' class='nav-link' href='col_casual.php'>Casual</a></li>");
			        $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='user_car-shop' class='nav-link' href='car_list.php'>Mi Carrito</a></li>");
			      }
			  }else{
			    $("#log_out").remove();
			    $("#admin_armario").remove();
			    $("#user_deportiva").remove();
			    $(".header>div:nth-child(3)>ul").append("<li class='nav-item'><a class='nav-link' href='login.php'>Iniciar Sesión</a></li>");
			    
			  }	
		  }

		  function set_username(){
			  if($.cookie("username")==undefined) {
			      $("#username").css("display","none"); 
			   }else{
			      $("#username").css("display","inline");
			      $("#username").html($.cookie("username"));
			   }
		  }

		  function registrar_pedido () {


		   		$("span[name='registrar_pedido']").click(function(){
		   			debugger;
		   			var prenda=$(this).parent().find('h4').html();
		   			var talla=$(this).parent().find("select[name='talla']").val();
		   			var cant=$(this).parent().find("input[name='cantidad']").val();

		   			
				   		$.ajax({
				   			url: 'registrar_pedido.php',
				   			type: 'post',
				   			dataType: 'json',
				   			data: {'username': $.cookie("username"),"prenda":prenda,"talla":talla,"cantidad":cant,"coleccion":"deportiva"},
				   			success: function(response){
				   				debugger;
				   				if(response.resultado){
				   					alert("Pedido registrado");
				   					location.href= "car_list.php";
				   				}
				   			}
				   		})
				   		.done(function() {
				   			console.log("success");
				   		})
				   		.fail(function() {
				   			console.log("error");
				   		})
				   		.always(function() {
				   			console.log("complete");
				   		});
		   		});
		   		
		    }  
		  

		  $(document).ready(function(){
		  	var elemt_img;
		  	var img_src_original="";//Esta variable mantiene la imagen original que se deseo maximizar en primer instancia


		  	set_username();
		  	set_logOut($.cookie("log"),$.cookie("tipo")); 
		  	registrar_pedido();

		  	$("#log_out").click(function(){
			    $.removeCookie('username');
			    $.cookie('log',false);
			    location.href='index.php'; 
			});

		  	$("#coleccion-tabs").tabs();

		  	$(".opciones-dialog>li>img").click(function(){
		  		var src = $(this).attr('src');
		  		
		  		
		  		$(".opciones-dialog>li").css('border','1px solid #BDBBBB');
		  		$(this).parent().css('border', '2px solid #EC4347');
		  		$(".img-col-deportiva-max>div>img").attr('src',src);

		  	});

		  	$("#licras>div>div>img").click(function(){
		  		
		  		var nombre = $(this).parent();
		  		var titulo = $(nombre).find('h4').text();

		  		elemt_img=$("div[name='"+titulo+"']>div>img");
		  		img_src_original=$(this).attr('src');
		  		

		  		$("div[name='"+titulo+"']").dialog({
		  			title: titulo
			  	});

			  	
			  	$("div[name='"+titulo+"']").dialog("open");
		  	});

		  	$(".img-col-deportiva-max").dialog({
		  		width: 900,
		  		height:600,
		  		autoOpen:false,
		  		draggable:false,
		  		resizable:false,
		  		modal:true,
		  		open:function(){
		  			$("#contenedor").css({'opacity': '.3','filter':'blur(10px)'});
			  		$("#contenedor").attr('disabled','disabled');
			  		$("body").css({'overflow':'hidden','height':'100%'});

			  		$(elemt_img).attr('src',img_src_original);
		  			elemt_img=null;
		  			img_src_original="";

		  		},
		  		close: function(){
		  			$("#contenedor").css('opacity','1');
		  			$("#contenedor").css('filter','blur(0px)');
		  			$("body").css({'overflow':'auto','height':'auto'});
		  			
		  			$(".opciones-dialog>li").css('border','1px solid #BDBBBB');

		  		}
		  	});



		  })
	</script>

</head>
<body>
	
		<div id="contenedor" class="container-fluid" enabled="false">
			
			<div class="row header" style="margin-bottom: 3%;">
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
							
						</ul>

					</div>

			</div>

			<div class="row">
				<div class="col-sm-12">
					
					<div id="coleccion-tabs">
						<ul>
							<li><a href="#licras"><span>Licras</span></a></li>
							<li><a href="#tops"><span>Tops</span></a></li>
							<li><a href="#gorras"><span>Gorras</span></a></li>
							<li><a href="#medias "><span>Medias</span></a></li>
						</ul>

						<div id="licras" class="" style="">
							<div class="row justify-content-sm-around">
								<?php 
									include("conexion.php");

									 $sql= "SELECT * FROM m_deportiva WHERE tipo='licra'";
								
									 $result = mysqli_query($conexion,$sql);

									while ($row = mysqli_fetch_array($result)) {
									echo "<div class='col-sm-3 card-col-deportiva text-center' style='' name='deportiva'>";
										echo "<span name='registrar_pedido' class='add-car'><img src='img/add_cart.svg' style='width:55%;' alt=''></span>";
									 	echo "<img class='' style='margin-bottom:3%' src='$row[extension_img]' alt='' onclick=''>";
										echo "<h4 style=''>$row[nombre]</h4>";
										echo "<hr>";
										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center' style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' style='padding:1%;' for='talla'>Talla </label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<select name='talla' class='form-control'>";
												echo	"<option value='s'>S</option>";
												echo	"<option value='m'>M</option>";
												echo	"<option value='l'>L</option>";
												echo "</select>";
											echo "</div>";
										echo "</div>";	

										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center'  style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' for='cantidad'>Cantidad</label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<input class='form-control' type='number' min='1' step='1' value='1' name='cantidad'>";
											echo "</div>";
										echo "</div>";

										echo "<input class='form-control text-center precio-col-depor' type='text' ";
										echo "name='precio' value='₡$row[precio]' disabled='disabled'>";

										echo "<div class='img-col-deportiva-max text-center' name='$row[nombre]'>";
										echo 	"<div style='width: 100%;'>";
										echo		"<img class='' style='width: 60%;float: left;' src='$row[extension_img]' alt=''>";
										echo	"	<ul class='nav opciones-dialog' style=''>";
										echo			"<li><img src='img/licras/1.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/2.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/3.jpg' alt=''></li>";
										echo		"</ul>";
										echo 	"</div>";
										echo "</div>";
									echo "</div>";

									}


								 ?>
								

							</div>
						</div>
						
						<div id="tops">
							<div class="row justify-content-sm-around">
								<?php 
									include("conexion.php");

									 $sql= "SELECT * FROM m_deportiva WHERE tipo='tops'";
								
									 $result = mysqli_query($conexion,$sql);

									while ($row = mysqli_fetch_array($result)) {
									echo "<div class='col-sm-3 card-col-deportiva text-center' style='' name='deportiva'>";
										echo "<span name='registrar_pedido' class='add-car'><img src='img/add_cart.svg' style='width:55%;' alt=''></span>";
									 	echo "<img class='' style='margin-bottom:3%;width:70%;' src='$row[extension_img]' alt='' onclick=''>";
										echo "<h4 style=''>$row[nombre]</h4>";
										echo "<hr>";
										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center' style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' style='padding:1%;' for='talla'>Talla </label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<select name='talla' class='form-control'>";
												echo	"<option value='s'>S</option>";
												echo	"<option value='m'>M</option>";
												echo	"<option value='l'>L</option>";
												echo "</select>";
											echo "</div>";
										echo "</div>";	

										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center'  style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' for='cantidad'>Cantidad</label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<input class='form-control' type='number' min='1' step='1' value='1' name='cantidad'>";
											echo "</div>";
										echo "</div>";

										echo "<input class='form-control text-center precio-col-depor' type='text' ";
										echo "name='precio' value='₡$row[precio]' disabled='disabled'>";

										echo "<div class='img-col-deportiva-max text-center' name='$row[nombre]'>";
										echo 	"<div style='width: 100%;'>";
										echo		"<img class='' style='width: 60%;float: left;' src='$row[extension_img]' alt=''>";
										echo	"	<ul class='nav opciones-dialog' style=''>";
										echo			"<li><img src='img/licras/1.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/2.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/3.jpg' alt=''></li>";
										echo		"</ul>";
										echo 	"</div>";
										echo "</div>";
									echo "</div>";

									}


								 ?>
							</div>
						</div>
						
						<div id="gorras">
							<div class="row justify-content-sm-around">
								<?php 
									include("conexion.php");

									 $sql= "SELECT * FROM m_deportiva WHERE tipo='gorra'";
								
									 $result = mysqli_query($conexion,$sql);

									while ($row = mysqli_fetch_array($result)) {
									echo "<div class='col-sm-3 card-col-deportiva text-center' style='' name='deportiva'>";
										echo "<span name='registrar_pedido' class='add-car'><img src='img/add_cart.svg' style='width:55%;' alt=''></span>";
									 	echo "<img class='' style='margin-bottom:3%;width:70%;' src='$row[extension_img]' alt='' onclick=''>";
										echo "<h4 style=''>$row[nombre]</h4>";
										echo "<hr>";
										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center' style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' style='padding:1%;' for='talla'>Talla </label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<select name='talla' class='form-control'>";
												echo	"<option value='s'>S</option>";
												echo	"<option value='m'>M</option>";
												echo	"<option value='l'>L</option>";
												echo "</select>";
											echo "</div>";
										echo "</div>";	

										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center'  style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' for='cantidad'>Cantidad</label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<input class='form-control' type='number' min='1' step='1' value='1' name='cantidad'>";
											echo "</div>";
										echo "</div>";

										echo "<input class='form-control text-center precio-col-depor' type='text' ";
										echo "name='precio' value='₡$row[precio]' disabled='disabled'>";

										echo "<div class='img-col-deportiva-max text-center' name='$row[nombre]'>";
										echo 	"<div style='width: 100%;'>";
										echo		"<img class='' style='width: 60%;float: left;' src='$row[extension_img]' alt=''>";
										echo	"	<ul class='nav opciones-dialog' style=''>";
										echo			"<li><img src='img/licras/1.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/2.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/3.jpg' alt=''></li>";
										echo		"</ul>";
										echo 	"</div>";
										echo "</div>";
									echo "</div>";

									}


								 ?>
							</div>
						</div>
						
						<div id="medias">
							<div class="row justify-content-sm-around">
								<?php 
									include("conexion.php");

									 $sql= "SELECT * FROM m_deportiva WHERE tipo='medias'";
								
									 $result = mysqli_query($conexion,$sql);

									while ($row = mysqli_fetch_array($result)) {
									echo "<div class='col-sm-3 card-col-deportiva text-center' style='' name='deportiva'>";
										echo "<span name='registrar_pedido' class='add-car'><img src='img/add_cart.svg' style='width:55%;' alt=''></span>";
									 	echo "<img class='' style='margin-bottom:3%;width:70%;' src='$row[extension_img]' alt='' onclick=''>";
										echo "<h4 style=''>$row[nombre]</h4>";
										echo "<hr>";
										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center' style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' style='padding:1%;' for='talla'>Talla </label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<select name='talla' class='form-control'>";
												echo	"<option value='s'>S</option>";
												echo	"<option value='m'>M</option>";
												echo	"<option value='l'>L</option>";
												echo "</select>";
											echo "</div>";
										echo "</div>";	

										echo "<div class='row justify-content-sm-center' style='margin:2%;'>";
											echo "<div class='col-sm-4 align-self-sm-center'  style='background-color:#E2DFDF;border-radius:3px 0px 0px 3px;'>";
												echo "<label class='form-control-label' for='cantidad'>Cantidad</label>";
											echo "</div>";
											echo "<div class='col-sm-6'>";
												echo "<input class='form-control' type='number' min='1' step='1' value='1' name='cantidad'>";
											echo "</div>";
										echo "</div>";

										echo "<input class='form-control text-center precio-col-depor' type='text' ";
										echo "name='precio' value='₡$row[precio]' disabled='disabled'>";

										echo "<div class='img-col-deportiva-max text-center' name='$row[nombre]'>";
										echo 	"<div style='width: 100%;'>";
										echo		"<img class='' style='width: 60%;float: left;' src='$row[extension_img]' alt=''>";
										echo	"	<ul class='nav opciones-dialog' style=''>";
										echo			"<li><img src='img/licras/1.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/2.jpg' alt=''></li>";
										echo			"<li><img src='img/licras/3.jpg' alt=''></li>";
										echo		"</ul>";
										echo 	"</div>";
										echo "</div>";
									echo "</div>";

									}


								 ?>
							</div>
						</div>
					
					</div>
				</div>
			</div>

		</div>
</body>
</html>