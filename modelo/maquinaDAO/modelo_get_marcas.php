<?php 
include ("maquinaDAO.class.php");

$controlador = new MaquinaDAO();
$resultado = $controlador->get_marcas();
echo json_encode($resultado);
?>