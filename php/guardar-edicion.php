<?php

function Conectarse(){

  if(!($link=mysql_connect('registromiembros.db.4684682.hostedresource.com','registromiembros','RegIASD7!')))
  {
    echo "Error conectando a la base de datos";
    exit();
  }
  if(!mysql_select_db("registromiembros",$link))
  {
    echo "Error seleccionando base de datos";
    exit();
  }
  return $link;
}
mysql_query("SET NAMES 'utf8'");

$con = Conectarse();


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
$estadomembresia = $_POST['estadomembresia'];
$foto = $_POST['foto'];
$id = $_POST['id'];


$edicion ="UPDATE agregar_miembro SET Nombre = '$nombre', Apellido_1 = '$apellido1', Apellido_2 ='$apellido2', DOB='$Date', Nacionalidad='$pais', Genero='$genero', Estado_Civil='$estadocivil', Tipo_Doc='$documento', Numero_Doc='$numdoc', Direccion='$direccion', Estado_Membresia='$estadomembresia' WHERE id = '$id'";
$result=mysql_query($edicion, $con);

// if successfully updated. 
if($result){
header("Location: ../editar-persona.php?message=true");
}

else {
echo "Todos los campos son requeridos.";
}

?>