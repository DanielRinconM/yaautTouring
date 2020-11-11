<?php
function insertarFase($con){
    $evento = $_POST['evento'];
    $nombreFase = $_POST['nombreFase'];
    $precio = $_POST['precio'];
    $fechaFinal = $_POST['fechaFinal'];
    if($evento AND $nombreFase AND $precio AND $fechaFinal){
	// Consultando ID de nombre de evento seleccionado	
        $SQL = "SELECT idEvento FROM eventos WHERE nombreEvento='$evento'";
	$resultado = consultar($con, $SQL);
	$Fila = mysqli_fetch_row($resultado);
	$idEvento = $Fila[0];
	//consultando cantidad de fases del evento seleccionado 
        $SQL = "SELECT * FROM fases WHERE idEvento='$idEvento'";
	$resultado = consultar($con, $SQL);
	$n = mysqli_num_rows($resultado);
	//En caso de que no existan fases para el idevento seleccionado
	if($n==0)
	{
		$noFase = 1;
	}
	else
	{
		$noFase = $n+1;
	}
	$SQL = "INSERT INTO fases(numeroFase, nombre, precio, fechaFinal, idEvento) VALUES ('$noFase','$nombreFase','$precio','$fechaFinal','$idEvento')";
	consultar($con,$SQL);
    }
}
?>
