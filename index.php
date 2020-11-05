<?php
include("conexion.php");
$Test = Conectar();
echo "Info del host: ".mysqli_get_host_info($Test);

Desconectar($Test);
?>
