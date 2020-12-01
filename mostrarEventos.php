<?php
function mostrarEventos($con){
    if(isset($_POST['buscarButton'])){ //check if form was submitted
        $buscar = $_POST['buscar'];
        $SQL = "SELECT  `nombreEvento`, `fechaInicio`, `horaInicio`, `fechaFinal`, `horaFinal`, `lugar`, `status`  FROM eventos WHERE nombreEvento LIKE '$buscar%' OR lugar LIKE '$buscar%' OR status LIKE '$buscar%' ORDER BY nombreEvento, lugar, status";
    }else{
    $SQL = "SELECT nombreEvento, fechaInicio, horaInicio, fechaFinal, horaFinal, lugar, status, idEvento FROM eventos";
    }
    $Resultado = consultar($con, $SQL);
    $n = mysqli_num_rows($Resultado);
    for ($i=0; $i < $n; $i++) {
      print("<tr>");
      $Fila = mysqli_fetch_row($Resultado);
      for ($x=0; $x < count($Fila)-1; $x++){
    		if($x==1)
    		{
         print("<td>".$Fila[$x]." at ".$Fila[$x+1]."</td>");
    		 $x=$x+1;
        }
    		else if($x==3)
    		{
          print("<td>".$Fila[$x]." at ".$Fila[$x+1]."</td>");
    		  $x=$x+1;
        }
    		else
    		{
          print("<td>".$Fila[$x]."</td>");
    		}
      }
        $sobre="sobre('basura')";
        $fuera="fuera('basura')";
        $env="Envanecer('Pantalla',".$Fila[0].")";
        $id = "basura";
        $dir = "./Resources/basura.png";
        $p = 'Pantalla';
        print("<td><a href=Back/EliminarEvento.php?Id=$Fila[0]><img id=$id src=$dir></td>");
        $id="ver";
        $dir="./Resources/ver.png";
        $env="document.location='Eventos(VerMas).html'";
        print("<td><img id=$id src=$dir onclick=$env></td>");
        print("</tr>");
    }
    print("</table>");
}
?>
