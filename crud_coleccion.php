<!DOCTYPE html>
<html lang="es">
<head>
	<title>Manejador Colecciones</title>
	<?php include("head.php") ?>
	<script type="text/javascript">
		
		var accion_crud="";
		var form_validator;
		var coleccion_consulta="";


		function validar_admin() {
			if(($.cookie('tipo')=="admin") && ($.cookie('log')!=undefined)){

			}else {
				alert("Acceso Denegado");
				window.location.href= "index.php";
			}
		}
		function destroy_validation() {
			if(form_validator!=null){
				form_validator.destroy();
			}
		}
		function clear_UI(){
			
			$("#form-registro input").val("");
			$("#form-registro input[type='number']").val("0");
			$("#form-registro select").val("");
			$("#preview>img:nth-child(2)").attr("src","img/default_image.svg");
			$("#preview>img:nth-child(1)").css('visibility', 'visible');
		}
		function set_tipo(){
			$("select[name='coleccion']").change(function() {
				if($(this).val()=="deportiva"){
					$("select[name='tipo']>option").remove();
					$("select[name='tipo']").append('<option value="licra">Licra</option>');
					$("select[name='tipo']").append('<option value="gorra">Gorra</option>');
					$("select[name='tipo']").append('<option value="tops">Tops</option>');
					$("select[name='tipo']").append('<option value="medias">Medias</option>');
				}else if($(this).val()=="casual"){

					$("select[name='tipo']>option").remove();
					$("select[name='tipo']").append('<option value="blusa">Blusa</option>');
					$("select[name='tipo']").append('<option value="jeans">Jeans</option>');
					$("select[name='tipo']").append('<option value="short">Short</option>');
					$("select[name='tipo']").append('<option value="abrigos">Abrigos</option>');
				}else{
					$("select[name='tipo']>option").remove();
				}
			});
		}
		function open_img(){
			$("#preview>a").click(function (e) {
				e.preventDefault();

				$("input[name='imagen']").click();
			})
		}
		function set_img () {
			$("input[name='imagen']").change(function () {
				var file = (this.files[0].name).toString();
				var reader = new FileReader();

				reader.onload = function (e) {
					
					$("#preview>img:nth-child(2)").attr('src', e.target.result);
				}

				reader.readAsDataURL(this.files[0]);

				
				if($(this).val()!=""){
					$("#preview>img:nth-child(1)").css('visibility','hidden');
				}else {
					$("#preview>img:nth-child(1)").css('visibility','visible');
				}
			}) 
		}
		function preview_hover () {
			$("#preview").hover(
				function(){
					$(this).find('a').fadeIn();
				},
				function(){
					$(this).find('a').fadeOut();
				}
			) 
		}
		function after_consultar () {
			$("input[name='nombre']").attr('readonly','true');
			$("select[name='coleccion'],select[name='tipo'],#btn-registrar,#btn-consultar").attr('disabled','disabled');
			$("#btn-modificar,#btn-eliminar").removeAttr('disabled');
		}
		function after_modificar(argument) {
			$("input[name='nombre']").removeAttr('readonly');
			$("select[name='coleccion'],select[name='tipo'],#btn-registrar,#btn-consultar").removeAttr('disabled');
			$("#btn-modificar,#btn-eliminar").attr('disabled','disabled');
		}
		function conf_eliminar_dialog() {
			$("#conf_eliminar").dialog({
				autoOpen:false,
				modal:true,
				resizable:false,
				draggable:false,
				width:500,
				height:300,
				open:function(){
					$("body").css({"overflow":"hidden","height":"100%"});
				},
				close:function(){
					$("body").css({"overflow":"auto","height":"auto"});
				},
				buttons:[
					{
						text:"Aceptar",
						icon:"ui-icon-check",
						click: function(){
							
								
								debugger;
								var datos = new FormData($("#form-registro")[0]);
								datos.append('accion',accion_crud);
								datos.append('coleccion',coleccion_consulta);
								datos.append('img_actual', $("#preview>img:nth-child(2)").attr('src'));
								
								

								$.ajax({
									url: 'crud_col.php',
									type: 'post',
									dataType: 'json',
									data: datos,
									contentType:false,
									processData:false,
									beforeSend:function () {
										$("#conf_eliminar>img").css('visibility','visible');
									},
									success: function (response) {
									
										$("#conf_eliminar").dialog("close");
										setTimeout(function(){
												if (response.accion=="eliminar") {

													if(response.resultado){
														$("#conf_eliminar>img").css('visibility','hidden');
														

														alert("La prenda: '" + response.nombre + "' ha sido eliminada!");
														clear_UI();
														after_modificar();
														

													}else{
														$("#conf_eliminar>img").css('visibility','hidden');
													


														alert("Server: Error al eliminar la prenda.")
														clear_UI();
														after_modificar();
														
													}

												}
										},500);		
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

					
						

						}//Fin de la función clicl del conf_elimnar dialog del botón aceptar

						
					},//Cierre del botón aceptar

					{
						text:"Cancelar",
						icon:"ui-icon-closethick",
						click: function(){
								$(this).dialog("close");
								clear_UI();
								after_modificar();
						}//Fin de la función clicl del conf_elimnar dialog del botón cancelar
					}//Cierre del botón cancelar
				]
				
			});
		}
		function registrar () {
			$("input[name='receptor']").click(function(){
				
				switch (accion_crud) {
					
								case "registrar":

									destroy_validation();

									form_validator = $("#form-registro").validate({
											rules:{
												nombre:{required:true},
												coleccion:{required:true},
												tipo:{required:true},
												precio:{required:true,number:true},
												imagen:{required:true},
												s:{required:true,number:true},
												m:{required:true,number:true},
												l:{required:true,number:true},
												xl:{required:true,number:true}
											},
											messages:{
												nombre:{required:"<p class='alert alert-danger'>Campo requerido</p>"},
												coleccion:{required:"<p class='alert alert-danger'>Campo requerido</p>"},
												tipo:{required:"<p class='alert alert-danger'>Campo requerido</p>"},
												precio:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"<p class='alert alert-danger'>Formato inválido</p>"},
												imagen:{required:"<p class='alert alert-danger text-center'>Debe seleccionar una imagen</p>"},
												s:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"},
												m:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"},
												l:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"},
												xl:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"}
											},

											submitHandler: function (form) {
											

												//El FormData se usa cuando se necesitan enviar archivos por medio de ajax.
												//La manera de agregar variable al objeto FormData es mediante el append(n,v).
												//Se requiere establecer el contentType y processData en false.
												var datos = new FormData($("#form-registro")[0]);
												datos.append('accion',accion_crud);

												$.ajax({
													url: 'crud_col.php',
													type: 'post',
													dataType: 'json',
													data: datos,
													contentType:false,
													processData:false,
													success: function (response) {
													
														if (response.accion=="registrar") {

															if(response.resultado){
																alert("Prenda Registrada!");
																clear_UI();
																

															}else{
																alert("Server: Error al registrar la prenda.")
																clear_UI();
															}

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
												
											} 

										});//fin del validate
										
									break;//Fin del case registrar
								case "consultar":
									
										destroy_validation();

										form_validator = $("#form-registro").validate({

											rules:{
												nombre:{required:true},
												coleccion:{required:true}
											},
											messages:{
												nombre:{required:"<p class='alert alert-danger'>Campo requerido para consulta</p>"},
												coleccion:{required:"<p class='alert alert-danger'>Campo requerido para consulta</p>"}
											},

											submitHandler: function (form) {

												var datos = new FormData($("#form-registro")[0]);
												datos.append('accion',accion_crud);


												$.ajax({
													url: 'crud_col.php',
													type: 'post',
													dataType: 'json',
													contentType:false,
													processData:false,
													data: datos,
													success:function (response) {
														
														if(response.resultado){
															$("select[name='tipo']").val(response.prenda['tipo']);
															$("input[name='precio']").val(response.prenda['precio']);
															$("input[name='s']").val(response.prenda['cant_s']);
															$("input[name='m']").val(response.prenda['cant_m']);
															$("input[name='l']").val(response.prenda['cant_l']);
															$("input[name='xl']").val(response.prenda['cant_xl']);

															$("#preview>img:nth-child(2)").attr("src", response.prenda['extension']);
															$("#preview>img:nth-child(1)").css('visibility', 'hidden');

															coleccion_consulta = response.coleccion_consulta;
															
															after_consultar();

														}else{
															alert("No se ha encontrado la prenda, verifique el nombre.");
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
												
										
											}


										});
									break;//Fin del case consultar	
								case "modificar":

									debugger;
									destroy_validation();

									form_validator = $("#form-registro").validate({
											rules:{
												nombre:{required:true},
												coleccion:{required:true},
												tipo:{required:true},
												precio:{required:true,number:true},
												s:{required:true,number:true},
												m:{required:true,number:true},
												l:{required:true,number:true},
												xl:{required:true,number:true}
											},
											messages:{
												nombre:{required:"<p class='alert alert-danger'>Campo requerido</p>"},
												coleccion:{required:"<p class='alert alert-danger'>Campo requerido</p>"},
												tipo:{required:"<p class='alert alert-danger'>Campo requerido</p>"},
												precio:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"<p class='alert alert-danger'>Formato inválido</p>"},
												s:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"},
												m:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"},
												l:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"},
												xl:{required:"<p class='alert alert-danger'>Campo requerido</p>",number:"Formato inválido"}
											},

											submitHandler: function (form) {
											

												//El FormData se usa cuando se necesitan enviar archivos por medio de ajax.
												//La manera de agregar variable al objeto FormData es mediante el append(n,v).
												//Se requiere establecer el contentType y processData en false.
												var datos = new FormData($("#form-registro")[0]);
												datos.append('accion',accion_crud);
												datos.append('coleccion',coleccion_consulta);
												datos.append('img_actual', $("#preview>img:nth-child(2)").attr('src'));
												
												

												$.ajax({
													url: 'crud_col.php',
													type: 'post',
													dataType: 'json',
													data: datos,
													contentType:false,
													processData:false,
													success: function (response) {
														debugger;
														
														if (response.accion=="modificar") {

															if(response.resultado){
																alert("Prenda Modificada!");
																clear_UI();
																after_modificar();

															}else{
																alert("Server: Error al modificar la prenda.")
																clear_UI();
																after_modificar();
															}

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
												
											} 

										});//fin del validate
									break;//Fin del case modificar	

								case "eliminar":
									destroy_validation();
									
									$("#form-registro").validate({

										submitHandler:function(form){

											$("#conf_eliminar").dialog("open");
										}
									});
									
		
									break;
								default:
									alert("Server--->Error en la recepción de solicitud")
								break;


							}			
				
			
				
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
		function set_logOut(log,tipo){
		  
		    if(log=="true"){
		      $("#username").after("<a id='log_out' href='#' style='color:black;'>(Cerrar sesión)</a>")
		      if (tipo=="admin") {
		        $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='admin_armario' class='nav-link' href='crud_coleccion.php'>Armario</a></li>");
		      }else {

		         $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='user_deportiva' class='nav-link' href='col_deportiva.php'>Deportiva</a></li>");
		         $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='user_car-shop' class='nav-link' href='car_list.php'>Mi Carrito</a></li>");
		        
		        if(($.cookie("gusto")=="estudiar")  && ($.cookie("already_show")=="false") ){
		          setTimeout(function(){$("#anuncio_estudio").dialog("open")},500);
		          $.cookie("already_show",true);
		        }else if (($.cookie("gusto")=="futbol") && ($.cookie("already_show")=="false")){
		          setTimeout(function(){$("#anuncio_futbol").dialog("open")},500);
		          $.cookie("already_show",true);
		        }else{
		          if (($.cookie("gusto")=="futbol") && ($.cookie("already_show")=="false")) {
		            setTimeout(function(){$("#anuncio_pintar").dialog("open")},500);  
		            $.cookie("already_show",true);
		          }
		          
		        }
		      }
		  }else{
		    $("#log_out").remove();
		    $("#admin_armario").remove();
		    $("#user_deportiva").remove();
		    $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a class='nav-link' href='login.php'>Iniciar Sesión</a></li>");
		    
		  }
		}   


		$(document).ready(function(){

			validar_admin();

			set_username();
			set_logOut($.cookie("log"),$.cookie("tipo"));
			set_tipo();
			preview_hover();
			open_img();
			set_img();
			registrar();
			conf_eliminar_dialog();
			/***************/
			

			$("#log_out").click(function(){
			    $.removeCookie('username');
			    $.removeCookie("already_show");
			    $.removeCookie("gusto");
			    $.removeCookie("log");
			    location.href='index.php';

			    
			    
			 });

			$("#btn-registrar").click(function () {
				accion_crud="registrar";
				$("input[name='receptor']").click();
				
			});

			$("#btn-consultar").click(function () {
				accion_crud="consultar";
				$("input[name='receptor']").click();
			});

			$("#btn-modificar").click(function () {
				accion_crud="modificar";
				$("input[name='receptor']").click();
			});

			$("#btn-eliminar").click(function () {
				accion_crud="eliminar";
				$("input[name='receptor']").click();
			});
		});
	</script>
</head>	
<body>
	<div class="container-fluid">
		<div class="row header" style="margin-bottom: 3%;">
					<div class="col-sm-12 text-right" >
						<span id="username" style="color:black;font-family: sans-serif;font-weight: bold;"></span>
					</div>
					<div class="col-sm-3">
						<img class="logo" src="img/logo2.png" alt="">
					</div>
					<div class="col-sm-2">
						
					</div>
					<div class="col-sm-6 offset-sm-1">
						<ul class="nav">
							<li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
							
						</ul>

					</div>

		</div>

		<div class="row crud-contenedor justify-content-sm-between">
			<div class="col-sm-7">
				<form id="form-registro" accept-charset="utf-8" enctype="multipart/form-data">
					<fieldset class="text-center">
						<legend>Adminitrador de Colecciones</legend>
						<br><hr>
					</fieldset>
					<fieldset>
						<div class="form-group row">
							<div class="col-sm-2 text-right"><label for="nombre">Nombre</label></div>
							<div class="col-sm-7"><input class="form-control" type="text" name="nombre" value="" placeholder="Nombre de la prenda"></div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group row">
							<div class="col-sm-2 text-right"><label for="coleccion">Colección </label></div>
							<div class="col-sm-7">
								<select name="coleccion" class="form-control" >
									<option></option>
									<option value="deportiva">Deportiva</option>
									<option value="casual">Casual</option>
								</select>
							</div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group row">
							<div class="col-sm-2 text-right"><label for="tipo">Tipo </label></div>
							<div class="col-sm-7">
								<select name="tipo" class="form-control">
								<!--Se establece los distintos tipos de prendas dependiendo de la colección escogida-->
								</select>
							</div>	
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group row">
							<div class="col-sm-2 text-right"><label for="precio">Precio</label></div>
							<div class="col-sm-7"><input class="form-control" type="number" min=0 name="precio" value="" placeholder=""></div>
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group row">
							
							<input class="form-control" style="position: absolute;top: 0;left: 0;width: 0;visibility: hidden;z-index: -10;" type="file" name="imagen">
						</div>
					</fieldset>
					<fieldset>
						<div class="form-group" style="border:1px solid #D6D1D1;padding: 20px;border-radius: 5px; box-shadow: 1px 1px 2px #C2C1C1;">
							<h5 class="text-center ">Detalle de Tallas</h5>
							<div class="row justify-content-sm-around">

								<div class="col-sm-3 text-center" >
									<label class="" for="" >S</label>
									<input class="text-center" type="number"min="0" step="1" name="s"value="0"  autocomplete="postal-code">
								</div>
								<div class="col-sm-3 text-center">
									<label class="" for="">M</label>
									<input class=" text-center" type="number"min="0" step="1" name="m"value="0"  autocomplete="postal-code">
								</div>
								<div class="col-sm-3 text-center">
									<label class="" for="">L</label>
									<input class="text-center" type="number"min="0" step="1" name="l"value="0"  autocomplete="postal-code">
								</div>
								<div class="col-sm-3 text-center">
									<label class="" for="">XL</label>
									<input class="text-center" type="number"min="0"  step="1" name="xl"value="0" autocomplete="postal-code">
								</div>
								
								
								

								
								
								
								

							</div>
						</div>
					</fieldset>


					<input type="submit" name="receptor" style="visibility: hidden;">
				</form>
				
				<ul class="text-center">
						<li><button type="" id="btn-registrar" class="btn btn-success">Registar</button></li>
						<li><button type="" id="btn-consultar" class="btn btn-primary">Consultar</button></li>
						<li><button type="" id="btn-modificar" class="btn btn-primary" disabled="disabled">Modificar</button></li>
						<li><button type="" id="btn-eliminar" class="btn btn-danger" disabled="disabled">Eliminar</button></li>
					</ul>

			</div>
			<div class="col-sm-5 text-center">
				<div id="preview" style="position: relative">
					<img src="img/asterisco.svg" alt="" style="position: absolute;top:9%;left: 18%;z-index: 10;width: 10%">
					<img src="img/default_image.svg" alt="" style="width: 100%">
					<a  class="text-center" href="#" title="" style="position: absolute;bottom: 0;left: 0;width: 100%;text-decoration: none;background-color: #CBC8C8;color: white;padding:3%;border-radius:5px;font-family: sans-serif;font-size: 1.5em;display: none;">Subir imagen</a>
				</div>
				
			</div>
		</div>




	</div><!--Fin del contenedor principal-->

	<div id="conf_eliminar" class="text-left" title="Confirmar Eliminación">
		<p><span class="ui-icon ui-icon-alert" style="float:left; margin-right: 1%;margin-top: 1%;"></span>¿Desea elimar la prenda seleccionada?</p>
		<img style="width: 10%;position: absolute;top: 70%;left: 50%;visibility: hidden;" src="img/gif/load.gif" alt="">
	</div>
</body>
</html>