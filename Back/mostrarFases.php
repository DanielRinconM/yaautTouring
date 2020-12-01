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
                    print("<td> $".$Fila[$x]."</td>");
                }else if($x == 4){
                    $SQLEvento = "SELECT nombreEvento FROM eventos WHERE idEvento = '$Fila[$x]'";
                    $ResultadoEvento = consultar($con, $SQLEvento);
                    $rowEvento = $ResultadoEvento->fetch_assoc();
                    print("<td>".$rowEvento['nombreEvento']."</td>");
                }else{
                    print("<td>".$Fila[$x]."</td>");
                }
        }
        $env="Envanecer('Pantalla')";
        $b = "basura";
        $dir = "./Resources/basura.png";
        $name="basuraButton";
        print("<th><a href=EliminarFase.php?Id=$Fila[0]><img id=$b src=$dir name=$name></th>");
        print("</tr>");
    }
    print("</table>");
}
?>
