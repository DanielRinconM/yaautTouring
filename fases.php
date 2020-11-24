<html>
<body>    
<?php
include("conexion.php");
$con = conectar();
?>

			</select>
<form id="formularioFases" name="formularioFases" method="post" action="">
		<p>

			<label>
				Evento:
				<select name="evento">
				<?php
				$now = date('Y-m-d');
				$sql = mysqli_query($con, "SELECT nombreEvento FROM eventos WHERE fechaInicio > '$now'");
				while ($row = $sql->fetch_assoc()){
				echo "<option value=\"".$row['nombreEvento']."\">" . $row['nombreEvento'] ."</option>";
				}
			?>
			</select>
			</label>
		</p>
		<p>
			<label>
				Nombre de Fase:
				<input type="text" name="nombreFase" maxlength=40  required>
			</label>
		</p>
		<p>
			<label>
				Precio:
				<input type="text" name="precio" maxlength=40  required>
			</label>
		</p>
		<p>
			<label>
				Fecha Finalizacion:
				<input type="date" name="fechaFinal" required>
			</label>
		</p>
		<input type="submit" name="submitButton">
		</p>
    </form>
<?php
include("insertarFase.php");
if(isset($_POST['submitButton'])){ //check if form was submitted
    insertarFase($con);
}
include("mostrarFases.php");
?>
    <table style='border: 1px solid black; border-collapse: collapse;'>
    <tr>
        <th style='border: 1px solid black;'>NOMBRE</th>
        <th style='border: 1px solid black;'>PRECIO</th>
        <th style='border: 1px solid black;'>FECHA FINAL</th>
        <th style='border: 1px solid black;'>EVENTO</th>
        <th style='border: 1px solid black;'>ELIMINAR</th>
    </tr>
<?php
    mostrarFases($con);
    desconectar($con);
?>
</body>
</html>
