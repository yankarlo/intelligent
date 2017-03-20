<?php
include_once("loginDAO.class.php");

$usuario = $_REQUEST["usuario"];
$pass = $_REQUEST["contrasena"];
$maquina = $_REQUEST["maquina"];

$controlador = new LoginDAO();
$resultado = $controlador->get_datos_login($usuario,$pass);
 
 if (sizeof($resultado)>0) {
 	
 	session_start();
 	
 	$_SESSION["autentificado"] = true;
    $_SESSION["usu_info"]= array();
    $_SESSION["usu_info"]= $resultado[0];
    $_SESSION["usu_info"]['maquina']= $_REQUEST["maquina"];
    
    echo json_encode($resultado);

 }else{
 
 	echo json_encode(false);
 }




?>