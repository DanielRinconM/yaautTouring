<?php
function mostrarExperiencia($con){
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT `descuento`, `pagado`, `idEvento`, `idFase`, `idCliente` FROM experiencias WHERE descuento LIKE '$buscar%' OR pagado LIKE '$buscar%' OR idEvento LIKE '$buscar%' OR idFase LIKE '$buscar%' OR idCliente LIKE '$buscar%' ORDER BY descuento, pagado";
    }else{
    $SQL = "SELECT `descuento`, `pagado`, `idEvento`, `idFase`, `idCliente` FROM experiencias ORDER BY descuento, pagado";
    }
    $Resultado = consultar($con, $SQL);
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
        print("<tr>");
        $Fila = mysqli_fetch_row($Resultado);
        for ($x=0; $x < count($Fila); $x++) {
                if($x == 5){
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
