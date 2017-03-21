<?php 
include ("marcaDAO.class.php");

$nombre = $_REQUEST['nombre'];
$id = $_REQUEST['id'];

$controlador = new MarcaDAO();
$resultado = $controlador->edit_marca($nombre, $id);

echo json_encode($resultado);


?>
