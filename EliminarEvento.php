<?php
    $Id = $_GET['Id'];
    include("conexion.php");
    $con = conectar();
	$SQL = "DELETE FROM eventos WHERE IdEvento = '$Id'";
    consultar($con,$SQL);
    desconectar($con);
    header('Location: eventos.php');
?>