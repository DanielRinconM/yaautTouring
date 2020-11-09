<html>
<body>    
<form id="formularioExperiencias" name="formularioExperiencias" method="post" action="">
		<p>
			<label>
				Evento:
				<input type="texto" name="evento" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Cliente:
				<input type="text" name="cliente" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Descuento:
				<input type="text" name="descuento"maxlength=40  required>
			</label>
		</p>
		<p>
			<label>
				Fase:
				<input type="date" name="fase" required>
			</label>
		</p>
		<p>
			<label>
				Fecha limite de pago:
				<input type="text" name="fechaLimitePago" maxlength=10 required>
			</label>
		</p>
		<input type="submit" name="submitButton">
		</p>
    </form>
<!--
    <form id="buscarExperiencias" name="buscarClientes" method="post" action="">
    <p>
			<label>
				<input type="text" name="buscar">
			</label>
		</p>
		<input type="submit" name="buscarButton">
    </form>
    -->
    <?php
include("conexion.php");
$con = conectar();
if(isset($_POST['submitButton'])){ //check if form was submitted
    $evento = $_POST['evento'];
    $cliente = $_POST['cliente'];
    $descuento = $_POST['descuento'];
    $fase = $_POST['fase'];
    $fechaLimitePago = $_POST['fechaLimitePago'];
    if($evento AND $cliente AND $descuento AND $fase AND $fechaLimitePago){
#$SQL = "INSERT INTO experiencias VALUES ('','$nombre','$apellidoPaterno','$apellidoMaterno','$fechaNacimiento','$telefono','$correoElectronico','$estado')";
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
