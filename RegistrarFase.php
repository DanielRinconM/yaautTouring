<!doctype html>

<?php
	include("Back/conexion.php");
	$con = conectar();
	$SQL = "SELECT idEvento, nombreEvento FROM eventos";
	$Consulta = consultar($con, $SQL);
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

		<form id="formularioFases" name="formularioFases" method="post" action="">
				<div class="extensor"></div>
				<div id="RegistroFase">
					<h1>Registro de fase</h1>
					<div class="Event">
						<p>Evento:</p>
						<select name="evento">
							<option>Seleccione una opción</option>
							<?php
								while ($datos = mysqli_fetch_array($Consulta))
								{
							?>
									<option value="<?php echo $datos['nombreEvento']?>"> <?php echo $datos['nombreEvento']?> </option>
							<?php 
								}
							?>
						</select>
					</div>
					<div class="DateEnd">
						<p>Fecha de finzalización:</p>
						<input type="date" name="fechaFinal">
					</div>
					<div class="Name">
						<p>Nombre:</p>
						<input type="text" name="nombreFase">
					</div>
					<div class="Price">
						<p>Precio:</p>
						<input type="text" name="precio">
					</div>
						<button type="submit" name="submitButton" class="BtnAcept">Aceptar</button>
						<a href="Eventos.php"><input type="button" class="BtnCancel" value="Cancelar"></a>
			</div>
		</form>

		<?php
			include("Back/insertarFase.php");
			if(isset($_POST['submitButton'])){ //check if form was submitted
				insertarFase($con);
				desconectar($con);
			}
		?>

	</div>
</body>
</html>