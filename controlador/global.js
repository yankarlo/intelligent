$(document).ready(function(){

    $("#salir").on("click",function(event){
        event.preventDefault();
        $.ajax({
        	url:"../modelo/loginDAO/control_salir.php",
        	type:"POST",        	
        	success: function(respuesta){
                console.info(respuesta);
                if (respuesta === "true") 
                {
                    window.location.href = "../index.html";                    
                }                       	      	
            }

        });
    });
    $("#saliradmin").on("click",function(event){
        event.preventDefault();
        $.ajax({
            url:"../../modelo/loginDAO/control_salir.php",
            type:"POST",            
            success: function(respuesta){
                console.info(respuesta);
                if (respuesta === "true") 
                {
                    window.location.href = "../../index.html";                    
                }                                   
            }

        });
    });

  

});
