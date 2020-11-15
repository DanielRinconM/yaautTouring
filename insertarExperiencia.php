<?php
function insertarExperiencia($con){
    $idEvento = $_POST['idEvento'];
    $idCliente = $_POST['idCliente'];
    $descuento = $_POST['descuento'];
    if($idCliente AND $idEvento){
        $SQLRepetido = "SELECT * FROM experiencias WHERE idCliente = '$idCliente' AND idEvento = '$idEvento'";
        $ResultadoRepeticion = consultar($con, $SQLRepetido);
        if(mysqli_num_rows($ResultadoRepeticion)==1){
            echo("Este cliente ya tiene una experiencia registrada para este evento");
        }else{
            $now = date('Y-m-d');
            $SQLFase = "SELECT idFase FROM fases WHERE idEvento = '$idEvento' AND fechaFinal > '$now' ORDER BY fechaFinal";
            $Resultado = consultar($con, $SQLFase);
            $Fila = mysqli_fetch_row($Resultado);
            $idFase = $Fila[0];
            if($idFase){
                $SQL = "INSERT INTO experiencias(descuento, pagado, idEvento, idFase, idCliente) VALUES ('$descuento','0','$idEvento','$idFase','$idCliente')";
                echo $SQL;
                consultar($con, $SQL);
                }   
            }
        }
    }  
?>
