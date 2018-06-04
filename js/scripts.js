function info_prox(i,button) {
    	if($(".info-prox").eq(i).css('display')=='none'){
    		$(".info-prox").eq(i).slideDown(500);
    		$(button).text("Cerrar");
    	}else{
    		$(".info-prox").eq(i).slideUp(500);
    		$(button).text("Ver mas");
    	}
    };



$(document).ready(function() {
	
	$(".card-prox-parent").hide();

    $("#carousel").carousel({
    	interval:3000,

    })

    

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
   		if($(window).scrollTop()>2200 && !conf_card_prox ){
   			var r={};
   			$(".card-prox-parent").show(	1000,function(){
   				$(".row-prox").css('height', 'auto');	
   			});
   			
   		
   			conf_card_prox = true;
   		}
   });

 
 

    
    

});

