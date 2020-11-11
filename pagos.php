<html>
<body>    
<?php
include("conexion.php");
$con = conectar();
?>

			</select>
<form id="formularioPagos" name="formularioPagos" method="post" action="">
		<p>

			<label>
				Experiencia:
				<select name="idExperiencia">
				<?php
				$sql = mysqli_query($con, "SELECT idExperiencia, idCliente FROM experiencias");
				while ($row = $sql->fetch_assoc()){
				echo "<option value=\"".$row['idExperiencia']."\">" . $row['idCliente'] ."</option>";
				}
			?>
			</select>
			</label>
		</p>
		<p>
			<label>
				Monto:
				<input type="text" name="monto" maxlength=40  required>
			</label>
		</p>
		<p>
			<label>
				Metodo Pago
				<select name="metodoPago" required>
                    <option value="credito">Tarjeta Credito</option>
                    <option value="debito">Tarjeta Debito</option>
                    <option value="transf">Transferencia</option>
                    <option value="deposito">Deposito</option>
                    <option value="cheque">Cheque</option>
                    <option value="efectivo">Efectivo</option>
                </select>
			</label>
		</p>
		<input type="submit" name="submitButton">
		</p>
    </form>
<?php
include("insertarPago.php");
if(isset($_POST['submitButton'])){ //check if form was submitted
    insertarPago($con);
}
?>
</body>
</html>
