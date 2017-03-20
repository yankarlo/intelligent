<?php 
include ("modeloDAO.class.php");

$ref = $_REQUEST['ref'];
$controlador = new ModeloDAO();
$resultado = $controlador->get_modelos($ref);
echo json_encode($resultado);
?>