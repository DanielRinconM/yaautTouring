<?php
function insertarFase($con){
    $evento = $_POST['evento'];
    $nombreFase = $_POST['nombreFase'];
    $precio = $_POST['precio'];
	$fechaFinal = $_POST['fechaFinal'];
	if($evento AND $fechaFinal){
		// Consultando ID de nombre de evento seleccionado	
		$SQL = "SELECT idEvento, fechaInicio FROM eventos WHERE nombreEvento='$evento'";
		$resultado = consultar($con, $SQL);
		$Fila = $resultado->fetch_assoc();
		$idEvento = $Fila['idEvento'];
		$fechaInicio = $Fila['fechaInicio'];
		if($fechaInicio< $fechaFinal){
            echo("El evento ($evento) tiene una fecha de inicio ($fechaInicio) anterior a la fecha final ($fechaFinal) de la fase que intentas registrar");
        }else{
			$SQLRepetido = "SELECT fechaFinal FROM fases WHERE idEvento='$idEvento'";
			$ResultadoRepeticion = consultar($con, $SQLRepetido);
			$fechaIgual = 0;
			while ($row = $ResultadoRepeticion->fetch_assoc()){
				if($row['fechaFinal']==$fechaFinal)
				$fechaIgual = $fechaIgual +1;
			}
			if($fechaIgual>0){
				echo("Ya existe una fase con esta fecha final ($fechaFinal) en este evento");
			}else{
			if($nombreFase AND $precio){
				$SQL = "INSERT INTO fases(nombre, precio, fechaFinal, idEvento) VALUES ('$nombreFase','$precio','$fechaFinal','$idEvento')";
				consultar($con,$SQL);
				header('Location: eventos.php');
				}
			}
		}
	}	
}
?>
