<?php
  $Id = $_GET['Id'];
  include("conexion.php");
  $con = conectar();
  $SQL = "DELETE FROM eventos WHERE nombreEvento = '$Id'";
  consultar($con,$SQL);
  desconectar($con);
  header('Location: ../Eventos.php');
?>
