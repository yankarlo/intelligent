<?php 
include ("capturaDAO.class.php");
session_start();

echo json_encode($_SESSION["modelo"]);
?>