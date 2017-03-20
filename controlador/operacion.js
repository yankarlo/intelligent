$(document).on("ready", function () {
    
    $('.tabla').DataTable({
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
            }
        ],
        "bSort": true
    }); 
    $('div.dataTables_length').find("select").addClass("browser-default").css({"width": "150%"});
    var proceso = $('#tablaproceso').DataTable();
    var marcas = $('#tablamarca').DataTable();

    function procesos() {
        $.ajax({
            url:"../../modelo/procesoDAO/modelo_get_procesos.php",
            type:"POST",
            data:""
        }).done(function(respuesta){  
            
            var resultado = $.parseJSON(respuesta);
           //console.info(resultado);
           proceso.clear().draw(); 
            for (var i = 0; i < resultado.length; i++) {    
                proceso.row.add([
                    resultado[i].prpr_id,
                    resultado[i].prpr_nombre,
                    '<a class="btn-floating btn-small waves-effect waves-light cyan-1 modal-trigger editar green " href="#mod" tipo="1"><i class="material-icons">mode_edit</i></a>',
                    '<a class="btn-floating btn-small waves-effect waves-light cyan-1  eliminar red" tipo="1"><i class="material-icons">close</i></a>'
                ]).draw();
            }
            $('.modal-trigger').leanModal();
        }).fail(function(respuesta){

        }); 
    }
     
    function marca() {
        $.ajax({
            url:"../../modelo/procesoDAO/modelo_get_marcas.php",
            type:"POST",
            data:""
        }).done(function(respuesta){  
            
            var resultado = $.parseJSON(respuesta);
           //console.info(resultado);
           marcas.clear().draw(); 
            for (var i = 0; i < resultado.length; i++) {    
                marcas.row.add([
                    resultado[i].marc_id,
                    resultado[i].marc_nombre,
                    '<a class="btn-floating btn-small waves-effect waves-light cyan-1 modal-trigger editar green " href="#mod"  tipo="2"><i class="material-icons">mode_edit</i></a>',
                    '<a class="btn-floating btn-small waves-effect waves-light cyan-1 eliminar red" tipo="2"><i class="material-icons">close</i></a>'
                ]).draw();
            }
            $('.modal-trigger').leanModal(); 
        }).fail(function(respuesta){

        }); 
    }

    procesos();
    marca();

    $("#mod").css({"width": "40%", "height": "35%"});

    $(".tabla tbody").on("click",".editar",function(){
        
        var tipo = $(this).attr("tipo");

        if (tipo === "1") {
            var data = proceso.row( $(this).parents('tr') ).data();
            $("#titulo_modal").text("EDITAR PROCESO");
            $("#form").attr("tipo","3").attr("tipo");
            $("#contenido_modal").html(`<div class="input-field col s12 m12 l12">
                                            <input id="nombre" type="text" class="validate" name="nombre" value="${data[1]}">
                                            <label for="nombre" class="active">NOMBRE</label>
                                            <input type="text" class="hide" value="${data[0]}" name="id">
                                        </div>`); 
        } else if(tipo="2") {
            var data = marcas.row( $(this).parents('tr') ).data();
            $("#titulo_modal").text("EDITAR PROCESO");
            $("#form").attr("tipo","4").attr("tipo");
            $("#contenido_modal").html(`<div class="input-field col s12 m12 l12">
                                            <input id="nombre" type="text" class="validate" name="nombre" value="${data[1]}">
                                            <label for="nombre" class="active">NOMBRE</label>
                                            <input type="text" class="hide" value="${data[0]}" name="id">
                                        </div>`); 
        }
        
    });

    $(".boton").on("click", function () {
        var tipo = $(this).attr("tipo");
         
        if (tipo === "1") { 
            $("#titulo_modal").text("CREAR PROCESO");
            $("#form").attr("tipo","1").attr("tipo");
            $("#contenido_modal").html(`<div class="input-field col s12 m12 l12">
                                            <input id="nombre" type="text" class="validate" name="nombre">
                                            <label for="nombre">NOMBRE</label>
                                        </div>`);
        } else if(tipo === "2") {
            $("#form").attr("tipo","2").attr("tipo");
            $("#titulo_modal").text("CREAR MARCA");
            $("#contenido_modal").html(`<div class="input-field col s12 m12 l12">
                                            <input id="nombre" type="text" class="validate" name="nombre">
                                            <label for="nombre">NOMBRE</label>
                                        </div>`);
        }
    });

    $("#form").on("submit", function (e) {
        e.preventDefault();
        console.info($(this).attr("tipo"));

        var tipo = $(this).attr("tipo"), url, data = $(this).serializeArray(), text, title = "Estas Seguro?", mensaje, mensaje2;
        if (tipo === "1") {
            url = "../../modelo/procesoDAO/modelo_insert_proceso.php"
            text = "Se guardara este nuevo proceso.";
            mensaje = "Guardado!";
            mensaje2 = "Nuevo proceso registrado.";
        } else if(tipo === "2") {
            url = "../../modelo/procesoDAO/modelo_insert_marca.php"
            text = "Se guardara este nueva marca.";
            mensaje = "Guardado!";
            mensaje2 = "Nuevo marca registrado.";
        } else if(tipo === "3") {
            url = "../../modelo/procesoDAO/modelo_edit_proceso.php"
            text = "Se editara este proceso.";
            mensaje = "Editado!";
            mensaje2 = "Proceso modificado.";
        } else if(tipo === "4") {
            url = "../../modelo/procesoDAO/modelo_edit_marca.php"
            text = "Se editara este marca.";
            mensaje = "Editado!";
            mensaje2 = "Marca modificada.";
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
               
               procesos();
               marca();
                
            }).fail(function(respuesta){

            }); 
        });
         

        
    });





    $('select').material_select();

    $('.modal-trigger').leanModal(); 
});