

function info_prox(i,button) {
    	if($(".info-prox").eq(i).css('display')=='none'){
    		$(".info-prox").eq(i).slideDown(500);
    		$(button).text("Cerrar");
    	}else{
    		$(".info-prox").eq(i).slideUp(500);
    		$(button).text("Ver mas");
    	}
    };

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
         $(".header>div:nth-child(4)>ul").append("<li class='nav-item'><a id='user_casual' class='nav-link' href='col_casual.php'>Casual</a></li>");
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



$(document).ready(function() {


  set_username();
  set_logOut($.cookie("log"),$.cookie("tipo"));  
	
	$(".card-prox-parent").hide();

  $("#carousel").carousel({
    	interval:3000,

  });

  setTimeout(function(){$("#slide-first-message,#slide-second-message").show("blind",1000)},500);
  
  $("#log_out").click(function(){
    $.removeCookie('username');
    $.removeCookie("already_show");
    $.removeCookie("gusto");
    $.removeCookie("log");
    location.href='index.php';

    
    
  });
    

   $(window).resize(function(){
   		if(window.matchMedia('(max-width:370px)').matches){
   			$(".row-coleccion>div>section>p").hide("fast");
   			$(".row-coleccion").css("height","auto");
   		}
   		if(window.matchMedia('(min-width:371px)').matches){
   			$(".row-coleccion>div>section>p").fadeIn(1000);
   			
   		}
   });


   $(window).scroll(function(){
   	 var conf_card_prox = false;
     var conf_nosotros = false;

   		if($(window).scrollTop()>1500 && !conf_card_prox ){
       
   			var r={};
   			$(".card-prox-parent").effect("drop",{ mode:'show'},1000,function(){
   				setTimeout(function(){$(".row-prox").css('height', 'auto')},5000);	
   			});
   			
   		
   			conf_card_prox = true;
   		}

      if($(window).scrollTop()>2250 && !conf_nosotros){
       
        
        $("#mision").effect("slide",{ mode:'show'},1500,function(){
          
        });

         $("#vision").effect("slide",{direction:'right',mode:'show'},1500,function(){
          setTimeout(function(){$("#row_nosotros").css('height', 'auto')},5000);  
        });
        
      
        conf_nosotros = true;
      }


   });



   /*Anuncios Plubicitarios*/
      $("#anuncio_estudio").dialog({
        width: 870,
        height:530,
        autoOpen:false,
        modal:true,
        draggable:false,
        resizable:false,
        show: {effect:"blind",duration: 1500},
        open: function(){
          $("#contenedor").css({'opacity': '.5','filter':'blur(10px)'});
          $("body").css({'overflow':'hidden','height':'100%'});
        },
        close: function(){
          $("#contenedor").css({'opacity': '1','filter':'blur(0px)'});
          $("body").css({'overflow':'auto','height':'auto'});
        }          
        
      });

       $("#anuncio_futbol").dialog({
        width: 870,
        height:530,
        autoOpen:false,
        modal:true,
        draggable:false,
        resizable:false,
        show: {effect:"blind",duration: 1500},
        open: function(){
          $("#contenedor").css({'opacity': '.5','filter':'blur(10px)'});
          $("body").css({'overflow':'hidden','height':'100%'});
        },
        close: function(){
          $("#contenedor").css({'opacity': '1','filter':'blur(0px)'});
          $("body").css({'overflow':'auto','height':'auto'});
        }          
        
      });


      $("#anuncio_estudio>a").click(function () {
          $("#anuncio_estudio").dialog("close"); 
      });

      $("#anuncio_futbol>a").click(function () {
          $("#anuncio_futbol").dialog("close"); 
      });
       


 
 

    
    

});

