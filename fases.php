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
				$sql = mysqli_query($con, "SELECT nombreEvento FROM eventos");
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
?>
</body>
</html>
