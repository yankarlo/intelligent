<?php 
include ("modeloDAO.class.php");
session_start();

$_SESSION["modelo"]=array('modelo_id' => $_REQUEST['modelo_id'],
							'modelo_nombre' =>$_REQUEST['modelo_nombre'],
							'modelo_cantidad' => $_REQUEST['modelo_cantidad'],
							'orden_id' =>$_REQUEST['orden_id'],
							'orden_entregada' => $_REQUEST['orden_entregada'],
							'orden_planeada' => $_REQUEST['orden_planeada'],
							'proceso_id' => $_REQUEST['proceso_id'],
							'modelo_proceso' => $_REQUEST['modelo_proceso']);
//$controlador = new OrdenDAO();
//$resultado = $controlador->get_ordenes();
echo json_encode($_SESSION["modelo"]);
?>