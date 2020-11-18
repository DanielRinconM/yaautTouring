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
        $SQLcorreo = "SELECT * FROM clientes WHERE correoElectronico = '$correoElectronico'";
        $resultadoCorreo = consultar($con,$SQLcorreo);
        $nCorreo = mysqli_num_rows($resultadoCorreo);
        if($nCorreo > 0){
            print("<h4>El correo ($correoElectronico) que ingresaste ya existe</h4>");
        }else{
            $SQLtelefono = "SELECT * FROM clientes WHERE telefono = '$telefono'";
            $resultadoTelefono = consultar($con,$SQLtelefono);
            $nTelefono = mysqli_num_rows($resultadoTelefono);
            if($nTelefono > 0){
                print("<h4>El teléfono ($telefono) que ingresaste ya existe</h4>");
            }else{
        $SQL = "INSERT INTO clientes(nombre,apellidoPaterno,apellidoMaterno,fechaNacimiento,telefono,correoElectronico,estado) VALUES ('$nombre','$apellidoPaterno','$apellidoMaterno','$fechaNacimiento','$telefono','$correoElectronico','$estado')";
            consultar($con, $SQL);
            }
        }
    }
}
?>
