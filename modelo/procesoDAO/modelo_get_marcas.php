<?php 
include ("procesoDAO.class.php");

$controlador = new ProcesoDAO();
$resultado = $controlador->get_marcas();
echo json_encode($resultado);
?>