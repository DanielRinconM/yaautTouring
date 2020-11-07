<html>
<body>    
<form id="formularioCLientes" name="formularioClientes" method="post" action="">
		<p>
			<label>
				Nombre:
				<input type="texto" name="nombre" required>
			</label>
		</p>
		<p>
			<label>
				Apellido Paterno:
				<input type="text" name="apellidoPaterno" required>
			</label>
		</p>
		<p>
			<label>
				Apellido Materno:
				<input type="text" name="apellidoMaterno" required>
			</label>
		</p>
		<p>
			<label>
				Fecha de Nacimiento:
				<input type="date" name="fechaNacimiento" required>
			</label>
		</p>
		<p>
			<label>
				Teléfono:
				<input type="text" name="telefono" required>
			</label>
		</p>
		<p>
			<label>
				Correo electrónico:
				<input type="mail" name="correoElectronico" required>
			</label>
		</p>
		<p>
			<label>
				Estado
				<input type="text" name="estado" required>
			</label>
		</p>
		<input type="submit" name="submitButton">
    </form>
    <?php
include("conexion.php");
// $con = conectar();
// $SQL = "SELECT * FROM clientes";
// $message = consultar($con,$SQL);
// desconectar($con);
if(isset($_POST['submitButton'])){ //check if form was submitted
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $telefono = $_POST['telefono'];
    $correoElectronico = $_POST['correoElectronico'];
    $estado = $_POST['estado'];
    $con = conectar();
    if($nombre AND $apellidoPaterno AND $apellidoMaterno AND $fechaNacimiento AND $telefono AND $correoElectronico AND $estado){
        $SQL = "INSERT INTO clientes VALUES ('','$nombre','$apellidoPaterno','$apellidoMaterno','$fechaNacimiento','$telefono','$correoElectronico','$estado')";
        consultar($con, $SQL);
    }
    $SQL = "SELECT * FROM clientes";
    $Resultado = consultar($con, $SQL);
    print("<table style='border: 1px solid black; border-collapse: collapse;'>");
    print("<tr>");
    for ($i=0; $i < mysqli_num_fields($Resultado); $i++) { 
        print("<th style='border: 1px solid black;'>".mysqli_fetch_field_direct($Resultado, $i)->name."</th>");
    }
    print("</tr>");
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
        print("<tr>");
        $Fila = mysqli_fetch_row($Resultado);
        for ($x=0; $x < count($Fila); $x++) {
            print("<td style='border: 1px solid black;'>".$Fila[$x]."</td>");
        }
        print("</tr>");
    }	
    print("</table>");
    print("Número total de registros: ".$n);
    desconectar($con);
}
?>
</body>
</html>