<?php 
include ("procesoDAO.class.php");

$controlador = new ProcesoDAO();
$resultado = $controlador->get_procesos();
echo json_encode($resultado);
?>