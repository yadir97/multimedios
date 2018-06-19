function info_prox(i,button) {
    	if($(".info-prox").eq(i).css('display')=='none'){
    		$(".info-prox").eq(i).slideDown(500);
    		$(button).text("Cerrar");
    	}else{
    		$(".info-prox").eq(i).slideUp(500);
    		$(button).text("Ver mas");
    	}
    };
function set_logOut(log,tipo){
  if(log=="true"){
      $("#username").after("<a id='log_out' href='#' style='color:black;'>(Cerrar sesión)</a>")
      if (tipo=="admin") {
        $(".header>div:nth-child(3)>ul").append("<li class='nav-item'><a id='admin_armario' class='nav-link' href='crud_coleccion.php'>Armario</a></li>");
      }else {
        $(".header>div:nth-child(3)>ul").append("<li class='nav-item'><a id='user_deportiva' class='nav-link' href='col_deportiva.php'>Deportiva</a></li>");
      }
  }else{
    $("#log_out").remove();
    $("#admin_armario").remove();
    $("#user_deportiva").remove();
    $(".header>div:nth-child(3)>ul").append("<li class='nav-item'><a class='nav-link' href='login.php'>Iniciar Sesión</a></li>");
    
  }


}    



$(document).ready(function() {


   if($.cookie("username")==undefined) {
      $("#username").css("display","none"); 
   }else{
      $("#username").css("display","inline");
      $("#username").html($.cookie("username"));
   }
  set_logOut($.cookie("log"),$.cookie("tipo"));  
	
	$(".card-prox-parent").hide();

  $("#carousel").carousel({
    	interval:3000,

  });

  $("#log_out").click(function(){
    $.removeCookie('username');
    $.cookie('log',false);
    location.href='index.php';

    debugger;
    
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
   		if($(window).scrollTop()>1500 && !conf_card_prox ){
       
   			var r={};
   			$(".card-prox-parent").show(	1000,function(){
   				setTimeout(function(){$(".row-prox").css('height', 'auto')},500);	
   			});
   			
   		
   			conf_card_prox = true;
   		}
   });

 
 

    
    

});

