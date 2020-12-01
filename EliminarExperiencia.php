<?php
    $Id = $_GET['Id'];
    include("conexion.php");
    $con = conectar();
	$SQL = "DELETE FROM experiencias WHERE IdExperiencia = '$Id'";
    consultar($con,$SQL);
    desconectar($con);
    header('Location: ../Experiencias.php');
?>
