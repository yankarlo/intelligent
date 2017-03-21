<?php 
include ("marcaDAO.class.php");

$controlador = new MarcaDAO();
$resultado = $controlador->get_modelo();
echo json_encode($resultado);
?>