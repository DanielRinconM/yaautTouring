<?php


function insertarEvento($con){
	$nombreEvento = $_POST['nombreEvento'];
    $fechaInicio = $_POST['fechaInicio'];
    $fechaFinal = $_POST['fechaFinal'];
    $horaInicio = $_POST['horaInicio'];
    $horaFinal = $_POST['horaFinal'];
    $tipo = $_POST['tipo'];
    $lugar = $_POST['lugar'];
    $fechaUltimoPago = $_POST['fechaUltimoPago'];

$target_dir = "banners/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
    $banner = "-";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    $banner = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
if($nombreEvento AND $fechaInicio AND $fechaFinal AND $horaInicio AND $horaFinal AND $lugar AND $tipo AND $banner AND $fechaUltimoPago){
    	$validate = true;	    
	if($fechaFinal<$fechaInicio)
	{
		echo "La fecha final no puede ser anterior a la fecha de inicio";
		$validate = false;
	}
	else if($fechaFinal == $fechaInicio)
	{
		if($horaFinal<$horaInicio)
		{
			echo "La hora final no puede ser anterior a la hora de inicio";
			$validate = false;
		}
		else
		{
			$validate = true;
		}
		
	}
	if($fechaUltimoPago > $fechaFinal)
	{
		echo "La fecha de ultimo pago no puede ser mayor que la fecha de finalizacion del evento";
		$validate = false;
	}
	else
	{
		$validate = true;
	}
	$SQL = "SELECT nombreEvento, fechaInicio from eventos where nombreEvento='$nombreEvento' AND fechaInicio='$fechaInicio';";
	$eventoIgual = consultar($con,$SQL);	
	$n = mysqli_num_rows($eventoIgual);
	if($n>0)
	{
		echo "Ya existe un evento con el mismo nombre y fecha";
		$validate = "false";
	}
	else
	{

		$validate = "true";
	}
	if( $validate == true)	
	{
 $SQL = "INSERT INTO eventos(nombreEvento,fechaInicio,fechaFinal,horaInicio,horaFinal,lugar,status,tipo,banner,fechaUltimoPago) VALUES ('$nombreEvento','$fechaInicio','$fechaFinal','$horaInicio','$horaFinal','$lugar','Proximo','$tipo','$banner','$fechaUltimoPago')";
consultar($con, $SQL);
    	}
	else
	{
		echo "Imposible insertar";
	}
}
}
?>
