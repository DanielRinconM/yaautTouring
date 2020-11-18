<?php
function mostrarFases($con){
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        //$SQL = "SELECT * FROM fases WHERE nombreTransporte LIKE '$buscar%' OR tipo LIKE '$buscar%' OR capacidad LIKE '$buscar%' OR nombreEmpresa LIKE '$buscar%' OR incioPrestamo LIKE '$buscar%' OR finPrestamo LIKE '$buscar%' OR costo LIKE '$buscar%' ORDER BY tipo, capacidad, costo";
    }else{
    $SQL = "SELECT * FROM fases ORDER BY fechaFinal,precio,nombre";
    }
    $Resultado = consultar($con, $SQL);
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
        print("<tr>");
        $Fila = mysqli_fetch_row($Resultado);
        for ($x=1; $x < count($Fila); $x++) {
                if($x == 2){
                    print("<td style='border: 1px solid black;'> $".$Fila[$x]."</td>");
                }else if($x == 4){
                    $SQLEvento = "SELECT nombreEvento FROM eventos WHERE idEvento = '$Fila[$x]'";
                    $ResultadoEvento = consultar($con, $SQLEvento);
                    $rowEvento = $ResultadoEvento->fetch_assoc();
                    print("<td style='border: 1px solid black;'>".$rowEvento['nombreEvento']."</td>");
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
