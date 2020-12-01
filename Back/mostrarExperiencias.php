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
  $class="TabExp";
	echo "<table class=".$class.">
		<tr>
		<th> Cliente </th>
			<th> Evento </th>
			<th> Fase </th>
			<th> Pagado </th>
			<th> Pendiente </th>
			<th> </th>
      <th> </th>
			<th> </th>
		</tr>";
    $env="Envanecer('RegPago')";
    $b = "basura";
    $dir = "./Resources/basura.png";
    $class = "BtnRegPay";
	while ($row = mysqli_fetch_array($resultado))
	{
		$descuento = ($row['precio']*$row['descuento'])/100;
		$precioConDescuento =$row['precio'] - $descuento;
		$debe = $precioConDescuento - $row['pagado'];

		echo "<tr>
      		<td>".$row['nombreCliente']." ".$row['apellidoPaterno']."</td>
      		<td>".$row['nombreEvento']."</td>
      		<td>".$row['nombreFase']."</td>
      		<td>".$row['pagado']."</td>
      		<td>".$debe."</td>";
    $env="Envanecer('RegPago')";
    print("<td><button class=$class onclick=$env>Registrar pago</button></td>");
    $env="Envanecer('ShPago')";
    $class = "BtnShPay";
    print("<td><button class=$class onclick=$env>Ver pagos</button></td>");
    $env="Envanecer('Pantalla')";
    print("<td><a href=Back/EliminarExperiencia.php?Id=".$row['idExperiencia']."><img id=$b src=$dir></td>");
    print("</tr>");
	}
	echo "</table>";
    }
}
?>
