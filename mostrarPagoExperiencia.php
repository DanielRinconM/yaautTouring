<?php
	include("conexion.php");
	$con = conectar();
        $idExperiencia = $_GET['idExperiencia'];
	$sql = "SELECT experiencias.idExperiencia, pagos.monto, pagos.método, pagos.fechaPago	
		FROM experiencias
		INNER JOIN pagos ON experiencias.idExperiencia=pagos.idPago;";

	$resultado = mysqli_query($con,$sql);
	echo "<h1>Pagos</h1>";
	echo "<table style=\"border:1px solid black;width:100%\">
		<tr>
			<th style='border:1px solid black'> Monto </th style='border:1px solid black'>
			<th style='border:1px solid black'> Método </th style='border:1px solid black'>
			<th style='border:1px solid black'> Fecha </th style='border:1px solid black'>
		</tr>";

	while ($row = mysqli_fetch_array($resultado))
	{
		echo "<tr>
		<td style='border:1px solid black'>".$row['monto']."</td style='border:1px solid black'>
		<td style='border:1px solid black'>".$row['método']."</td style='border:1px solid black'>
		<td style='border:1px solid black'>".$row['fechaPago']."</td style='border:1px solid black'>
		</tr>";
	}
	echo "</table>";
	$n = mysqli_num_rows($resultado);
	print("Número total de registros: ".$n);
?>
