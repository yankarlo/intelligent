<?php 
include ("ordenDAO.class.php");

$controlador = new OrdenDAO();
$resultado = $controlador->get_ordenes();
echo json_encode($resultado);
?>