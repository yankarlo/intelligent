<?php 
include ("capturaDAO.class.php");
session_start();

$maquina = $_SESSION['usu_info']['maquina'];
$usuario = $_SESSION['usu_info']['empl_id'];
$orden = $_SESSION["modelo"]['orden_id'];
$fecha_inicio = $_REQUEST['fecha_inicio'];
$controlador = new CapturaDAO();

$resultado = $controlador->get_productividad($usuario, $maquina,$orden, $fecha_inicio);
echo json_encode($resultado);
?>