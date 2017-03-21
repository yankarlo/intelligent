<?php 
include ("maquinaDAO.class.php");

$nombre = $_REQUEST['nombre'];
$referencia = $_REQUEST['referencia'];
$marca = $_REQUEST['marca'];
$modelo = $_REQUEST['modelo'];
$controlador = new MaquinaDAO();
$resultado = $controlador->insert_maquina($nombre, $referencia, $marca, $modelo);

echo json_encode($resultado);



?>
