<?php 
include ("ordenDAO.class.php");
session_start();

$fecha_inicio = $_REQUEST['fecha_inicio'];
$captura = $_REQUEST['captura'];
$proceso = $_SESSION['modelo']['proceso_id'];
$orden = $_SESSION["modelo"]['orden_id'];
$entregada = $_SESSION["modelo"]['orden_entregada'];
$controlador = new OrdenDAO();
$resultado = $controlador->update_orden($captura + $entregada, $orden,$proceso);
$_SESSION["modelo"]['orden_entregada'] = $captura + $entregada;
echo json_encode($captura + $entregada);

?>