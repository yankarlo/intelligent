<?php 
include ("maquinaDAO.class.php");

$controlador = new MaquinaDAO();
$resultado = $controlador->get_maquinas();
echo json_encode($resultado);
?>