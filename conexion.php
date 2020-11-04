<?php
	function Conectar ()
	{
		$Con = mysqli_connect("localhost","root","","yauttouringdb");
		return $Con;
	}
	function Consultar($Con,$SQL)
	{
		#Regresa un uno, cero, error o relacion
		$Query = mysqli_query($Con,$SQL) or  die(mysqli_error($Con));
		return $Query;
	}
	function Desconectar($Con)
	{
		$test = mysqli_close($Con);
	}
?>