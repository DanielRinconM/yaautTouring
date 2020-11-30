<?php
function insertarPago($con){
    $idExperiencia = $_POST['idExperiencia'];
    $monto = $_POST['monto'];
    $metodo = $_POST['metodoPago'];
    $fecha = date("Y/m/d");
    if($idExperiencia AND $monto AND $metodo){
	// Consultando ID de nombre de evento seleccionado	
	$SQL = "INSERT INTO pagos(monto, método, fechaPago, idExperiencia) VALUES ('$monto','$metodo','$fecha','$idExperiencia')";
	consultar($con,$SQL);
	$SQL = "SELECT idExperiencia, pagado FROM experiencias WHERE idExperiencia='$idExperiencia';";
	$Resultado = consultar($con, $SQL);
	$Fila = mysqli_fetch_array($Resultado);
	$pagado = $Fila['pagado'];
	$pagado = $pagado + $monto;
	$SQL = "UPDATE experiencias SET pagado='$pagado' WHERE idExperiencia='$idExperiencia';";
	$Resultado = consultar($con, $SQL);
    }
}
?>
