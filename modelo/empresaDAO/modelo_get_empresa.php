<?php 
include ("empresaDAO.class.php");

$controlador = new EmpresaDAO();
$resultado = $controlador->get_empresas();
echo json_encode($resultado);
?>