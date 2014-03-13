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
$con = Conectarse();

$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];

$result = mysql_query("SELECT * FROM agregar_miembro WHERE Nombre = '".utf8_decode($nombre)."' Or Apellido_1 = '".$apellido1."' Or Apellido_2 = '".$apellido2."' ", $con);




include_once "resultado-busqueda.php";

?>		