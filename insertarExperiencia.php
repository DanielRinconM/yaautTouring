<?php
function insertarExperiencia($con){
    $idEvento = $_POST['idEvento'];
    $idCliente = $_POST['idCliente'];
    $descuento = $_POST['descuento'];
    if($idCliente AND $idEvento){
        $SQLRepetido = "SELECT * FROM experiencias WHERE idCliente = '$idCliente' AND idEvento = '$idEvento'";
        $ResultadoRepeticion = consultar($con, $SQLRepetido);
        if(mysqli_num_rows($ResultadoRepeticion)==1){
            $SQLCliente = "SELECT nombre, apellidoPaterno FROM clientes WHERE idCliente='$idCliente'";
            $resultadoCliente = consultar($con, $SQLCliente);
            $FilaCliente = $resultadoCliente->fetch_assoc();
            $nombre = $FilaCliente['nombre']." ".$FilaCliente['apellidoPaterno'];
            $SQLEvento = "SELECT nombreEvento FROM eventos WHERE idEvento='$idEvento'";
            $resultadoEvento = consultar($con, $SQLEvento);
            $FilaEvento = $resultadoEvento->fetch_assoc();
            $nombreEvento = $FilaEvento['nombreEvento'];
            print_r("Este cliente ($nombre) ya tiene una experiencia registrada para este evento ($nombreEvento)");
        }else{
            $now = date('Y-m-d');
            $SQLFase = "SELECT idFase FROM fases WHERE idEvento = '$idEvento' AND fechaFinal > '$now' ORDER BY fechaFinal";
            $Resultado = consultar($con, $SQLFase);
            $Fila = mysqli_fetch_row($Resultado);
            $idFase = $Fila[0];
	    echo $idFase;
            if($idFase){
                $SQL = "INSERT INTO experiencias(descuento, pagado, idEvento, idFase, idCliente) VALUES ('$descuento','0','$idEvento','$idFase','$idCliente')";
                echo $SQL;
                consultar($con, $SQL);
		header('Location: experiencias.php');
                }   
	    else{
		    echo "Este evento no tiene fases registradas";
	    	}
            }
        }
    }  
?>
