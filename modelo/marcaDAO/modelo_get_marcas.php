<?php 
include ("marcaDAO.class.php");

$controlador = new MarcaDAO();
$resultado = $controlador->get_marcas();
echo json_encode($resultado);
?>