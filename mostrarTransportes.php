<?php
function mostrarTransportes($con){
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT * FROM transportes WHERE nombreTransporte LIKE '$buscar%' OR tipo LIKE '$buscar%' OR capacidad LIKE '$buscar%' OR nombreEmpresa LIKE '$buscar%' OR inicioPrestamo LIKE '$buscar%' OR finPrestamo LIKE '$buscar%' OR costo LIKE '$buscar%' ORDER BY tipo, capacidad, costo";
    }else{
    $SQL = "SELECT * FROM transportes ORDER BY tipo, capacidad, costo";
    }
    $Resultado = consultar($con, $SQL);
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
        print("<tr>");
        $Fila = mysqli_fetch_row($Resultado);
        for ($x=1; $x < count($Fila); $x++) {
                if($x == 7){
                    print("<td> $".$Fila[$x]."</td>");
                }else{
                    print("<td>".$Fila[$x]."</td>");
                }
        }
        $sobre="sobre('basura')";
        $fuera="fuera('basura')";
        $env="Envanecer('Pantalla')";
        $b = "basura";
        $dir = "./Resources/basura.png";
        $p = 'Pantalla';
        print("<td><a href=Back/EliminarTransporte.php?Id=$Fila[0]><img id=$b src=$dir></td>");
        print("</tr>");
    }
    print("</table>");
}
?>
