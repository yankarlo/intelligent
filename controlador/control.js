$(document).on("ready", function () {
	
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
        url:"../modelo/ordenDAO/modelo_get_ordenes.php",
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
				'<a class="btn-floating btn-small waves-effect waves-light cyan-1 modal-trigger comenzar blue" ><i class="material-icons">add</i></a>'
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
	        url:"../modelo/modeloDAO/modelo_get_modelo.php",
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

    $('select').material_select();

});