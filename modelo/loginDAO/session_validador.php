<?php
/*session_start();
//Evaluo que la sesion continue verificando una de las variables creadas en el control.php, cuando esta ya no coincida con su valor inicial se redirije al archivo salir.php
if (!$_SESSION["autentificado"]) {
	header("location: ../../modelo/loginDAO/session_salir.php");
}*/
/*$url="http://".$_SERVER['PHP_SELF'];
$url=explode('/', $url);
$file = end($url);


	$permisos = explode("|",$_SESSION["usu_info"]["perf_permisos_url"]);

 if (in_array($file, $permisos)) {
 
 	$_SESSION["permisos"] = true;
 }else{
 	$_SESSION["permisos"] = false;
 	
 	//header("location:".$permisos[0]);
 }
?>