<?php
require_once("../conexion.class.php");

class ProcesoDAO extends PDO{

	private $con;     
    public function __construct(){
        $this->con = Conexion::singleton_conexion();
    }

    public function get_marcas()
    {
        try {       
            
            $sql = "SELECT * FROM marc_marcas";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function get_procesos()
    {
        try {       
            
            $sql = "SELECT * FROM prpr_procesos_produccion";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert_proceso($nombre)
    {
        try {              
            $sql = "INSERT INTO `prpr_procesos_produccion`(`prpr_nombre`) VALUES ('$nombre')";
            $query = $this->con->prepare($sql);            
            $resultado = $query->execute();
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert_marca($nombre)
    {
        try {              
            $sql = "INSERT INTO `marc_marcas`(`marc_empr_id`, `marc_nombre`) VALUES (3,'$nombre')";
            $query = $this->con->prepare($sql);            
            $resultado = $query->execute();
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function edit_marca($nombre, $id)
    {
        try {              
            $sql = "UPDATE `marc_marcas` SET `marc_nombre`= '$nombre' WHERE `marc_id`=$id";
            $query = $this->con->prepare($sql);            
            $resultado = $query->execute();
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function edit_proceso($nombre, $id)
    {
        try {              
            $sql = "UPDATE `prpr_procesos_produccion` SET `prpr_nombre`='$nombre' WHERE `prpr_id`=$id";
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