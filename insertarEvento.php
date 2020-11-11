<?php
function insertarEvento($con){
	$nombreEvento = $_POST['nombreEvento'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFinal = $_POST['fechaFinal'];
    $horaInicio = $_POST['horaInicio'];
    $horaFinal = $_POST['horaFinal'];
    $tipo = $_POST['tipo'];
    $lugar = $_POST['lugar'];
    $banner = $_POST['banner'];
    $fechaUltimoPago = $_POST['fechaUltimoPago'];
    //falta insertar fecha ultimo pago 
    if($nombreEvento AND $fechaInicio AND $fechaFinal AND $horaInicio AND $horaFinal AND $lugar AND $tipo AND $banner AND $fechaUltimoPago){
        $SQL = "INSERT INTO eventos(nombreEvento,fechaInicio,fechaFinal,horaInicio,horaFinal,lugar,status,tipo,banner,fechaUltimoPago) VALUES ('$nombreEvento','$fechaInicio','$fechaFinal','$horaInicio','$horaFinal','$lugar','Proximo','$tipo','$banner','$fechaUltimoPago')";
        consultar($con, $SQL);
    }
}
?>
