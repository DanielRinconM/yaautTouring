<?php
function ventana(){
  $pant="Pantalla";
  $ext="extensor";
  $men="Mensaje";
  $cont="Contenido";
  $class="BtnAcept";
  $name="deleteButton";
  print("<div id=".$pant.">
          <div class=".$ext."></div>
          <div id=".$men">
            <h1>Eliminar registro</h1>
            <div class=".$cont">
              <p>¿Está seguro de querer eliminar este registro?.</p>
            </div>
              <button class=".$class." name=".$name.">Aceptar</button>
              ");
  $class="BtnCancel";
     print("<button class="BtnCancel" onclick="Cerrar('Pantalla')">Cancelar</button>
            </div>
          </div>");
}
function eliminar(){
  $Id = $_GET['Id'];
  include("conexion.php");
  $con = conectar();
  $SQL = "DELETE FROM eventos WHERE IdEvento = '$Id'";
  consultar($con,$SQL);
  desconectar($con);
  header('Location: ../Eventos.php');
}
?>
