<?php
    $idExperiencia = $_GET['idExperiencia'];
    include("conexion.php");
    $con = conectar();
	$SQL = "SELECT * FROM pagos WHERE idExperiencia='$idExperiencia';";
    $resultado = consultar($con,$SQL);
    desconectar($con);
    var_dump(mysqli_fetch_row($resultado));
?>
