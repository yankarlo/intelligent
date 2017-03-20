<?php 
include ("modeloDAO.class.php");

$id = $_REQUEST['id'];
$controlador = new ModeloDAO();
$resultado = $controlador->get_procesos($id);
echo json_encode($resultado);
?>