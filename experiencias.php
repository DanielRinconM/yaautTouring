<html>
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
				<select name="idEvento">
				<?php
				$sql = mysqli_query($con, "SELECT nombreEvento, idEvento FROM eventos");
				while ($row = $sql->fetch_assoc()){
				echo "<option value=\"".$row['idEvento']."\">" . $row['nombreEvento'] ."</option>";
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
				Fase:
				<select name="idFase">
				<?php
				$sql = mysqli_query($con, "SELECT nombre, idEvento, idFase FROM fases");
				while ($row = $sql->fetch_assoc()){
				echo "<option value=\"".$row['idFase']."\">" . $row['nombre'] ."-".$row['idEvento']."</option>";
				}
				?>
			</select>
			</label>
		</p>
		<p>
			<label>
				Descuento:
				<input type="text" name="descuento"maxlength=40  required>
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
