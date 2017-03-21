<?php
require_once("../conexion.class.php");

class MaquinaDAO extends PDO{

	private $con;     
    public function __construct(){
        $this->con = Conexion::singleton_conexion();
    }

    public function get_maquinas(){       
        try {       
            $sql= "SELECT 
                    `maqu_id`,
                    `moma_id`,
                    `marc_id`,
                    `maqu_referencia`,
                    `maqu_nombre`,
                    `marc_nombre`,
                    `moma_nombre`,
                    `maqu_estado`
                    FROM `maqu_maquinas` 
                    INNER JOIN `marc_marcas` ON(`maqu_maquinas`.`maqu_marc_id` = `marc_marcas`.`marc_id`)
                    INNER JOIN `moma_modelo_maquina` ON (`maqu_maquinas`.`maqu_moma_id` = `moma_modelo_maquina`.`moma_id`)";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }  

    public function get_modelos(){       
        try {       
            $sql= "SELECT * FROM `moma_modelo_maquina`";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 

    public function get_marcas(){       
        try {       
            $sql= "SELECT * FROM `marc_marcas`";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 

     public function insert_maquina($nombre, $referencia, $marca, $modelo){       
        try {       
            $sql= "INSERT INTO `maqu_maquinas`(`maqu_empr_id`, 
                                             `maqu_moma_id`, 
                                             `maqu_marc_id`, 
                                             `maqu_referencia`, 
                                             `maqu_nombre`, 
                                             `maqu_estado`) 
                                             VALUES (3, $modelo, $marca, '$referencia', '$nombre', 1)";
            $query = $this->con->prepare($sql);            
            $resultado = $query->execute();
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 

    public function edit_maquina($nombre, $referencia, $marca, $modelo, $id){       
        try {       
            $sql= "UPDATE `maqu_maquinas` 
                    SET `maqu_moma_id`=$modelo,`maqu_marc_id`=$marca,`maqu_referencia`='$referencia',`maqu_nombre`='$nombre'
                    WHERE `maqu_id` = $id";
                                             
            $query = $this->con->prepare($sql);            
            $resultado = $query->execute();
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 

    public function delete_maquina($id){       
        try {       
            $sql= "UPDATE `maqu_maquinas` SET `maqu_estado`= 2 WHERE `maqu_id` = $id";
                                             
            $query = $this->con->prepare($sql);            
            $resultado = $query->execute();
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 
}

?>