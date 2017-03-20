$(document).on("ready", function () {
    
    var tab = $('#tablamodelo').DataTable({
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
        "bSort": true
    }); 

    $.ajax({
        url:"../../modelo/ordenDAO/modelo_get_modelos.php",
        type:"POST",
        data:"ref=1"
    }).done(function(respuesta){  
        
        var resultado = $.parseJSON(respuesta);
       //console.info(resultado);
        tab.clear().draw(); 
        for (var i = 0; i < resultado.length; i++) {    
            tab.row.add([
                resultado[i].mopr_id,
                resultado[i].clie_nombre,
                resultado[i].mopr_nombre,
                resultado[i].mopr_prenda,
                resultado[i].unme_nombre,
                '<a class="btn-floating btn-small waves-effect waves-light cyan-1 modal-trigger comenzar green" ><i class="material-icons">mode_edit</i></a>',
                '<a class="btn-floating btn-small waves-effect waves-light cyan-1 modal-trigger comenzar red" ><i class="material-icons">content_paste</i></a>'
            ]).draw();
        }
    }).fail(function(respuesta){

    });   


    $("#tablaorden tbody").on("click",".comenzar",function(){
        console.info("hola");
        var data = tab.row( $(this).parents('tr') ).data(); 
        console.info(data);
        datos = [{'name' : 'modelo_id','value' : data[1]},
                {'name' : 'modelo_nombre','value' : data[2]},
                {'name' : 'modelo_cantidad','value' : data[7]},
                {'name' : 'modelo_proceso','value' : data[4]},
                {'name' : 'orden_entregada','value' : data[6]},
                {'name' : 'orden_planeada','value' : data[5]},
                {'name' : 'proceso_id','value' : data[9]},
                {'name' : 'orden_id','value' : data[0]}];
        //Paso la info obtenida del evento a la funcion evaluar
        //evaluar(datos);
          
       //console.info(datos);
    });




    $("form").on("submit", function(e){
        e.preventDefault();
        console.info($(this).serializeArray());
        var data =  $(this).serializeArray();
        console.info(data);

        swal({
            title: "Estas Seguro?",   
            text: "Se registrara esta nueva orden.",   
            type: "warning",   
            confirmButtonColor: "#2196F3",   
            confirmButtonText: "Aceptar",
            showCancelButton: true,
            showLoaderOnConfirm: true,   
            closeOnConfirm: false
        },function(){
          setTimeout(function(){
            swal("Ajax request finished!");
          },2000);
           
        });
        /*$.ajax({
            url:"../../modelo/ordenDAO/modelo_insert_orden.php",
            type:"POST",
            data:data
        }).done(function(respuesta){  
            console.info(respuesta);
            var resultado = $.parseJSON(respuesta);
            console.info(resultado); 
           
                
                 
        }).fail(function(respuesta){});*/
    });

    $('select').material_select();
    $('.modal-trigger').leanModal(); 
});