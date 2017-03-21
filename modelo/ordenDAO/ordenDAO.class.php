<?php
require_once("../conexion.class.php");

class OrdenDAO extends PDO{

	private $con;     
    public function __construct(){
        $this->con = Conexion::singleton_conexion();
    }

    public function get_ordenes(){       
        try {       
            
            $sql = "SELECT
                    `mopr_id`,
                    `mopr_nombre`,
                    `orpr_id`,
                    `clie_nombre`,
                    `orpr_fecha_planeada_inicio`,
                    `orpr_cantidad_planeada`,
                    `orpr_porcentaje_cumplimiento`
                    FROM
                    orpr_ordenes_produccion
                    INNER JOIN `mopr_modelo_produccion` ON ( `mopr_modelo_produccion`.`mopr_id`= `orpr_ordenes_produccion`.`orpr_mopr_id`)
                    INNER JOIN `clie_clientes` ON (`mopr_modelo_produccion`.`mopr_clie_id`= `clie_clientes`.`clie_id`)  ";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }  

    public function update_orden($cantidad, $orden, $proceso){       
        try {       
            $sql = "UPDATE `ormo_orden_modelo` SET `ormo_cantidad_entregada`= $cantidad WHERE `prpr_id`= $proceso AND `ormo_orpr_id`= $orden";
            $query = $this->con->prepare($sql);
            $resultado = $query->execute();
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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

    public function get_medidas(){       
        try {       
            $sql = "SELECT * FROM `unme_unidad_medida`";
            $query = $this->con->prepare($sql);
             $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

     public function insert_orden($fecha_inicio, $fecha_fin, $medida){       
        try {       
            $sql = "INSERT INTO `orpr_ordenes_produccion`(`orpr_esta_id`, `orpr_fecha_planeada_inicio`, `orpr_fecha_planeada_fin`, `orpr_unme_id`) VALUES (1,'$fecha_inicio','$fecha_fin',$medida)";
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