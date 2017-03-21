<?php include("templates/header.php"); ?>
<div class="row">  
    
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div class="row"> 
        
                <div class=" col s12 m12 l12">
                    <h4 class="center-align" style="color: #2196F3;">MANAGER MAQUINAS</h4>
                </div> 
                 <div class="col s12 m12 l12 ">                   
                    <a class="waves-effect waves-light btn blue modal-trigger boton" tipo="1" href="#mod" id="crear"><i class="material-icons right">add</i>AGREGAR</a>                   
                </div>
                <div class="col s12 m12 l12">                  
                    <table id="tablamaquina" class="display centered responsive" cellspacing="0" width="100%" >
                        <thead>
                            <tr>                                
                                <th>MAQUINA_ID</th>
                                <th>REFERENCIA</th>
                                <th>MAQUINA</th>
                                <th>MODELO_ID</th>
                                <th>MODELO</th>
                                <th>MARCA_ID</th>
                                <th>MARCA</th>
                                <th>ESTADO_ID</th>
                                <th>ESTADO</th>
                                <th>EDITAR</th>
                                <th>ELIMINAR</th>                              
                                
                            </tr>
                        </thead>
                        <tbody>                                      
                        </tbody>
                    </table>
                </div> 
             
            </div>
        </div>
    </div>    
</div>   

<form id="form" action="">            
        <div id="mod" class="modal modal-fixed-footer">
            <div class="modal-content">
            <div class="row">
            	<div class=" col s12 m12 l12">
                    <h4 class="center-align" style="color: #2196F3;" id="titulo_modal"><h4>
                </div> 
                <hr>
                <div class="input-field col s6 m6 l6">
                    <label for='referencia' class="label">REFERENCIA</label>
                    <input type='text'  id='referencia' required="true" name='referencia' >
                </div>
                <div class="input-field col s12 m6 l6">
                    <label for='nombre' class="label">NOMBRE</label>
                    <input type='text'  id="nombre" required="true" name='nombre' >
                </div>
                <div class="input-field col s12 m6 l6">
                    <select class='browser-default' id="marca" required name='marca'>
                        <option disabled selected value=''>Seleccione Marca</option>
                    </select>
                </div>
                <div class="input-field col s12 m6 l6">
                    <select class='browser-default' id="modelo" required name='modelo'>
                        <option disabled selected value=''>Seleccione Modelo</option>
                    </select>
                </div>
                
            </div> 
                
            </div>  
            <div class="modal-footer">
                <a  href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CERRAR</a>
                <button type="submit" class="waves-effect waves-green btn-flat " id='guardar'><i class="material-icons left">control_point</i>GUARDAR</button>
            </div>
        </div>
    </form>
<?php include("templates/footer.php"); ?>
<script type="text/javascript" src="../../controlador/maquina.js"></script>