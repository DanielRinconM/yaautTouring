<?php
function mostrarClientes($con){
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT * FROM clientes WHERE nombre LIKE '$buscar%' OR apellidoPaterno LIKE '$buscar%' OR apellidoMaterno LIKE '$buscar%' OR fechaNacimiento LIKE '$buscar%' OR telefono LIKE '$buscar%' OR correoElectronico LIKE '$buscar%' OR estado LIKE '$buscar%' ORDER BY nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento DESC, estado";
    }else{
    $SQL = "SELECT * FROM clientes ORDER BY nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento DESC, estado";
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
                    print("<td>".$cadena."</td>");
                    $date = new DateTime($Fila[$x]);
                    $now = new DateTime();
                    $difference = $now->diff($date);
                    $age = $difference->y;
                    print("<td>".date($age)." años </td>");
                }else{
                    print("<td>".$Fila[$x]."</td>");
                }
            }
        }
          $env="Envanecer('Pantalla')";
          $b = "basura";
          $dir = "./Resources/basura.png";
          $name="basuraButton";
          print("<td><a href=Back/EliminarCliente.php?Id=$Fila[0]><img id=$b src=$dir name=$name></td>");
        print("</tr>");
    }
    print("</table>");
}
?>
