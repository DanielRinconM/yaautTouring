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
			<th> Monto </th>
			<th> Método </th>
			<th> Fecha </th>
			<th></th>";
			$env="Envanecer('Pantalla')";
			$b = "basura";
			$dir = "./Resources/basura.png";
			$name="basuraButton";
			echo"
        	<th><a href=EliminarPago.php?Id=$Fila[0]><img id=$b src=$dir name=$name></th>
		</tr>";

	while ($row = mysqli_fetch_array($resultado))
	{
		echo "<tr>
		<td>".$row['monto']."</td>
		<td>".$row['método']."</td>
		<td>".$row['fechaPago']."</td>
		</tr>";
	}
	echo "</table>";
?>
