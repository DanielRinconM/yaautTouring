<!DOCTYPE html>

<?php
	include("conexion.php");
	$con = conectar();
?>

<html>
<head>
	<title>YaautTouring</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="Canvas">
		<div class="Header">
			<div id="Fondo"></div>
			<img class="Logo" src="Resources/logo.png">
		</div>

		<form id="formularioPagos" name="formularioPagos" method="post" action="">
			<div id="RegPago">
				<div class="extensor"></div>
				<div id="MensajeReg">
					<h1>Registrar pago</h1>
					<div class="Experience">
						<p>Experiencia:</p>
						<select name="idExperiencia" id="idExperiencia">
							<?php
								$sql = "SELECT experiencias.idExperiencia, experiencias.idCliente, experiencias.pagado, experiencias.descuento,
								clientes.nombre as nombreCliente, clientes.apellidoPaterno,
								eventos.nombreEvento,
								fases.nombre as nombreFase, fases.precio
								FROM experiencias
								INNER JOIN clientes ON experiencias.idCliente=clientes.idCliente 
								INNER JOIN eventos ON experiencias.idEvento=eventos.idEvento 
								INNER JOIN fases ON experiencias.idFase=fases.idFase;";

								$resultado = mysqli_query($con,$sql);
								//$sql = mysqli_query($con, "SELECT idExperiencia, idCliente FROM experiencias");
								while ($row = mysqli_fetch_array($resultado))
								{
									//echo "<option value=\"".$row['idExperiencia']."\">" . $row['idCliente'] ."</option>";

									$descuento = ($row['precio']*$row['descuento'])/100;
									$precioConDescuento =$row['precio'] - $descuento; 
									$debe = $precioConDescuento - $row['pagado'];
									if($debe > 0)
									{
										echo "<option value=\"".$row["idExperiencia"]."\">" 
										. $row['nombreEvento']." - ".$row['nombreFase']
										." | ".$row['nombreCliente']." ".$row['apellidoPaterno']
										." | $".$debe."</option>";
									}
								}
							?>
					</select>
					</div>
					<div class="Pay">
						<p>Monto:</p>
						<input type="text" name="monto">
					</div>
					<div class="Method">
						<p>Método de pago:</p>
						<select name="metodoPago">
							<option>Seleccione una opción</option>
							<option value="efectivo">Efectivo</option>
							<option value="credito">Credito</option>
							<option value="debito">Debito</option>
							<option value="transferencia">Transferencia bancaria</option>
						</select>
					</div>
					<button type="submit" name="submitButton" class="BtnAcept">Aceptar</button>
					<a href="Experiencias.php"><input type="button" class="BtnCancel" value="Cancelar"></a>
				</div>
			</div>
		</form>

		<?php
			include("Back/insertarPago.php");
			if(isset($_POST['submitButton'])){ //check if form was submitted
				insertarPago($con);
				desconectar($con);
			}
		?>

	</div>
</body>
</html>