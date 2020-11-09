<?php
function insertarCliente($con){
    $nombre = $_POST['nombre'];
    $apellidoPaterno = $_POST['apellidoPaterno'];
    $apellidoMaterno = $_POST['apellidoMaterno'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $telefono = $_POST['telefono'];
    $correoElectronico = $_POST['correoElectronico'];
    $estado = $_POST['estado'];
    if($nombre AND $apellidoPaterno AND $apellidoMaterno AND $fechaNacimiento AND $telefono AND $correoElectronico AND $estado){
        $SQL = "INSERT INTO clientes(nombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,telefono,correoElectronico,estado) VALUES ('$nombre','$apellidoPaterno','$apellidoMaterno','$fechaNacimiento','$telefono','$correoElectronico','$estado')";
        consultar($con, $SQL);
    }
}
?>
