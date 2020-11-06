<?php
	function conectar ()
	{
		$Con = mysqli_connect("localhost","root","","yaauttouringdb");
		return $Con;
	}
	function consultar($Con,$SQL)
	{
		#Regresa un uno, cero, error o relacion
		$Query = mysqli_query($Con,$SQL) or  die(mysqli_error($Con));
		return $Query;
	}
	function desconectar($Con)
	{
		$test = mysqli_close($Con);
	}
?>