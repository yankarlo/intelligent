<?php include("templates/header.php"); ?>


<div class="row">  
    
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <div class="row"> 
        
                <div class=" col s12 m12 l12">
                    <h4 class="center-align" style="color: #2196F3;">CONTROL INTELIGENTE<h4>
                </div>      
                      
            
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">search</i>
                    <input id="buscar" type="text" >
                    <label for="buscar">Buscar</label>
                </div>
                    
                <div class="col s12 m12 l12">                  
                    <table id="tablaorden" class="display centered responsive" cellspacing="0" width="100%" >
                        <thead>
                            <tr>
                                <th>ORDEN</th>
                                <th>MODELO_ID</th>
                                <th>CLIENTE</th>
                                <th>MODELO</th>
                                <th>CANTIDAD</th>
                                <th>% ENTREGADO</th>
                                <th>INICIO</th>
                                <th>EMPEZAR</th>
                                
                                
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
         
         

<?php include("templates/footer.php"); ?>
<script type="text/javascript" src="../controlador/control.js"></script> 