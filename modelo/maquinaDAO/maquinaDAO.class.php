<?php
require_once("../conexion.class.php");

class MaquinaDAO extends PDO{

	private $con;     
    public function __construct(){
        $this->con = Conexion::singleton_conexion();
    }

    public function get_maquinas(){       
        try {       
            $sql= "SELECT * FROM maqu_maquinas";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }  
}

?>