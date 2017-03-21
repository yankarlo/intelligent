$(document).on("ready", function () {
    //Controlador orden admin	
	var tab = $('#tablaorden').DataTable({
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
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            },{
                "targets": [ 7 ],
                "visible": false,
                "searchable": false
            },{
                "targets": [ 9 ],
                "visible": false,
                "searchable": false
            }
        ],
        "bSort": true
    }); 

    $.ajax({
        url:"../../modelo/ordenDAO/modelo_get_ordenes.php",
        type:"POST",
        data:""
    }).done(function(respuesta){  
       	
       	var resultado = $.parseJSON(respuesta);
       	console.info(resultado);
       	tab.clear().draw(); 
		for (var i = 0; i < resultado.length; i++) {	
			tab.row.add([
				resultado[i].orpr_id,
	            resultado[i].mopr_id,
	            resultado[i].clie_nombre,
	            resultado[i].mopr_nombre,
	            resultado[i].prpr_nombre,
	            resultado[i].ormo_cantidad_planeada,
	            resultado[i].ormo_cantidad_entregada,
				resultado[i].ormo_cantidad_standar,						
				resultado[i].orpr_fecha_planeada_inicio,
                resultado[i].prpr_id,
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
        $.ajax({
	        url:"../../modelo/modeloDAO/modelo_get_modelo.php",
	        type:"POST",
	        data:datos
    	}).done(function(respuesta){  
	       	console.info(respuesta);
	       	var resultado = $.parseJSON(respuesta);
	       	console.info(resultado);
	       	window.location.href = "captura.php";
	    }).fail(function(respuesta){

	    });   
       //console.info(datos);
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15,// Creates a dropdown of 15 years to control year
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy-mm-dd',
        hiddenName: true,
        monthsFull: [ 'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre' ],
        monthsShort: [ 'ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic' ],
        weekdaysFull: [ 'domingo', 'lunes', 'martes', 'miércoles', 'jueves', 'viernes', 'sábado' ],
        weekdaysShort: [ 'dom', 'lun', 'mar', 'mié', 'jue', 'vie', 'sáb' ],
        today: 'hoy',
        clear: 'borrar',
        close: 'cerrar',
        editable: true,
        min: 'today'
    }); 

    $('.datepicker').on("click",function() {         
        $(this).pickadate('open');
    });

    $.ajax({
        url:"../../modelo/modeloDAO/modelo_get_modelos.php",
        type:"POST",
        data:"ref=0"
    }).done(function(respuesta){  
        console.info(respuesta);
        var resultado = $.parseJSON(respuesta);
        console.info(resultado);
        for (var i = 0; i < resultado.length; i++) 
        {              
            $("#modelo").append($('<option>', {
            value: resultado[i].mopr_id,
            text: resultado[i].mopr_nombre
            }));                
        } 
        
    }).fail(function(respuesta){

    });

    $.ajax({
        url:"../../modelo/ordenDAO/modelo_get_medidas.php",
        type:"POST",
        data:""
    }).done(function(respuesta){  
        console.info(respuesta);
        var resultado = $.parseJSON(respuesta);
        console.info(resultado);
        for (var i = 0; i < resultado.length; i++) 
        {              
            $("#medida").append($('<option>', {
            value: resultado[i].unme_id,
            text: resultado[i].unme_nombre
            }));                
        } 
        
    }).fail(function(respuesta){

    });

    $("#modelo").on("change", function(){
        console.info($(this).val());
        $.ajax({
            url:"../../modelo/modeloDAO/modelo_get_procesos.php",
            type:"POST",
            data:"id="+$(this).val()
            }).done(function(respuesta){  
            console.info(respuesta);
            var resultado = $.parseJSON(respuesta);
            if (resultado.length > 0) {
                console.info(resultado);
                $("#procesos").html("");
                $("#procesos").append(`<div class=" col s12 m12 l12">
                                            <h5 class="center-align" style="color: #2196F3;">Procesos<h5>
                                        </div>
                                        <div class=" col s12 m12 l12">
                                            <table class="centered">
                                            <thead>
                                              <tr>
                                                  <th>Proceso</th>
                                                  <th>Cantidad standar</th>
                                                  <th>Cantidad desperdicio</th>
                                              </tr>
                                            </thead>

                                            <tbody id="proces">
                                              
                                            </tbody>
                                          </table>
                                        </div> `);
                for (var i = 0; i < resultado.length; i++) {
                    $("#proces").append(`<tr>
                                           <td>${resultado[i].prpr_nombre} <input type='text' class="hide" value="${resultado[i].prpr_id} " name='procesos[]' ></td>
                                           <td>
                                                <input type='number' required="true" name='cantidad[]' >
                                            </td>
                                          <td><input type='text' required="true" name='desperdicio[]' ></td>
                                         </tr>`);
                }
            }else{
                $("#procesos").html("");
            }
            
            

        }).fail(function(respuesta){

        });
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