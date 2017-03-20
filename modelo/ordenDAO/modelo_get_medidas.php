<?php 
include ("ordenDAO.class.php");

$controlador = new OrdenDAO();
$resultado = $controlador->get_medidas();
echo json_encode($resultado);
?>