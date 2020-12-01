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
		<form id="formularioEventos" name="formularioEventos" method="post" action="" enctype="multipart/form-data">
			<span class="RegEvento">
				<h1>Registro de evento</h1>
				<div class="Name">
					<p>Nombre:</p>
					<input type="text" name="nombreEvento">
				</div>
				<div class="DateStart">
					<p>Fecha de inicio:</p>
					<input type="date" name="fechaInicio">
				</div>
				<div class="TimeStart">
					<p>Hora de inicio:</p>
					<input type="time" name="horaInicio">
				</div>
				<div class="Place">
					<p>Lugar:</p>
					<input type="text" name="lugar">
				</div>
				<div class="Banner">
					<p>Banner:</p>
					<div class="BannerDiv">
						<input class="BannerIn" type="file" name="fileToUpload" id="fileToUpload">
					</div>
				</div>
				<div class="Type">
					<p>Tipo:</p>
					<select name="tipo">
						<option>Seleccione una opción</option>
						<option value="Pueblo Magico">Pueblo Magico</option>
					  <option value="Concierto">Concierto</option>
					  <option value="Festival">Festival</option>
					</select>
				</div>
				<div class="DateEnd">
					<p>Fecha de finzalización:</p>
					<input type="date" name="fechaFinal">
				</div>
				<div class="TimeEnd">
					<p>Hora de finalización:</p>
					<input type="time" name="horaFinal">
				</div>
				<button class="BtnEvento" onclick="Envanecer('Pantalla')">Registrar fase</button>
				<button class="BtnAcept" name="submitButton">Aceptar</button>
			</span>
		</form>
		<!-- AQUI TERMINA EL FORMULARIO DE ENTRADA DE DATOS -->

		<div id="Pantalla">
			<div class="extensor"></div>
			<div id="RegistroFase">
				<h1>Registro de fase</h1>
				<div class="Event">
					<p>Evento:</p>
					<select name="inputEvent">
						<option>Seleccione una opción</option>
					</select>
				</div>
				<div class="DateEnd">
					<p>Fecha de finzalización:</p>
					<input type="date" name="inputEnd">
				</div>
				<div class="Name">
					<p>Nombre:</p>
					<input type="text" name="inputName">
				</div>
				<div class="Price">
					<p>Precio:</p>
					<input type="text" name="inputPrice">
				</div>
					<button class="BtnAcept">Aceptar</button>
					<button class="BtnCancel" onclick="Cerrar('Pantalla')">Cancelar</button>
				</div>
		</div>

		<div id="PantallaMens">
			<div class="extensor"></div>
			<div id="Mensaje">
				<h1>Eliminar registro</h1>
				<div class="Contenido">
					<p>¿Está seguro de querer eliminar este registro?.</p>
				</div>
				<button class="BtnAcept">Aceptar</button>
				<button class="BtnCancel" onclick="Cerrar('PantallaMens')">Cancelar</button>
			</div>
		</div>

		<span class="Evento">
			<h1>Eventos</h1>
			<div class="Search">
				<form id="buscarEventos" name="buscarEventos" method="post" action="">
					<input type="input" name="buscar" class="SearchBar">
					<button class="BtnSearch" name="buscarButton">Buscar</button>
				</form>
			</div>
			<?php
				include("Back/conexion.php");
				include("Back/insertarEvento.php");
				include("Back/mostrarEventos.php");
				include("Back/actualizarEventos.php");
				$con = conectar();
				if(isset($_POST['submitButton'])){ //check if form was submitted
				    insertarEvento($con);
				}
			?>
			<table class="TabEvent">
				<tr>
					<th>Nombre</th>
					<th>Fecha de inicio</th>
					<th>Fecha de finalización</th>
					<th>Lugar</th>
					<th>Status</th>
					<th></th>
					<th></th>
				</tr>
				<?php
					//para actualizar status de eventos
					actualizarEventos($con);
					mostrarEventos($con);
					desconectar($con);
				?>
		</span>
	</div>
</body>
<script src="Funciones.js"></script>
</html>
