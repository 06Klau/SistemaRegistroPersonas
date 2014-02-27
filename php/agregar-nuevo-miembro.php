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


//Insertar datos
if($nombre != '' && $apellido1 != '' && $apellido2 != '' && $Date != '' && $pais != '' 
	&& $genero != '' && $estadocivil != '' && $documento != '' && $numdoc != '' && $direccion != '' && $foto != '')
{	

	$nombre = ucfirst(strtolower( $nombre ) );
	$apellido1 = ucfirst(strtolower( $apellido1 ) );
	$apellido2 = ucfirst(strtolower( $apellido2 ) );
	$MySQLDate = date("Y-m-d", strtotime($Date));
	$foto = $numdoc;

	mysql_query("INSERT INTO agregar_miembro (Nombre,Apellido_1,Apellido_2,DOB,Nacionalidad,Genero,Estado_Civil,Tipo_Doc,Numero_Doc,Direccion,Fotografia)
				values 
				('$nombre','$apellido1','$apellido2','$MySQLDate','$pais','$genero','$estadocivil','$documento','$numdoc','$direccion','$foto')");


	header("Location: ../agregar-persona.php?message=true");

}
else
{
	echo "Todos los campos son requeridos.";
	};
?>
