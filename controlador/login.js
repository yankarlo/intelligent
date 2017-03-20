$(document).ready(function(){

    $("#inicio").on("submit",function(event){
        event.preventDefault();
        var data=$(this).serializeArray();         
    	$.ajax({
        	url:"modelo/loginDAO/modelo_get_login.php",
        	type:"POST",			     
        	data :data,
        	success: function(respuesta){  
            console.info(respuesta);  
            var resultado = $.parseJSON(respuesta);
            console.info(resultado.length);    

                if (resultado.length > 0) 
                {
                    
                    if (resultado[0].perf_id === "1") {
                        window.location.href = "vista/admin/home.php";
                    }else if (resultado[0].perf_id === "2") {
                        window.location.href = "vista/home.php";
                    }
                    //
                
                }
                else if(respuesta === "false")
                {
                    Materialize.toast('la contraseña o usuario son incorrectos', 3000, 'rounded');
                }        	      	
            }
        });
    });

    $("#salir").on("click",function(event){
        event.preventDefault();
        console.info("hola");
        $.ajax({
        	url:"../modelo/loginDAO/control_salir.php",
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

    //Ajax que me valida los perfiles del usuario
    /*$.ajax({
        url:"../modelo/loginDAO/modelo_get_permisos.php",
        type:"POST",
        data:"",
            success: function(respuesta){
         
            var resultado = $.parseJSON(respuesta);
         
            if (resultado[0] === true) {

                var array = [];

                for (var i = 0; i < resultado[1].length; i++) {
                    array = resultado[1];          
                    if (array[i] === "grupo") 
                    {               
                        $("#"+array[i]).children("a").attr("data-actives",array[i]+"List").attr("data-actives");
                        $("#"+array[i]).removeClass("hide");
                    }
                    else
                    {
                        $("#"+array[i]).children("a").attr("href",array[i]+".php").attr("href");
                        $("#"+array[i]).removeClass("hide");
                    }
                }
            }               
        }
    });*/

    $.ajax({
        url:"modelo/empresaDAO/modelo_get_empresa.php",
        type:"POST",
        data:"",
            success: function(respuesta){
            console.info(respuesta);
            resultado = $.parseJSON(respuesta);
            for (var i = 0; i < resultado.length; i++) 
            {              
                $(".empresa").append($('<option>', {
                value: resultado[i].empr_id,
                text: resultado[i].empr_nombre
                }));                
            }              
        }
    });

    $.ajax({
        url:"modelo/maquinaDAO/modelo_get_maquina.php",
        type:"POST",
        data:"",
            success: function(respuesta){
            console.info(respuesta);
            resultado = $.parseJSON(respuesta);
            for (var i = 0; i < resultado.length; i++) 
            {              
                $("#maquina").append($('<option>', {
                value: resultado[i].maqu_id,
                text: `${resultado[i].maqu_nombre} - ${resultado[i].maqu_referencia}`
                }));                
            }              
        }
    });
    
    $('select').material_select();
    
     
    $(".button-collapse").sideNav(); 
});



