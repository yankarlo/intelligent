<?php include("templates/header.php"); ?>
<div class="row">  
    
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div class="row"> 
        
                <div class=" col s12 m12 l12">
                    <h4 class="center-align" style="color: #2196F3;">MODELOS Y MARCAS<h4>
                </div> 
                <!--<div class="col s12 m12 l12 ">
                    <div class="col s12 m2 l1 ">
                        <a class="btn-floating btn-large waves-effect waves-light blue modal-trigger" href="#mod"><i class="material-icons right">add</i>AGREGAR</a>
                    </div>                   
                                       
                </div>-->
            	<div class="col s12 m6 l6"> 
                    <div class="col s12 m12 l12">
                        <div class="col s12 m2 l1 ">
                            <a class="btn-floating btn-large waves-effect waves-light blue modal-trigger tooltipped boton"  tipo="1" data-position="bottom" data-delay="50" data-tooltip="Agregar Proceso" href="#mod">
                                <i class="material-icons right">add</i>AGREGAR
                            </a>
                        </div> 
                        <div class="col s12 m12 l10">
                            <h5 class="center-align" style="color: #2196F3;">MANAGER MODELOS<h5>
                        </div>
                        
                    </div>
                    <div class="col s12 m12 l12">
                        <table id="tablamodelo" class="display centered responsive tabla" cellspacing="0"  >
                            <thead>
                                <tr>
                                    <th>MODELO_ID</th>
                                    <th>MODELO</th>
                                    <th>EDITAR</th>                          
                                </tr>
                            </thead>
                            <tbody>                                      
                            </tbody>
                        </table>
                    </div>                 
                    
                </div> 
                
                <div class="col s12 m6 l6"> 
                    <div class="col s12 m12 l12">
                        <div class="col s12 m12 l11">
                            <h5 class="center-align" style="color: #2196F3;">MANAGER MARCAS<h5>
                        </div>
                         <div class="col s12 m2 l1 ">
                            <a class="btn-floating btn-large waves-effect waves-light blue modal-trigger tooltipped boton" tipo="2" data-position="bottom" data-delay="50" data-tooltip="Agregar Marca" href="#mod">
                                <i class="material-icons right">add</i>AGREGAR
                            </a>
                        </div>
                    </div>
                    <div class="col s12 m12 l12">
                        <table id="tablamarca" class="display centered responsive tabla" cellspacing="0"  >
                            <thead>
                                <tr>
                                    <th>MARCA_ID</th>
                                    <th>MARCA</th>
                                    <th>EDITAR</th>                            
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
            <div class="modal-content" > 
                <div class=" col s12 m12 l12">
                    <h4 class="center-align" id="titulo_modal" style="color: #2196F3;"><h4>
                </div> 
                <hr>
                <div id="contenido_modal" class=" col s12 m12 l12">
                    
                </div>
             
            </div>  
            <div class="modal-footer">
                <a  href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat" >CERRAR</a>
                <button type="submit" class="waves-effect waves-green btn-flat modal-action1 " id='guardar'><i class="material-icons left">control_point</i>GUARDAR</button>
            </div>
        </div>
    </form>
</div>   
<?php include("templates/footer.php"); ?>
<script type="text/javascript" src="../../controlador/marca.js"></script>
