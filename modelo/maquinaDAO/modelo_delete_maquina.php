<?php 
include ("maquinaDAO.class.php");

$id = $_REQUEST['id'];

$controlador = new MaquinaDAO();
$resultado = $controlador->delete_maquina($id);

echo json_encode($resultado);


?>