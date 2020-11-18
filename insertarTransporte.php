<?php
function insertarTransporte($con){
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $capacidad = $_POST['capacidad'];
    $empresa = $_POST['nombreEmpresa'];
    $inicio = $_POST['inicioPrestamo'];
    $fin = $_POST['finPrestamo'];
    $costo = $_POST['costo'];
    if($nombre AND $tipo AND $capacidad AND $empresa AND $inicio AND $fin AND $costo){
        $SQL = "INSERT INTO transportes VALUES ('','$nombre','$tipo','$capacidad','$empresa','$inicio','$fin','$costo')";
        consultar($con, $SQL);
    }
}
?>