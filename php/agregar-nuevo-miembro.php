<?php
include "config.php";

//Paso de variables

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
$foto = $_POST['foto'];
$membresia = 'Activo';


//Insertar datos
if($nombre != '' && $apellido1 != '' && $apellido2 != '' && $Date != '' && $pais != '' 
	&& $genero != '' && $estadocivil != '' && $documento != '' && $numdoc != '' && $direccion != '' && $foto != '')
{	

	$nombre = ucfirst(strtolower( $nombre ) );
	$apellido1 = ucfirst(strtolower( $apellido1 ) );
	$apellido2 = ucfirst(strtolower( $apellido2 ) );
	$MySQLDate = date("Y-m-d");
	$DOB = date("Y-m-d", strtotime($Date));
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


	mysql_query("INSERT INTO agregar_miembro (Nombre,Apellido_1,Apellido_2,DOB,Nacionalidad,Genero,Estado_Civil,Tipo_Doc,Numero_Doc,Direccion,Estado_Membresia,Fotografia)
				values 
				('$nombre','$apellido1','$apellido2','$DOB','$pais','$genero','$estadocivil','$documento','$numdoc','$direccion','$membresia','$foto')");


	header("Location: ../agregar-persona.php?message=true");

}
else
{
	echo "Todos los campos son requeridos.";
	};
?>
