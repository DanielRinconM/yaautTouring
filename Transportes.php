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

		<form id="formularioTransportes" name="formularioTransportes" method="post" action="">
			<span class="RegTransporte">
					<h1>Registro de transporte</h1>
					<div class="Name">
						<p>Nombre:</p>
						<input type="text" name="nombre">
					</div>
					<div class="Capacity">
						<p>Capacidad:</p>
						<input type="text" name="capacidad">
					</div>
					<div class="Type">
						<p>Tipo:</p>
						<input type="text" name="tipo">
					</div>
					<div class="Cost">
						<p>Costo:</p>
						<input type="text" name="costo">
					</div>
					<div class="Enterprise">
						<p>Empresa:</p>
						<input type="text" name="nombreEmpresa">
					</div>
					<div class="DateStart">
						<p>Fecha de inicio del préstamo:</p>
						<input type="date" name="inicioPrestamo">
					</div>
					<div class="DateEnd">
						<p>Fecha de devolución del préstamo</p>
						<input type="date" name="finPrestamo">
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
				<button class="BtnAcept">Aceptar</button>
				<button class="BtnCancel" onclick="Cerrar('Pantalla')">Cancelar</button>
			</div>
		</div>

		<span class="Transporte">
			<h1>Transportes</h1>
			<div class="Search">
				<form id="buscarTransportes" name="buscarTransportes" method="post" action="" class="Findform">
					<input type="input" name="buscar" class="SearchBar">
					<button class="BtnSearch" name="buscarButton">Buscar</button>
				</form>
			</div>
			<?php
				include("Back/conexion.php");
				include("Back/insertarTransporte.php");
				include("Back/mostrarTransportes.php");
				$con = conectar();
				if(isset($_POST['submitButton'])){ //check if form was submitted
					insertarTransporte($con);
				}
			?>
			<table class="TabTransport">
				<tr>
					<th>Transporte</th>
					<th>Tipo</th>
					<th>Capacidad</th>
					<th>Empresa</th>
					<th>Inicio del préstamo</th>
					<th>Fin del préstamo</th>
					<th>Costo</th>
					<th></th>
				</tr>
				<?php
				mostrarTransportes($con);
				desconectar($con);
				?>
		</span>
	</div>
</body>
<script src="Funciones.js"></script>
</html>
