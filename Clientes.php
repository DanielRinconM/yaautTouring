<!doctype html>
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
		<form id="formularioClientes" name="formularioClientes" method="post" action="">
				<span class="RegCliente">
					<h1>Registro de cliente</h1>
					<div class="Name">
						<p>Nombre:</p>
						<input type="text" name="nombre">
					</div>
					<div class="FName">
						<p>Apellido paterno:</p>
						<input type="text" name="apellidoPaterno">
					</div>
					<div class="LName">
						<p>Apellido materno:</p>
						<input type="text" name="apellidoMaterno">
					</div>
					<div class="Birthday">
						<p>Fecha de nacimiento:</p>
						<input type="date" name="fechaNacimiento">
					</div>
					<div class="Phone">
						<p>Teléfono:</p>
						<input type="text" name="telefono">
					</div>
					<div class="Email">
						<p>Correo electrónico:</p>
						<input type="text" name="correoElectronico">
					</div>
					<div class="Location">
						<p>Estado:</p>
						<select name="estado" required>
							<option>Seleccione una opción</option>
												<option value="Aguascalientes">Aguascalientes</option>
		                    <option value="Baja California Norte">Baja California Norte</option>
		                    <option value="Baja California Sur">Baja California Sur</option>
		                    <option value="Campeche">Campeche</option>
		                    <option value="Chiapas">Chiapas</option>
		                    <option value="Chihuahua">Chihuahua</option>
		                    <option value="Ciudad de México">Ciudad de México</option>
		                    <option value="Coahuila">Coahuila</option>
		                    <option value="Colima">Colima</option>
		                    <option value="Durango">Durango</option>
		                    <option value="Estado de México">Estado de México</option>
		                    <option value="Guanajuato">Guanajuato</option>
		                    <option value="Guerrero">Guerrero</option>
		                    <option value="Hidalgo">Hidalgo</option>
		                    <option value="Jalisco">Jalisco</option>
		                    <option value="Michoacán">Michoacán</option>
		                    <option value="Morelos">Morelos</option>
		                    <option value="Nayarit">Nayarit</option>
		                    <option value="Nuevo León">Nuevo León</option>
		                    <option value="Oaxaca">Oaxaca</option>
		                    <option value="Puebla">Puebla</option>
		                    <option value="Querétaro">Querétaro</option>
		                    <option value="Quintana Roo">Quintana Roo</option>
		                    <option value="San Luis Potosí">San Luis Potosí</option>
		                    <option value="Sinaloa">Sinaloa</option>
		                    <option value="Sonora">Sonora</option>
		                    <option value="Tabasco">Tabasco</option>
		                    <option value="Tamaulipas">Tamaulipas</option>
		                    <option value="Tlaxcala">Tlaxcala</option>
		                    <option value="Veracruz">Veracruz</option>
		                    <option value="Yucatán">Yucatán</option>
		                    <option value="Zacatecas">Zacatecas</option>
						</select>
					</div>
					<button type="submit" name="submitButton" class="BtnAcept">Aceptar</button>
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
					<button class="BtnAcept" id="Acept" name="deleteButton">Aceptar</button>
					<button class="BtnCancel" onclick="Cerrar('Pantalla')">Cancelar</button>
			</div>
		</div>

		<span class="Cliente">
			<h1>Clientes</h1>
			<div class="Search">
				<form id="buscarClientes" name="buscarClientes" method="post" action="">
					<input type="text" name="buscar" class="SearchBar">
					<button class="BtnSearch" name="buscarButton">Buscar</button>
				</form>
			</div>
			<?php
				include("Back/conexion.php");
				include("Back/insertarCliente.php");
				include("Back/mostrarClientes.php");
				$con = conectar();
				if(isset($_POST['submitButton'])){ //check if form was submitted
				insertarCliente($con);
				}
			?>
				<table class="TabClient">
					<tr>
						<th>Nombre Completo</th>
						<th>Edad</th>
						<th>Teléfono</th>
						<th>Correo electrónico</th>
						<th>Estado</th>
						<th></th>
					</tr>
				<?php
				mostrarCLientes($con);
				desconectar($con);
				?>
		</span>
	</div>
</body>
<script src="Funciones.js"></script>
</html>
