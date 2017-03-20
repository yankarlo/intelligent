<?php
require_once("../conexion.class.php");

class LoginDAO extends PDO{

	  private $con;     
    public function __construct(){
        $this->con = Conexion::singleton_conexion();
    }

    public function get_datos_login($usuario,$pass){       
        try {       
            $sql= "SELECT 
                    `esta_id`,
                    `perf_id`,
                    `empl_nombre`,
                    `empl_id`,
                    `perf_id`
                    FROM
                    empl_empleados
                    WHERE   
                    `empl_nit` = '$usuario' AND `empl_password` = '$pass'";
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