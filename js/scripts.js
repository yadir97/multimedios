function info_prox(i,button) {
    	if($(".info-prox").eq(i).css('display')=='none'){
    		$(".info-prox").eq(i).slideDown(1000);
    		$(button).text("Cerrar");
    	}else{
    		$(".info-prox").eq(i).slideUp(1000);
    		$(button).text("Ver mas");
    	}
    };

$(document).ready(function() {
	
    $("#carousel").carousel({
    	interval:3000,

    })

    
    

});