<?php 
include ("maquinaDAO.class.php");

$controlador = new MaquinaDAO();
$resultado = $controlador->get_modelos();
echo json_encode($resultado);
?>