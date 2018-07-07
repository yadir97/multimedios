<!DOCTYPE html>
<html>
<head>
	<title>Mi Carrito</title>
	<?php include("head.php") ?>
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
		  function cancelar_pedido () {
		  	$("#btn_cancelar_pedido").click(function(){
		  		
		  		var id_pedido = $(this).attr('value');
		  		var coleccion = $(this).attr('name');

		  		$.ajax({
		  			url: 'cancelar_pedido.php',
		  			type: 'post',
		  			dataType: json,
		  			data: {"pedido": id_pedido,"coleccion":coleccion},
		  			success: function(response){

		  				if (response.resultado) {
		  					alert("El pedido ha sido cancelado");
		  				}else {
		  					alert("Error al cancelar el pedido");
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
		  function set_username(){
			  if($.cookie("username")==undefined) {
			      $("#username").css("display","none"); 
			   }else{
			      $("#username").css("display","inline");
			      $("#username").html($.cookie("username"));
			   }
			}

		  function send_username(){
		  	
		  	var username = $.cookie("username");

		  		$.ajax({
		  			url: 'load_car_list.php',
		  			type: 'post',
		  			dataType: 'text',
		  			data: {"username": $.cookie('username')},
		  			success: function(response){
		  				
		  				$("table>tbody").html(response);
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
		  		
		  }  
		  

		  $(document).ready(function(){
              
              set_username();
              set_logOut($.cookie("log"),$.cookie("tipo")); 
		  	$("#log_out").click(function(){
			    $.removeCookie('username');
			    $.cookie('log',false);
			    location.href='index.php'; 

			});
		  

		  	send_username();
		  });</script>

</head>
<body>
	
	<div id="contenedor" class="container-fluid" enabled="false">
			
			<div class="row header" style="margin-bottom: 8%;">
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
		<!--------------------------------------------->
			<div class="row justify-content-sm-around" style="margin: 0px 5% 5% 5%;">
				<div class="col-sm-4" style="padding-top: 2% !important;"><div style="border-top: 2px solid black"></div></div>
				<div class="col-sm-3 text-center"><h1 style="font-family: sans-serif">Order List</h1><img src="img/add_cart.svg" alt="" style="width: 20%;position: absolute;top:0%; left: 85%;transform: rotate(-20deg);">
					<img src="img/add_cart.svg" alt="" style="width: 20%;position: absolute;top:0%; right: 85%;transform: rotateY(180deg) rotate(-20deg);">
				</div>
				<div class="col-sm-4" style="padding-top: 2% !important;"><div style="border-top: 2px solid black"></div></div>
			</div>

			<div class="row"  style="margin: 0px 5%;">
				<div class="col-sm-12 table-responsive">
					<table class="table table-hover card-list-table" style="border: 1px solid #D1CFCF !important;" >
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Tipo</th>
								<th>Talla</th>
								<th>Cantidad</th>
								<th>Estado</th>
								<th>Monto</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>	
				</div>
			</div>	



		
	</div>		





</body>
</html>