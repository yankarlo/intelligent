<?php 
include ("marcaDAO.class.php");

$nombre = $_REQUEST['nombre'];

$controlador = new MarcaDAO();
$resultado = $controlador->insert_modelo($nombre);

echo json_encode($resultado);


?>