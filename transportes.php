<html>
<body>    
<form id="formularioTransportes" name="formularioTransportes" method="post" action="">
		<p>
			<label>
				Nombre de Transporte:
				<input type="text" name="nombre" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Tipo:
				<input type="text" name="tipo" maxlength=10 required>
			</label>
		</p>
		<p>
			<label>
				Capacidad:
				<input type="number" name="capacidad" step="0.01" required>
			</label>
		</p>
		<p>
			<label>
				Empresa:
				<input type="text" name="nombreEmpresa" maxlength=40 required>
			</label>
		</p>
		<p>
			<label>
				Inicio del préstamo:
				<input type="date" name="inicioPrestamo" required>
			</label>
		</p>
		<p>
			<label>
				Fin del préstamo:
				<input type="date" name="finPrestamo" required>
			</label>
		</p>
		<p>
			<label>
				Costo:
				<input type="number" name="costo" required>
			</label>
		</p>
		<input type="submit" name="submitButton">
    </form>
    <form id="buscarTransportes" name="buscarTransportes" method="post" action="">
    <p>
			<label>
				<input type="text" name="buscar">
			</label>
	</p>
		<input type="submit" name="buscarButton">
    </form>
<?php
include("conexion.php");
include("insertarTransporte.php");
include("mostrarTransportes.php");
$con = conectar();
if(isset($_POST['submitButton'])){ //check if form was submitted
    insertarTransporte($con);
}
?>
    <table style='border: 1px solid black; border-collapse: collapse;'>
    <tr>
        <th style='border: 1px solid black;'>TRANSPORTE</th>
        <th style='border: 1px solid black;'>TIPO</th>
        <th style='border: 1px solid black;'>CAPACIDAD</th>
        <th style='border: 1px solid black;'>EMPRESA</th>
        <th style='border: 1px solid black;'>INICIO PRÉSTAMO</th>
        <th style='border: 1px solid black;'>FIN PRÉSTAMO</th>
        <th style='border: 1px solid black;'>COSTO</th>
        <th style='border: 1px solid black;'>EDITAR</th>
        <th style='border: 1px solid black;'>ELIMINAR</th>
    </tr>
<?php
    mostrarTransportes($con);
    desconectar($con);
?>
</body>
</html>