<?php
require_once("../conexion.class.php");

class ModeloDAO extends PDO{

	private $con;     
    public function __construct(){
        $this->con = Conexion::singleton_conexion();
    }   

    public function get_modelos($ref){       
        try {    
            if ($ref == 0) {
                $sql = "SELECT * FROM `mopr_modelo_produccion`";
            }elseif ($ref == 1) {
                $sql = " SELECT * FROM `mopr_modelo_produccion`
                    INNER JOIN `clie_clientes` ON (`mopr_modelo_produccion`.`mopr_clie_id`= `clie_clientes`.`clie_id`) 
                    INNER JOIN `unme_unidad_medida` ON (`mopr_modelo_produccion`.`mopr_unme_id` =  `unme_unidad_medida`.`unme_id`)";
            } 
            
            $query = $this->con->prepare($sql);
             $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 

    public function get_procesos($id){       
        try {            
            
            $sql = "SELECT `prpr_id`,`prpr_nombre` FROM `mopr_modelo_produccion`
                    INNER JOIN `prmo_proceso_modelo` ON (`prmo_proceso_modelo`.`prmo_mopr_id` =  `mopr_modelo_produccion`.`mopr_id`)
                    INNER JOIN `prpr_procesos_produccion` ON (`prmo_proceso_modelo`.`prmo_prpr_id`=  `prpr_procesos_produccion`.`prpr_id`)
                    WHERE `mopr_modelo_produccion`.`mopr_id` =  $id";
            
            
            $query = $this->con->prepare($sql);
             $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }    

}

?>