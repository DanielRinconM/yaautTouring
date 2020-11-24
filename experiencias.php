<!DOCTYPE html>
<html>
<head>
<script defer type="text/javascript" src="funciones.js"></script>
</head>
<body>
<?php
include("conexion.php");
$con = conectar();
?>

			</select>
<form id="formularioExperiencias" name="formularioExperiencias" method="post" action="">
		<p>

			<label>
				Evento:
				<select name="idEvento" id="idEvento">
				<?php
				$now = date('Y-m-d');
				$sql = mysqli_query($con, "SELECT nombreEvento, idEvento FROM eventos WHERE fechaInicio > '$now'");
				while ($row = $sql->fetch_assoc()){
				echo "<option value=\"".$row['idEvento']."\">" . $row['nombreEvento']."</option>";
				}
			?>
			</select>
			</label>
		</p>
		<p>
			<label>
				Cliente:
				<select name="idCliente">
				<?php
				$sql = mysqli_query($con, "SELECT nombre, apellidoPaterno, idCliente FROM clientes");
				while ($row = $sql->fetch_assoc()){
					echo "<option value=\"".$row['idCliente']."\">" . $row['nombre'] ." ".$row['apellidoPaterno']."</option>";
				}
			?>
			</select>
			</label>
		</p>
		<p>
			<label>
				Descuento:
				<input type="number" name="descuento" min="0" max="100" value=0>
			</label>
		</p>
		<input type="submit" name="submitButton">
		</p>
    </form>
		<form id="buscarExperiencia" name="buscarExperiencia" method="post" action="">
    <p>
			<label>
				<input type="text" name="buscar">
			</label>
	</p>
		<input type="submit" name="buscarButton">
    </form>
		<?php
		include("insertarExperiencia.php");
		include("mostrarExperiencia.php");
		if(isset($_POST['submitButton'])){ //check if form was submitted
		    insertarExperiencia($con);
		}
		?>
		    <table style='border: 1px solid black; border-collapse: collapse;'>
		    <tr>
		        <th style='border: 1px solid black;'>DESCUENTO</th>
		        <th style='border: 1px solid black;'>PAGADO</th>
						<th style='border: 1px solid black;'>EVENTO</th>
		        <th style='border: 1px solid black;'>FASE</th>
		        <th style='border: 1px solid black;'>CLIENTE</th>
						<th style='border: 1px solid black;'>EDITAR</th>
		        <th style='border: 1px solid black;'>ELIMINAR</th>
		    </tr>
		<?php
		    mostrarExperiencia($con);
		    desconectar($con);
		?>

</body>
</html>
