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
				$sql = "SELECT experiencias.idExperiencia, experiencias.idCliente, experiencias.pagado, experiencias.descuento,
					clientes.nombre as nombreCliente, clientes.apellidoPaterno,
					eventos.nombreEvento,
					fases.nombre as nombreFase, fases.precio
					FROM experiencias
					INNER JOIN clientes ON experiencias.idCliente=clientes.idCliente 
					INNER JOIN eventos ON experiencias.idEvento=eventos.idEvento 
					INNER JOIN fases ON experiencias.idFase=fases.idFase;";

				$resultado = mysqli_query($con,$sql);
				//$sql = mysqli_query($con, "SELECT idExperiencia, idCliente FROM experiencias");
				while ($row = mysqli_fetch_array($resultado))
				{
					//echo "<option value=\"".$row['idExperiencia']."\">" . $row['idCliente'] ."</option>";

					$descuento = ($row['precio']*$row['descuento'])/100;
					$precioConDescuento =$row['precio'] - $descuento; 
					$debe = $precioConDescuento - $row['pagado'];
					if($debe > 0)
					{
						echo "<option value=\"".$row["idExperiencia"]."\">" 
						. $row['nombreEvento']." - ".$row['nombreFase']
						." | ".$row['nombreCliente']." ".$row['apellidoPaterno']
						." | $".$debe."</option>";
					}
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
