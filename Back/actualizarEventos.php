<?php
function actualizarEventos($con){
//Pasados con status proximo
$sql = "UPDATE eventos SET status='Finalizado' WHERE status='Proximo' AND CURRENT_DATE>fechaFinal;";
$resultado = consultar($con,$sql);
//Pasados con status transcurriendo
$sql = "UPDATE eventos SET status='Finalizado' WHERE status='Transcurriendo' AND CURRENT_DATE>fechaFinal;";
$resultado = consultar($con,$sql);
//actuales
$sql = "UPDATE eventos SET status='Transcurriendo' WHERE status='Proximo' AND CURRENT_DATE>=fechaInicio AND CURRENT_DATE<=fechaFinal AND CURRENT_TIME>=horaInicio AND CURRENT_TIME<=horaFinal;";
$resultado = consultar($con,$sql);
}
?>
