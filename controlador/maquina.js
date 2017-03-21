$(document).on("ready", function () {
    //Controlador maquina admin
    var maquinas = $('#tablamaquina').DataTable({
        "language": {
            "decimal":        "",
            "emptyTable":     "Se termino la lista",
            "info":           "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            "infoEmpty":      "Mostrando 0 a 0 de 0 entradas",
            "infoFiltered":   "(Filtrada de las _MAX_ entradas totales)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Ver _MENU_ entradas",
            "loadingRecords": "Cargando...",
            "processing":     "Procesando...",
            "search":         "Buscar con mas detalle:",
            "zeroRecords":    "No se encontraron registros coincidentes",
            "paginate": {
                "first":      "Primero",
                "last":       "Ultimo",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar para ordenar la columna ascendente",
                "sortDescending": ": activar para ordenar la columna descendente"
            }
            
        },
        responsive: true,
        "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 3 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 5 ],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [ 7 ],
                "visible": false,
                "searchable": false
            }
        ],
        "bSort": true
    }); 
    
    function maquina() {
        $.ajax({
            url:"../../modelo/maquinaDAO/modelo_get_maquina.php",
            type:"POST",
            data:""
        }).done(function(respuesta){  
            
            var resultado = $.parseJSON(respuesta), text;
           console.info(resultado);
           maquinas.clear().draw(); 
            for (var i = 0; i < resultado.length; i++) {  
                if (resultado[i].maqu_estado === "1") {
                    text = "Activo";
                }else if (resultado[i].maqu_estado === "2") {
                    text = "Inactivo";
                } 
                maquinas.row.add([
                    resultado[i].maqu_id,
                    resultado[i].maqu_referencia,
                    resultado[i].maqu_nombre,                    
                    resultado[i].moma_id,
                    resultado[i].moma_nombre,
                    resultado[i].marc_id,
                    resultado[i].marc_nombre,
                    resultado[i].maqu_estado,
                    text,                   
                    '<a class="btn-floating btn-small waves-effect waves-light cyan-1 modal-trigger editar green boton" href="#mod"  tipo="2"><i class="material-icons">mode_edit</i></a>',
                    '<a class="btn-floating btn-small waves-effect waves-light cyan-1 eliminar red " tipo="3"><i class="material-icons">close</i></a>'
                ]).draw();
                  
                
            }

            $(".boton").on("click", function () {
                var tipo = $(this).attr("tipo");
                console.info(tipo);
                if (tipo === "1") {
                    $("#titulo_modal").text("CREAR MAQUINA");
                    $("#form").attr("tipo","1").attr("tipo");
                } else if(tipo === "2") {
                    $("#titulo_modal").text("EDITAR MAQUINA");
                    $("#form").attr("tipo","2").attr("tipo");

                } else {
                    $("#form").attr("tipo","3").attr("tipo");
                }
                
            });
            $(".modal-trigger").leanModal({
                complete: function() 
                { 
                    $("#form")[0].reset();
                }
            }); 
        }).fail(function(respuesta){

        }); 
    }
    maquina(); 

    $("#mod").css({"width": "60%", "height": "45%"});

    $("#tablamaquina tbody").on("click",".editar",function(){
        console.info("hola");
        var data = maquinas.row( $(this).parents('tr') ).data(); 
        console.info(data);
        $("#mod").append(`<input type="text" class="hide" value="${data[0]}" name="id_maquina">`);
        $("#modelo").val(data[3]);
        $("#marca").val(data[5]);
        $("#nombre").val(data[2]);
        $("#referencia").val(data[1]);
        $(".label").addClass("active");
        //Paso la info obtenida del evento a la funcion evaluar
        //evaluar(datos);
          
       //console.info(datos);
    });

    $("#tablamaquina tbody").on("click",".eliminar",function(){
        console.info("hola");
        var data = maquinas.row( $(this).parents('tr') ).data(); 
        console.info(data);
        swal({
            title: "Estas Seguro?",   
            text: "Se cambiara el estado de la maquina.",   
            type: "warning",   
            confirmButtonColor: "#2196F3",   
            confirmButtonText: "Aceptar",   
            closeOnConfirm: false,
            showCancelButton: true
        },function(){
            swal("Hecho!", "Maquina inactiva.", "success");
            
            
            $.ajax({
                url:"../../modelo/maquinaDAO/modelo_delete_maquina.php",
                type:"POST",
                data:"id="+data[0]
            }).done(function(respuesta){  
                console.info(respuesta);
                var resultado = $.parseJSON(respuesta);
               //console.info(resultado);
               
               maquina();
                
            }).fail(function(respuesta){

            }); 
        });
       
        //Paso la info obtenida del evento a la funcion evaluar
        //evaluar(datos);
          
       //console.info(datos);
    });

    $.ajax({
        url:"../../modelo/maquinaDAO/modelo_get_modelos.php",
        type:"POST",
        data:""
    }).done(function(respuesta){  
        
        var resultado = $.parseJSON(respuesta);
       console.info(resultado);
        for (var i = 0; i < resultado.length; i++) 
        {              
            $("#modelo").append($('<option>', {
            value: resultado[i].moma_id,
            text: resultado[i].moma_nombre
            }));                
        }         
        
    }).fail(function(respuesta){

    }); 

    $.ajax({
        url:"../../modelo/maquinaDAO/modelo_get_marcas.php",
        type:"POST",
        data:""
    }).done(function(respuesta){  
        
        var resultado = $.parseJSON(respuesta);
       console.info(resultado);
        for (var i = 0; i < resultado.length; i++) 
        {              
            $("#marca").append($('<option>', {
            value: resultado[i].marc_id,
            text: resultado[i].marc_nombre
            }));                
        } 
        
    }).fail(function(respuesta){

    });


    $("#form").on("submit", function (e) {
        e.preventDefault();
        console.info($(this).attr("tipo"));

        var tipo = $(this).attr("tipo"), url, data = $(this).serializeArray(), text, title = "Estas Seguro?", mensaje, mensaje2;
        console.info(data);
        if (tipo === "1") {
            url = "../../modelo/maquinaDAO/modelo_insert_maquina.php"
            text = "Se guardara este nueva maquina.";
            mensaje = "Guardado!";
            mensaje2 = "Nueva maquina registrado.";
        } else if(tipo === "2") {
            url = "../../modelo/maquinaDAO/modelo_edit_maquina.php"
            text = "Se editara esta maquina.";
            mensaje = "Editado!";
            mensaje2 = "Maquina Editada.";
        }

        swal({
            title: title,   
            text: text,   
            type: "warning",   
            confirmButtonColor: "#2196F3",   
            confirmButtonText: "Aceptar",   
            closeOnConfirm: false,
            showCancelButton: true
        },function(){
            swal(mensaje, mensaje2, "success");
            
            $("#mod").closeModal();
            $.ajax({
                url:url,
                type:"POST",
                data:data
            }).done(function(respuesta){  
                console.info(respuesta);
                var resultado = $.parseJSON(respuesta);
               //console.info(resultado);
               
               maquina();
                
            }).fail(function(respuesta){

            }); 
        });
         

        
    });


    $('select').material_select();

    
});