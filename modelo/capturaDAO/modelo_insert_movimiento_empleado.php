<?php 
include ("capturaDAO.class.php");
session_start();

$fecha_inicio = $_REQUEST['fecha_inicio'];
$captura = $_REQUEST['captura'];
$maquina = $_SESSION['usu_info']['maquina'];
$usuario = $_SESSION['usu_info']['empl_id'];
$orden = $_SESSION["modelo"]['orden_id'];
$modelo = $_SESSION["modelo"]['modelo_cantidad'];
$productividad = $captura/$modelo;
$controlador = new CapturaDAO();
$resultado = $controlador->insert_movimiento($orden, $usuario, $maquina, $fecha_inicio, $captura, $productividad*100);

echo json_encode($productividad*100);


?>