<?php
function mostrarEventos($con){
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT * FROM eventos WHERE nombreEvento LIKE '$buscar%' OR lugar LIKE '$buscar%' OR status LIKE '$buscar%' ORDER BY nombreEvento, lugar, status";
    }else{
    $SQL = "SELECT nombreEvento, fechaInicio, horaInicio, fechaFinal, horaFinal, lugar, status FROM eventos";
    }
    $Resultado = consultar($con, $SQL);
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
        print("<tr>");
        $Fila = mysqli_fetch_row($Resultado);
        for ($x=0; $x < count($Fila); $x++) 
	{
		if($x==1)
		{
		
                    print("<td style='border: 1px solid black;'>".$Fila[$x]." at ".$Fila[$x+1]."</td>");
		    $x=$x+1;
                }
		else if($x==3)
		{
		
                    print("<td style='border: 1px solid black;'>".$Fila[$x]." at ".$Fila[$x+1]."</td>");
		    $x=$x+1;
                }
		else
		{
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
