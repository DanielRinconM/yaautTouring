<?php
function mostrarExperiencias($con){
    if(isset($_POST['buscarButton']))
    { //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT * FROM clientes WHERE nombre LIKE '$buscar%' 
		OR apellidoPaterno LIKE '$buscar%' 
		OR apellidoMaterno LIKE '$buscar%' 
		OR fechaNacimiento LIKE '$buscar%' 
		OR telefono LIKE '$buscar%' 
		OR correoElectronico LIKE '$buscar%' 
		OR estado LIKE '$buscar%' 
		ORDER BY nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento DESC, estado";
    }
    else
    {

	$sql = "SELECT experiencias.idExperiencia, experiencias.idCliente, experiencias.pagado, experiencias.descuento,
		clientes.nombre as nombreCliente, clientes.apellidoPaterno,
		eventos.nombreEvento,
		fases.nombre as nombreFase, fases.precio
		FROM experiencias
		INNER JOIN clientes ON experiencias.idCliente=clientes.idCliente 
		INNER JOIN eventos ON experiencias.idEvento=eventos.idEvento 
		INNER JOIN fases ON experiencias.idFase=fases.idFase;";

	$resultado = mysqli_query($con,$sql);

	echo "<table style=\"border:1px solid black;width:100%\">
		<tr>
		<th style='border:1px solid black'> Cliente </th style='border:1px solid black'>
			<th style='border:1px solid black'> Evento </th style='border:1px solid black'>
			<th style='border:1px solid black'> Fase </th style='border:1px solid black'>
			<th style='border:1px solid black'> Pagado </th style='border:1px solid black'>
			<th style='border:1px solid black'> Pendiente </th style='border:1px solid black'>
			<th style='border:1px solid black'> Ver pagos </th style='border:1px solid black'>
			<th style='border:1px solid black'> Editar </th style='border:1px solid black'>
			<th style='border:1px solid black'> Borrar </th style='border:1px solid black'>
		</tr>";

	while ($row = mysqli_fetch_array($resultado))
	{
		$descuento = ($row['precio']*$row['descuento'])/100;
		$precioConDescuento =$row['precio'] - $descuento; 
		$debe = $precioConDescuento - $row['pagado'];

		echo "<tr>
		<td style='border:1px solid black'>".$row['nombreCliente']." ".$row['apellidoPaterno']."</td style='border:1px solid black'>
		<td style='border:1px solid black'>".$row['nombreEvento']."</td style='border:1px solid black'>
		<td style='border:1px solid black'>".$row['nombreFase']."</td style='border:1px solid black'>
		<td style='border:1px solid black'>".$row['pagado']."</td style='border:1px solid black'>
		<td style='border:1px solid black'>".$debe."</td style='border:1px solid black'>
		<td style='border:1px solid black'>Ver Pagos</td style='border:1px solid black'>
		<td style='border:1px solid black'>Editar</td style='border:1px solid black'>
		<td style='border:1px solid black'>Borrar</td style='border:1px solid black'>
		</tr>";
	}
	echo "</table>";
	$n = mysqli_num_rows($resultado);
	print("Número total de registros: ".$n);
    }
}
?>
