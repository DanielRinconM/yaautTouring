<?php
function insertar($table,$data,$con){
	$llaves = obtener("keys",$data);
	$valores = obtener("values",$data);
	$sql = "INSERT INTO $table ($llaves) VALUES ($valores);";
	echo $sql;
	consultar($con,$sql);
}
function obtener($llaveOvalor,$arreglo)
{
	$columnas="";
	if($llaveOvalor == "keys")
	{
		$columnas = array_keys($arreglo);
		$comillas = "";
	}
	else if($llaveOvalor == "values")
	{
		$columnas = array_values($arreglo);
		$comillas = "'";
	}
	$cadenaColumnas="";
	for($i=0;$i<count($arreglo);$i++)
	{
		if($i==0)
		{
			$cadenaColumnas = $comillas.$columnas[$i].$comillas;
		}
		else
		{

			$cadenaColumnas = $cadenaColumnas.", ".$comillas.$columnas[$i].$comillas;
		}
	}
	return($cadenaColumnas);
}
include("conexion.php");
$table = "prueba";
$data = array("nombre" => "Benito","apellido"=>"Cam");
$con = conectar();
insertar($table,$data,$con);

?>
