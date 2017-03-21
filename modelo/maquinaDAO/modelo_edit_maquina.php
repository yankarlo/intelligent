<?php 
include ("maquinaDAO.class.php");

$id = $_REQUEST['id_maquina'];
$nombre = $_REQUEST['nombre'];
$referencia = $_REQUEST['referencia'];
$marca = $_REQUEST['marca'];
$modelo = $_REQUEST['modelo'];
$controlador = new MaquinaDAO();
$resultado = $controlador->edit_maquina($nombre, $referencia, $marca, $modelo, $id);

echo json_encode($resultado);



?>
