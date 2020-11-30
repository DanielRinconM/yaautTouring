<html>
<body>    
<form id="formularioEventos" name="formularioEventos" method="post" action="" enctype="multipart/form-data">


		<p>
			<label>
				Nombre:
				<input type="texto" name="nombreEvento" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Lugar:
				<input type="texto" name="lugar" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Fecha de Inicio:
				<input type="date" name="fechaInicio" required>
			</label>
		</p>
		<p>
			<label>
				Fecha de Finalizacion:
				<input type="date" name="fechaFinal" required>
			</label>
		</p>
		<p>
			<label>
				Hora de Inicio:
				<input type="time" name="horaInicio" required>
			</label>
		</p>
		<p>
			<label>
				Hora de Finalizacion:
				<input type="time" name="horaFinal" required>
			</label>
		</p>
		<p>
			<label>
				Banner:
				  <input type="file" name="fileToUpload" id="fileToUpload">


			</label>
		</p>
		<p>
			<label>
				Tipo
				<select name="tipo" required>
				    <option value="Pueblo Magico">Pueblo Magico</option>
				    <option value="Concierto">Concierto</option>
				    <option value="Festival">Festival</option>
				</select>
			</label>
		<p>
			<label>
				Fecha de Ultimo Pago:
				<input type="date" name="fechaUltimoPago" required>
			</label>
		</p>
		</p>
		<input type="submit" name="submitButton">
    </form>
    <form id="buscarEventos" name="buscarEventos" method="post" action="">
    <p>
			<label>
				<input type="text" name="buscar">
			</label>
	</p>
		<input type="submit" name="buscarButton">
    </form>
<?php
include("conexion.php");
include("insertarEvento.php");
include("mostrarEventos.php");
$con = conectar();
if(isset($_POST['submitButton'])){ //check if form was submitted
    insertarEvento($con);

  
}
?>
    <table style='border: 1px solid black; border-collapse: collapse;'>
    <tr>
        <th style='border: 1px solid black;'>NOMBRE</th>
        <th style='border: 1px solid black;'>FECHA INICIO</th>
        <th style='border: 1px solid black;'>FECHA FINAL</th>
        <th style='border: 1px solid black;'>LUGAR</th>
        <th style='border: 1px solid black;'>STATUS</th>
        <th style='border: 1px solid black;'>EDITAR</th>
        <th style='border: 1px solid black;'>BORRAR</th>
    </tr>
<?php
mostrarEventos($con);
desconectar($con);
?>
</body>
</html>
