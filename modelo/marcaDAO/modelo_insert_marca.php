<?php 
include ("marcaDAO.class.php");

$nombre = $_REQUEST['nombre'];

$controlador = new MarcaDAO();
$resultado = $controlador->insert_marca($nombre);

echo json_encode($resultado);


?>