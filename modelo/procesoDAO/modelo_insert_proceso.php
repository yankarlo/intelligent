<?php 
include ("procesoDAO.class.php");

$nombre = $_REQUEST['nombre'];

$controlador = new ProcesoDAO();
$resultado = $controlador->insert_proceso($nombre);

echo json_encode($resultado);


?>