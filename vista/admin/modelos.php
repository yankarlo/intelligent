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
                    <table id="tablamodelo" class="display centered responsive" cellspacing="0"  >
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>CLIENTE</th>
                                <th>MODELO</th>
                                <th>PRENDA</th>
                                <th>UNIDAD DE MEDIDA</th>                                
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
                    <h4 class="center-align" style="color: #2196F3;">CREAR MODELO<h4>
                </div> 
                <hr>
                
            </div>  
            <div class="modal-footer">
                <a  href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CERRAR</a>
                <button type="submit" class="waves-effect waves-green btn-flat tooltipped" id='guardar'><i class="material-icons left">control_point</i>GUARDAR</button>
            </div>
        </div>
    </form>
</div>   
<?php include("templates/footer.php"); ?>
<script type="text/javascript" src="../../controlador/modelo.js"></script> 