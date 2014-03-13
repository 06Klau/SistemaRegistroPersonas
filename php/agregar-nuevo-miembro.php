<?php
ini_set('memory_limit', '-1');

include "config.php";

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$Date = $_POST['fechanac'];
$pais = $_POST['pais'];
$genero = $_POST['genero'];
$estadocivil = $_POST['estadocivil'];
$documento = $_POST['documento'];
$numdoc = $_POST['numdoc'];
$direccion = $_POST['direccion'];
$fechabau = $_POST['fechabau'];
$membresia = 'Activo';
$foto = $numdoc;

$nombreimg = $_FILES['archivo']['name'];

$ext_permitidas = array('jpg','jpeg','gif','png');
$extension = end( explode('.', $_FILES['archivo']['name']) );
$ext_correcta = in_array($extension, $ext_permitidas);

$tipo_correcto = preg_match('/^image\/(pjpeg|jpeg|gif|png)$/', $_FILES['archivo']['name']);

$nombre_tmp = $_FILES['archivo']['tmp_name'];
$tipo = $_FILES['archivo']['type'];
$tamano = $_FILES['archivo']['size'];
$limite = 4000000;
$degrees = 0;

$ext_permitidas = array('jpg','jpeg','gif','png');
$partes_nombre = explode('.', $nombreimg);
$extension = end( $partes_nombre );
$ext_correcta = in_array($extension, $ext_permitidas);
$tipo_correcto = preg_match('/^image\/(pjpeg|jpeg|gif|png)$/', $tipo);

if($tamano <= $limite){
	if( $ext_correcta && $tipo_correcto){
	$ruta_imagen = $_FILES['archivo']['tmp_name'];

      	$miniatura_ancho_maximo = 179;
		$miniatura_alto_maximo = 239;
		$info_imagen = getimagesize($ruta_imagen);
		$imagen_ancho = $info_imagen[0];
		$imagen_alto = $info_imagen[1];
		$imagen_tipo = $info_imagen['mime'];

		$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );

		switch ( $imagen_tipo ){
		  case "image/jpg":
		  case "image/jpeg":
		    $imagen = imagecreatefromjpeg( $ruta_imagen );
		    break;
		  case "image/png":
		    $imagen = imagecreatefrompng( $ruta_imagen );
		    break;
		  case "image/gif":
		    $imagen = imagecreatefromgif( $ruta_imagen );
		    break;
		}

		$proporcion_imagen = $imagen_ancho / $imagen_alto;
		$proporcion_miniatura = $miniatura_ancho_maximo / $miniatura_alto_maximo;

		if ( $proporcion_imagen > $proporcion_miniatura ){
		  $miniatura_ancho = $miniatura_alto_maximo * $proporcion_imagen;
		  $miniatura_alto = $miniatura_alto_maximo;
		} else if ( $proporcion_imagen < $proporcion_miniatura ){
		  $miniatura_ancho = $miniatura_ancho_maximo;
		  $miniatura_alto = $miniatura_ancho_maximo / $proporcion_imagen;
		} else {
		  $miniatura_ancho = $miniatura_ancho_maximo;
		  $miniatura_alto = $miniatura_alto_maximo;
		}

		$x = ( $miniatura_ancho - $miniatura_ancho_maximo ) / 2;
		$y = ( $miniatura_alto - $miniatura_alto_maximo ) / 2;


		$lienzo = imagecreatetruecolor( $miniatura_ancho_maximo, $miniatura_alto_maximo );

		$lienzo_temporal = imagecreatetruecolor( $miniatura_ancho, $miniatura_alto );

		imagecopyresampled($lienzo_temporal, $imagen, 0, 0, 0, 0, $miniatura_ancho, $miniatura_alto, $imagen_ancho, $imagen_alto);
		imagecopy($lienzo, $lienzo_temporal, 0,0, $x, $y, $miniatura_ancho_maximo, $miniatura_alto_maximo);

		imagedestroy($imagen);

		imagejpeg( $lienzo, "../uploads/".$foto.".jpg");
      }
      else{
   header("Location: ../agregar-persona.php?message=imagefalse");
   exit;
  }
}
else{
	header("Location: ../agregar-persona.php?message=imagelimit");
	exit;
}

//Insertar datos
if($nombre != '' && $apellido1 != '' && $apellido2 != '' && $Date != '' && $pais != '' 
	&& $genero != '' && $estadocivil != '' && $documento != '' && $numdoc != '' && $direccion != '' && $fechabau != '')
{	

	$nombre = ucfirst(strtolower( $nombre ) );
	$apellido1 = ucfirst(strtolower( $apellido1 ) );
	$apellido2 = ucfirst(strtolower( $apellido2 ) );
	$MySQLDate = date("Y-m-d");
	$DOB = date("Y-m-d", strtotime($Date));
	$BAU = date("Y-m-d", strtotime($fechabau));
	$foto = $numdoc;

	// Define la edad
	$from = new DateTime($DOB);
	$to   = new DateTime('today');
	$edad = $from->diff($to)->y;

	if($edad < 18){
		$numdoc = 00000;
	}
	else{
		$numdoc = $numdoc;
	}

	mysql_query("INSERT INTO agregar_miembro (Nombre,Apellido_1,Apellido_2,DOB,Nacionalidad,Genero,Estado_Civil,Tipo_Doc,Numero_Doc,Bautismo,Direccion,Estado_Membresia,Fotografia)
				values 
				('$nombre','$apellido1','$apellido2','$DOB','$pais','$genero','$estadocivil','$documento','$numdoc','$BAU','$direccion','$membresia','$foto')");

header("Location: ../agregar-persona.php?message=true");

}
else
{
	echo "Todos los campos son requeridos.";
	};


?>