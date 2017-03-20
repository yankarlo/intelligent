<?php include("templates/header.php"); ?>
<div class="row">  
    
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div class="row"> 
        
                <div class=" col s12 m12 l12">
                    <h4 class="center-align" style="color: #2196F3;">MANAGER ORDENES<h4>
                </div> 
                <div class="col s12 m12 l12 ">                   
                    <a class="waves-effect waves-light btn blue modal-trigger" href="#crear"><i class="material-icons right">add</i>AGREGAR</a>                   
                </div>
            	<div class="col s12 m12 l12">                  
                    <table id="tablaorden" class="display centered responsive" cellspacing="0"  >
                        <thead>
                            <tr>
                                <th>ORDEN</th>
                                <th>MODELO_ID</th>
                                <th>CLIENTE</th>
                                <th>MODELO</th>
                                <th>PROCESO</th>
                                <th>CANTIDAD</th>
                                <th>ENTREGADO</th>
                                <th>CANTIDAD_ESTANDAR</th>
                                <th>INICIO</th>
                                <th>PROCESO_ID</th>
                                <th>EDITAR</th>
                                <th>VER DETALLE</th>
                                
                            </tr>
                        </thead>
                        <tbody>                                      
                        </tbody>
                    </table>
                </div> 
                 
            </div>              
        </div>
     </div> 
    <form id="evaluacion" action="">            
        <div id="crear" class="modal modal-fixed-footer">
            <div class="modal-content"> 
                <div class=" col s12 m12 l12">
                    <h4 class="center-align" style="color: #2196F3;">CREAR ORDEN<h4>
                </div> 
                <hr>
                <div class=" col s12 m6 l6">
                    <label for='fecha_ini'>FECHA INICIO PLANEADO</label>
                    <input type='text' class='datepicker ' id='fecha_ini' required="true" name='fecha_ini' >
                </div>
                <div class=" col s12 m6 l6">
                    <label for='fecha_fin'>FECHA FIN PLANEADO</label>
                    <input type='text' class='datepicker ' id='fecha_fin' required="true" name='fecha_fin' >
                </div>
                <div class="input-field col s12 m6 l6">
                    <select class='browser-default' id="modelo" required name='modelo'>
                        <option disabled selected value=''>Seleccione Modelo</option>
                    </select>
                </div>
                <div class="input-field col s12 m6 l6">
                    <select class='browser-default' id="medida" required name='medida'>
                        <option disabled selected value=''>Seleccione Medida</option>
                    </select>
                </div>
                <div class="input-field col s12 m12 l12" id="procesos">

                </div>
            </div>  
            <div class="modal-footer">
                <a  href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CERRAR</a>
                <button type="submit" class="waves-effect waves-green btn-flat " id='guardar'><i class="material-icons left">control_point</i>GUARDAR</button>
            </div>
        </div>
    </form>
</div>   
<?php include("templates/footer.php"); ?>
<script type="text/javascript" src="../../controlador/orden.js"></script> 