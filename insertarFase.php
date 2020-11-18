<?php
function insertarFase($con){
    $evento = $_POST['evento'];
    $nombreFase = $_POST['nombreFase'];
    $precio = $_POST['precio'];
	$fechaFinal = $_POST['fechaFinal'];
	if($evento AND $fechaFinal){
		// Consultando ID de nombre de evento seleccionado	
		$SQL = "SELECT idEvento FROM eventos WHERE nombreEvento='$evento'";
		$resultado = consultar($con, $SQL);
		$Fila = mysqli_fetch_row($resultado);
		$idEvento = $Fila[0];
		$SQLExcedente = "SELECT fechaInicio FROM eventos WHERE idEvento = '$idEvento'";
		$ResultadoExcedente = consultar($con, $SQLExcedente);
		$rowExcedente = $ResultadoExcedente->fetch_assoc();
		if($rowExcedente['fechaInicio']< $fechaFinal){
            echo("El evento tiene una fecha de inicio anterior a la fecha final de la fase que intentas registrar");
        }else{
			$SQLRepetido = "SELECT fechaFinal FROM fases WHERE idEvento='$idEvento'";
			$ResultadoRepeticion = consultar($con, $SQLRepetido);
			$fechaIgual = 0;
			while ($row = $ResultadoRepeticion->fetch_assoc()){
				if($row['fechaFinal']==$fechaFinal)
				$fechaIgual = $fechaIgual +1;
			}
			if($fechaIgual>0){
				echo("Ya existe una fase con esta fecha final en este evento");
			}else{
			if($nombreFase AND $precio){
				$SQL = "INSERT INTO fases(nombre, precio, fechaFinal, idEvento) VALUES ('$nombreFase','$precio','$fechaFinal','$idEvento')";
				consultar($con,$SQL);
				}
			}
		}
	}	
}
?>
