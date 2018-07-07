		function clear_registro () {
			$("#form-registro input[name!='btn-registrar']").val("");
		}
		function open_registro(){
			$("#row_registro").show("slide",1000);
		}
		function open_inicio(){
			$("#row_inicio").show("fold", 1000);
		}

		$.validator.addMethod('pattern_pass', function(value,element){

			return this.optional(element) || /^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$/.test(value);
		});


		$(document).ready(function(){
			var options = {};


			

			$("#registrar-usuario").click(function() {

				$("#row_inicio").hide("fold",1000);
				setTimeout(function(){open_registro()}, 1200);
				$("#form-registro input[name='contrasena']").focusin(function(event) {
					$("#reglas-contrasena").show('slide',500);
					
				});
				$("#form-registro input[name='contrasena']").focusout(function(event){
					$("#reglas-contrasena").hide('slide',500);
				});
				
			});

			$("#back-inicio").click(function(){
				$("#row_registro").hide("slide",1000);
				setTimeout(function(){open_inicio()}, 1200)
			});

			

			$("#form-registro").validate({
					errorClass:"invalid",
					rules:{
						nombre:{required:true,maxlength:30},
						app_paterno:{required:true},
						app_materno:{required:true},
						email:{required:true,email:true},
						usuario:{required:true,minlength:8,maxlength:16},
						contrasena:{required:true,minlength:8,maxlength:12,pattern_pass:true},
						conf_contrasena:{required:true,equalTo:"#contrasena"},
						gusto:{required:true}
					},

					messages:{
						nombre:{required:'Este campo es obligatorio',maxlength:'El máximo permitido son 30 caracteres'},
						app_paterno:{required:'Este campo es obligatorio'},
						app_materno:{required:'Este campo es obligatorio'},
						email:{required:'Este campo es obligatorio',email:'El formato en inválido'},
						usuario:{required:'Este campo es obligatorio',minlength:'El mínimo permitido son 8 caracteres',maxlength:'El máximo permitido son 16 caracteres'},
						contrasena:{required:'Este campo es obligatorio',minlength:'El mínimo permitido son 8 caracteres',maxlength:'El máximo permitido son 16 caracteres',pattern_pass:'El formato es inválido'},
						conf_contrasena:{required:'El campo es obligatorio',equalTo:'Las contraseñas no coinciden'},
						gusto:{required:'El campo es obligatorio'}
					},

					submitHandler: function(form){
							
							var datos =$("#form-registro").serialize();
							
						$.ajax({
							url: 'registrar_usuario.php',
							type: 'post',
							data: datos,
							success: function(r){
								debugger;
								if (r==1) {
									clear_registro();
									$(window).scrollTop(0);
									$("#respuesta>h4").html("¡Usuario registrado!");
									$("#respuesta>h4").css("color","#43BC43");
									setTimeout(function(){$("#respuesta").show("blind",800)},1000);
									setTimeout(function(){$("#respuesta").hide("blind",500)},3000);
								}else{
									$("#respuesta>h4").html("Error al registar usuario");
									$("#respuesta>h4").css("color","#E24040");
									setTimeout(function(){$("#respuesta").show("blind",800)},1000);
									setTimeout(function(){$("#respuesta").hide("blind",500)},3000);
								}
							}
						})
						.done(function(data) {
							console.log("success");
							
						})
						.fail(function(xhr, textStatus, errorThrown) {
							console.log("error:" + textStatus );
						})
						.always(function() {
							console.log("complete");
							
						});



					}
					
			});

			$("#btn-ingresar").click(function(){

				$("#form-inicio").validate({

					rules:{
						usuario:{required:true},
						password:{required:true}
					},
					messages:{
						usuario:{required:'Ingrese su nombre de usuario'},
						password:{required:'Ingrese su contraseña'}
					},
					submitHandler: function(form){

						var datos = $("#form-inicio").serialize();

						$.ajax({
							url: 'ingresar.php',
							type: 'POST',
							dataType:'json',
							data: datos,
							success: function(response){
								
								if (response.encontrado) {
									 $.cookie("username", response.user);
									 $.cookie("tipo",response.tipo);
									 $.cookie("log", true);
									 $.cookie("gusto",response.gusto);
									 $.cookie("already_show",false);
									location.href='index.php';
								}else{
									alert(response.estatus);
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
					
			});

			
		});