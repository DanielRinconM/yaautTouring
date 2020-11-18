<?php
function mostrarPago($con){
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT `monto`, `metodo`, `fechaPago`, `idExperiencia` FROM pagos WHERE monto LIKE '$buscar%' OR metodo LIKE '$buscar%' OR fechaPago LIKE '$buscar%' OR idExperiencia LIKE '$buscar%' ORDER BY monto, fechaPago";
    }else{
    $SQL = "SELECT `monto`, `metodo`, `fechaPago`, `idExperiencia` FROM pagos ORDER BY monto, fechaPago";
    }
    $Resultado = consultar($con, $SQL);
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
        print("<tr>");
        $Fila = mysqli_fetch_row($Resultado);
        for ($x=0; $x < count($Fila); $x++) {
                if($x == 4){
                    print("<td style='border: 1px solid black;'> $".$Fila[$x]."</td>");
                }else{
                    print("<td style='border: 1px solid black;'>".$Fila[$x]."</td>");
                }
        }
        print("<th style='border: 1px solid black;'></th>");
        print("<th style='border: 1px solid black;'></th>");
        print("</tr>");
    }
    print("</table>");
    print("Número total de registros: ".$n);
}
?>
