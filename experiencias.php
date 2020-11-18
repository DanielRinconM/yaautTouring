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
<?php
include("insertarExperiencia.php");
if(isset($_POST['submitButton'])){ //check if form was submitted
    insertarExperiencia($con);
}
?>

</body>
</html>
