<!DOCTYPE html>
<html>
<head>
	<title>YaautTouring</title>
	<link href="Estilos.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Karla&display=swap" rel="stylesheet">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<?php
		include("Back/conexion.php");
		$con = conectar();
	?>
	<div class="Canvas">
		<div class="Header">
			<input type="checkbox" id="Check">
			<label for="Check" class="IconMenu" onclick="cambio()"><img id="MenuImg" src="Resources/menu.png"></label>

			<!-- AQUI INICIA EL MENU LATERAL -->

			<nav class="Menu">
				<button id="Btn" class="Clientes" onclick="document.location='Clientes.php'">
					Clientes
				</button>
				<button id="Btn" class="Transportes" onclick="document.location='Transportes.php'">
					Transportes
				</button>
				<button id="Btn" class="Experiencias" onclick="document.location='Experiencias.php'">
					Experiencias
				</button>
				<button id="Btn" class="Eventos" onclick="document.location='Eventos.php'">
					Eventos
				</button>
				<button id="Btn" class="LogOut" onclick="document.location='Login.php'">
					Cerrar Sesión
				</button>
			</nav>

			<!-- AQUI TERMINA EL MENU LATERAL -->

			<div id="Fondo"></div>
			<img class="Logo" src="Resources/logo.png">
		</div>

		<!-- AQUI INICIA EL FORMULARIO DE ENTRADA DE DATOS -->
		<form id="formularioExperiencias" name="formularioExperiencias" method="post" action="">
			<span class="RegExperiencia">
				<h1>Registro de experiencia</h1>
				<div class="Event">
					<p>Evento:</p>
					<select name="idEvento" id="idEvento">
						<?php
							$now = date('Y-m-d');
							$sql = mysqli_query($con, "SELECT nombreEvento, idEvento FROM eventos WHERE fechaInicio > '$now'");
							while ($row = $sql->fetch_assoc()){
								echo "<option value=\"".$row['idEvento']."\">" . $row['nombreEvento']."</option>";
							}
						?>
				</select>
				</div>
				<div class="Client">
					<p>Cliente:</p>
					<select name="idCliente">
						<?php
						$sql = mysqli_query($con, "SELECT nombre, apellidoPaterno, idCliente FROM clientes");
						while ($row = $sql->fetch_assoc()){
							echo "<option value=\"".$row['idCliente']."\">" . $row['nombre'] ." ".$row['apellidoPaterno']."</option>";
						}
						?>
				</select>
				</div>
				<div class="Discount">
					<p>Descuento (%):</p>
					<input type="number" name="descuento" min="0" max="100" value=0>
				</div>
				<!--
				<div class="Fase">
					<p>Fase:</p>
					<select name="inputFase">
						<option>Seleccione una opción</option>
					</select>
				</div>
				<div class="DateEnd">
					<p>Fecha límite de pago:</p>
					<input type="date" name="inputEnd">
				</div>-->
				<button class="BtnAcept" type="submit" name="submitButton">Aceptar</button>
			</span>
		</form>
		<!-- AQUI TERMINA EL FORMULARIO DE ENTRADA DE DATOS -->

		<div id="Pantalla">
			<div class="extensor"></div>
			<div id="Mensaje">
				<h1>Eliminar registro</h1>
				<div class="Contenido">
					<p>¿Está seguro de querer eliminar este registro?.</p>
				</div>
				<button class="BtnAcept">Aceptar</button>
				<button class="BtnCancel" onclick="Cerrar('Pantalla')">Cancelar</button>
			</div>
		</div>

		<div id="RegPago">
			<div class="extensor"></div>
			<div id="MensajeReg">
				<h1>Registrar pago</h1>
				<div class="Pay">
					<p>Monto:</p>
					<input type="text" name="inputPay">
				</div>
				<div class="Method">
					<p>Método de pago:</p>
					<select name="inputMethod">
						<option>Seleccione una opción</option>
					</select>
				</div>
				<button class="BtnAcept">Aceptar</button>
				<button class="BtnCancel" onclick="Cerrar('RegPago')">Cancelar</button>
			</div>
		</div>

		<div id="ShPago">
			<div class="extensor"></div>
			<div id="MensajeSh">
				<h1>Ver pagos</h1>
				<p>Ejemplo1 - EventoEJ 1</p>
				<table class="TabPay">
					<tr>
						<th>Monto</th>
						<th>Metódo de pago</th>
						<th>Fecha del pago</th>
					</tr>
					<tr>
						<td>Prueba M</td>
						<td>Prueba Me</td>
						<td>Prueba F</td>
					</tr>
				</table>
				<button class="BtnAcept" onclick="Cerrar('ShPago')">Aceptar</button>
			</div>
		</div>

		<span class="Experiencia">
			<h1>Experiencias</h1>
			<!-- Busqueda
			<div class="Search">
				<input type="input" name="inputSearch" class="SearchBar">
				<button class="BtnSearch">Buscar</button>
			</div>
			-->
			<?php
				include("Back/insertarExperiencia.php");
				include("Back/mostrarExperiencias.php");
				if(isset($_POST['submitButton'])){ //check if form was submitted
				    insertarExperiencia($con);
				}
			?>
				<?php
					mostrarExperiencias($con);
					desconectar($con);
				?>
		</span>
		</span>
	</div>
</body>
<script src="Funciones.js"></script>
</html>
