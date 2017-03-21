<?php
require_once("../conexion.class.php");

class MarcaDAO extends PDO{

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

    public function get_modelo()
    {
        try {       
            
            $sql = "SELECT * FROM `moma_modelo_maquina`";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insert_modelo($nombre)
    {
        try {              
            $sql = "INSERT INTO `moma_modelo_maquina`(`moma_empr_id`, `moma_nombre`) VALUES (3, '$nombre')";
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

    public function edit_modelo($nombre, $id)
    {
        try {              
            $sql = "UPDATE `moma_modelo_maquina` SET `moma_nombre`='$nombre' WHERE `moma_id` = $id";
            $query = $this->con->prepare($sql);            
            $resultado = $query->execute();
            $this->con->close_con();
            return $sql;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>