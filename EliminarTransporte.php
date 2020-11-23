<?php
    $Id = $_GET['Id'];
    include("conexion.php");
    $con = conectar();
	$SQL = "DELETE FROM transportes WHERE IdTransporte = '$Id'";
    consultar($con,$SQL);
    desconectar($con);
    header('Location: transportes.php');
?>