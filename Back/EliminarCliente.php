<?php
$Id = $_GET['Id'];
include("conexion.php");
$con = conectar();
$SQL = "DELETE FROM clientes WHERE IdCliente = '$Id'";
consultar($con,$SQL);
desconectar($con);
header('Location: ../Clientes.php');
?>
