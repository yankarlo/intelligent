<?php
require_once("../conexion.class.php");

class CapturaDAO extends PDO{

	private $con;     
    public function __construct(){
        $this->con = Conexion::singleton_conexion();
    }

    public function insert_movimiento($orden, $usuario, $maquina, $fecha, $captura, $productividad){       
        try {       
            $sql= "INSERT INTO `moem_movimientos_empleados`(`moem_orpr_id`,`moem_empl_id`,`moem_maqu_id`,`moem_fecha_inicia`,`moem_cantidad`, `moem_productividad`) VALUES ($orden,$usuario,$maquina,'$fecha',$captura,$productividad)";
            $query = $this->con->prepare($sql);
            $query->execute();
            $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
            $this->con->close_con();
            return $resultado;       

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    } 

    public function get_productividad($usuario, $maquina,$orden, $fecha){       
        try {       
            $sql= "SELECT `moem_productividad`, MAX(`moem_id`) FROM `moem_movimientos_empleados` WHERE `moem_empl_id` = $usuario AND `moem_maqu_id` = $maquina AND `moem_orpr_id` = $orden AND `moem_fecha_inicia` = '$fecha' ";
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