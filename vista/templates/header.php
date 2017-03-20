<?php 
//include("../modelo/loginDAO/session_validador.php");

session_start();
?>
<!DOCTYPE html>
    <html>
        <head>      
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <title>Intelligent Plant</title>           
            <link type="text/css" rel="stylesheet" href="../artefactos/materializecss/css/estilo.css"/>
            <link type="text/css" rel="stylesheet" href="../artefactos/materializecss/css/materialize.css"  media="screen,projection"/>
            <link type="text/css" rel="stylesheet" href="../artefactos/materializecss/css/dataTable.css"  media="screen,projection"/> 
            <link type="text/css" rel="stylesheet" href="../artefactos/materializecss/css/responsive.css"  media="screen,projection"/> 
            <link type="text/css" rel="stylesheet" href="../artefactos/materializecss/css/sweetalert.css"  media="screen,projection"/> 
            <!--<link rel="icon" type="image/png" sizes="32x32" href="../artefactos/img/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="../artefactos/img/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="16x16" href="../artefactos/img/favicon-16x16.png">-->      
        </head>
        <body > 
        <main>
           <div class="navbar-fixed">
                        <nav>
                              <div class="nav-wrapper  grey darken-2">

                                <a href="home.php"><img src="../artefactos/img/intradeco.png" style=" height: 100%; padding: 2px 2px 2px 11px;"></a>
                                <ul id="nav-mobile" class="right hide-on-med-and-down">     
                                    <li><?=$_SESSION['usu_info']["empl_nombre"]?></li>          
                                   <li id="salir"><a ><i class="material-icons left">settings_power</i>CERRAR SESSION</a></li>                                       
                                </ul>   
                            </div>
                        </nav>
            </div>  
