<html>
<body>    
<form id="formularioClientes" name="formularioClientes" method="post" action="">
		<p>
			<label>
				Nombre:
				<input type="texto" name="nombre" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Apellido Paterno:
				<input type="text" name="apellidoPaterno" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Apellido Materno:
				<input type="text" name="apellidoMaterno"maxlength=40  required>
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
				<input type="text" name="telefono" maxlength=10 required>
			</label>
		</p>
		<p>
			<label>
				Correo electrónico:
				<input type="email" name="correoElectronico" required>
			</label>
		</p>
		<p>
			<label>
				Estado
				<select name="estado" required>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California Norte">Baja California Norte</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Ciudad de México">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>
                </select>
			</label>
		</p>
		<input type="submit" name="submitButton">
    </form>
    <form id="buscarClientes" name="buscarClientes" method="post" action="">
    <p>
			<label>
				<input type="text" name="buscar">
			</label>
		</p>
		<input type="submit" name="buscarButton">
    </form>
    <?php
include("conexion.php");
$con = conectar();
if(isset($_POST['submitButton'])){ //check if form was submitted
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $telefono = $_POST['telefono'];
    $correoElectronico = $_POST['correoElectronico'];
    $estado = $_POST['estado'];
    if($nombre AND $apellidoPaterno AND $apellidoMaterno AND $fechaNacimiento AND $telefono AND $correoElectronico AND $estado){
        $SQL = "INSERT INTO clientes VALUES ('','$nombre','$apellidoPaterno','$apellidoMaterno','$fechaNacimiento','$telefono','$correoElectronico','$estado')";
        consultar($con, $SQL);
    }
}
?>
    <table style='border: 1px solid black; border-collapse: collapse;'>
    <tr>
        <th style='border: 1px solid black;'>NOMBRE COMPLETO</th>
        <th style='border: 1px solid black;'>EDAD</th>
        <th style='border: 1px solid black;'>TELÉFONO</th>
        <th style='border: 1px solid black;'>CORREO ELECTRÓNICO</th>
        <th style='border: 1px solid black;'>ESTADO</th>
        <th style='border: 1px solid black;'>EDITAR</th>
        <th style='border: 1px solid black;'>BORRAR</th>
    </tr>
<?php
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT * FROM clientes WHERE nombre LIKE '$buscar%' OR apellidoPaterno LIKE '$buscar%' OR apellidoMaterno LIKE '$buscar%' OR fechaNacimiento LIKE '$buscar%' OR telefono LIKE '$buscar%' OR correoElectronico LIKE '$buscar%' OR estado LIKE '$buscar%'";
    }else{
    $SQL = "SELECT * FROM clientes";
    }
    $Resultado = consultar($con, $SQL);
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
        $cadena = "";
        print("<tr>");
        $Fila = mysqli_fetch_row($Resultado);
        for ($x=1; $x < count($Fila); $x++) {
            if($x < 4){
                $cadena = $cadena." ".$Fila[$x];
            }else{
                if($x == 4){
                    print("<td style='border: 1px solid black;'>".$cadena."</td>");
                    $date = new DateTime($Fila[$x]);
                    $now = new DateTime();
                    $difference = $now->diff($date);
                    $age = $difference->y;
                    print("<td style='border: 1px solid black;'>".date($age)." años </td>");
                }else{
                    print("<td style='border: 1px solid black;'>".$Fila[$x]."</td>");
                }
            }
        }
        print("<th style='border: 1px solid black;'></th>");
        print("<th style='border: 1px solid black;'></th>");
        print("</tr>");
    }	
    print("</table>");
    print("Número total de registros: ".$n);
    desconectar($con);
?>
</body>
</html>