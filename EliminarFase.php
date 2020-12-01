<?php
    $Id = $_GET['Id'];
    include("conexion.php");
    $con = conectar();
	$SQL = "DELETE FROM fases WHERE IdFase = '$Id'";
    consultar($con,$SQL);
    desconectar($con);
    header('Location: ../Fases.php');
?>
