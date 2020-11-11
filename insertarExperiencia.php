<?php
function insertarExperiencia($con){
    $idEvento = $_POST['idEvento'];
    $idCliente = $_POST['idCliente'];
    $idFase = $_POST['idFase'];
    $descuento = $_POST['descuento'];
    if($idEvento AND $idCliente AND $idFase AND $descuento){
        $SQL = "INSERT INTO experiencias(descuento, pagado, idEvento, idFase, idCliente) VALUES ('$descuento','0','$idEvento','$idFase','$idCliente')";
	echo $SQL;
consultar($con, $SQL);
    }
}
?>
