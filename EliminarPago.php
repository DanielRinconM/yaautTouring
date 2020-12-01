<?php
    $Id = $_GET['Id'];
    include("conexion.php");
    $con = conectar();
	$SQL = "DELETE FROM pagos WHERE IdPago = '$Id'";
    consultar($con,$SQL);
    desconectar($con);
    header('Location: ../Pagos.php');
?>
