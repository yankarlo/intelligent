$(document).on("ready", function () {
    var t;
    $.ajax({
        url:"../modelo/capturaDAO/modelo_get_modelo.php",
        type:"POST",
        data:""
    }).done(function(respuesta){  
       	//console.info(respuesta);
       	var resultado = $.parseJSON(respuesta);
       	//console.info(resultado);
        $("#detalle_modelo").append(`<li class="collection-item"><span class="blue-text text-darken-2">Modelo</span>: ${resultado.modelo_nombre}</li>
                                    <li class="collection-item"><span class="blue-text text-darken-2">Cantidad</span>: <span id="standar">${resultado.modelo_cantidad}</span></li>
                                    <li class="collection-item"><span class="blue-text text-darken-2">Proceso</span>: ${resultado.modelo_proceso}</li>
                                    <li class="collection-item"><span class="blue-text text-darken-2">Orden</span>: ${resultado.orden_id}</li>`);
        $("#entregado").text(resultado.orden_entregada);
        $("#planeado").text(resultado.orden_planeada);

    
    }).fail(function(respuesta){

    });   

    $("#continuar").on("click", function(){
        //console.info("hola");
        $("#form").on("submit", function(e){
            e.preventDefault();
            var data =  $(this).serializeArray();
                    data.push({'name': 'fecha_inicio', 'value': fecha});
         

            swal({
                  title: "Continuar?",   
                    text: "Tendras 30 segundos despues de aceptar.",   
                    type: "warning",   
                    confirmButtonColor: "#2196F3",   
                    confirmButtonText: "Aceptar",   
                    closeOnConfirm: false,
                    showCancelButton: true
                },
                function(){
                    swal("Camenzaste!", "Apurate el tiempo empezara a correr pronto.", "success");
                    clearInterval(cronometro);
                    setTimeout(function()
                    { 

                    contador_m = 0;
                    contador_s = 0;
                    contador_h = 0;
                    $("#minutos").text(contador_m);
                    $("#hora").text(contador_m);
                    $("#segundos").text(contador_s);
                        date = new Date();                  
                        fecha = `${date.getFullYear()}-${date.getMonth()}-${date.getDate()} ${date.getHours()}:${date.getMinutes()}`;
                        //console.info(fecha);
                        carga(true);
                    },5000);
                    $("#panel").removeClass("yellow").removeClass("red").addClass("green"); 
                    cantidad = $("#captura").val();
                    standar = $("#standar").text();
                    //console.info((cantidad/standar)*100);
                    
                    
                    //console.info(data);
                    $.ajax({
                        url:"../modelo/capturaDAO/modelo_insert_movimiento_empleado.php",
                        type:"POST",
                        data:data
                    }).done(function(respuesta){  
                        //console.info(respuesta);
                        var resultado = $.parseJSON(respuesta);
                        //console.info(resultado); 
                        $("#productividad").text(resultado[0]);
                        if (resultado) {
                            $.ajax({
                                url:"../modelo/capturaDAO/modelo_get_productividad.php",
                                type:"POST",
                                data:data
                            }).done(function(respuesta){  
                                //console.info(respuesta);
                                var resultado = $.parseJSON(respuesta);
                                //console.info(resultado); 
                                
                                $("#productividad").text(resultado[0].moem_productividad);
                            }).fail(function(respuesta){});
                            $.ajax({
                                url:"../modelo/ordenDAO/modelo_update_orden.php",
                                type:"POST",
                                data:data
                            }).done(function(respuesta){  
                                //console.info(respuesta);
                                var resultado = $.parseJSON(respuesta);
                                console.info(resultado); 
                                $("#captura").val("");
                                $("#entregado").text(resultado);
                            }).fail(function(respuesta){});
                        }       
                    }).fail(function(respuesta){});
                });
        }); 
    }); 


    $("#fturno").on("click", function(){
        //console.info("hola");
        $("#form").on("submit", function(e){
            e.preventDefault();
            var data =  $(this).serializeArray();
            data.push({'name': 'fecha_inicio', 'value': fecha});
            $("#panel").removeClass("yellow").removeClass("red").addClass("green"); 
            cantidad = $("#captura").val();
            standar = $("#standar").text();
            //console.info((cantidad/standar)*100);
          

            swal({
                  title: "Finalizar Turno?",   
                    text: "Se guardara tu ultima captura y se cerrara session.",   
                    type: "warning",   
                    confirmButtonColor: "#2196F3",   
                    confirmButtonText: "Aceptar",   
                    closeOnConfirm: false,
                    showCancelButton: true
                },
                function(){
                   swal("Adios!", "Hasta pronto buen trabajo.", "success");
                   setTimeout(function()
                    { 
                        date = new Date();                  
                        fecha = `${date.getFullYear()}-${date.getMonth()}-${date.getDate()} ${date.getHours()}:${date.getMinutes()}`;
                        //console.info(fecha);
                        
                    },5000);
                    
                    //console.info(data);
                    $.ajax({
                        url:"../modelo/capturaDAO/modelo_insert_movimiento_empleado.php",
                        type:"POST",
                        data:data
                    }).done(function(respuesta){  
                        //console.info(respuesta);
                        var resultado = $.parseJSON(respuesta);
                        //console.info(resultado); 
                        //$("#productividad").text(resultado[0]);
                        if (resultado) {
                            $.ajax({
                                url:"../modelo/capturaDAO/modelo_get_productividad.php",
                                type:"POST",
                                data:data
                            }).done(function(respuesta){  
                                //console.info(respuesta);
                                var resultado = $.parseJSON(respuesta);
                                //console.info(resultado); 
                                
                                $("#productividad").text(resultado[0].moem_productividad);
                            }).fail(function(respuesta){});
                            $.ajax({
                                url:"../modelo/ordenDAO/modelo_update_orden.php",
                                type:"POST",
                                data:data
                            }).done(function(respuesta){  
                                //console.info(respuesta);
                                var resultado = $.parseJSON(respuesta);
                                console.info(resultado); 
                                $("#captura").val("");
                                //$("#entregado").text(resultado);
                                setTimeout(function()
                                { 
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
                                    
                                },3000);
                                
                            }).fail(function(respuesta){});
                        }       
                    }).fail(function(respuesta){});
                });
        }); 
    }); 



});