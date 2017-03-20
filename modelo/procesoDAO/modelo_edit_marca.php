<?php 
include ("procesoDAO.class.php");

$nombre = $_REQUEST['nombre'];
$id = $_REQUEST['id'];

$controlador = new ProcesoDAO();
$resultado = $controlador->edit_marca($nombre, $id);

echo json_encode($resultado);


?>
