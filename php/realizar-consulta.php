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

$result = mysql_query("SELECT * FROM agregar_miembro WHERE Nombre = '".$nombre."' Or Apellido_1 = '".$apellido1."' Or Apellido_2 = '".$apellido2."' ", $con);

if ($row = mysql_fetch_array($result)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td>Nombre</td><td>Primer Apellido</td><td>Segundo Apellido</td><td>Fecha de Nac.</td><td>Nacionalidad</td><td>Estado_Membresia</td></tr> \n"; 
   do { 
      echo "<tr><td>".$row["Nombre"]."</td><td>".$row["Apellido_1"]."</td><td>".$row["Apellido_2"]."</td><td>".$row["DOB"]."</td><td>".$row["Nacionalidad"]."</td><td>".$row["Estado_Membresia"]."</td></tr> \n"; 
   } 
while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningun registro !"; 
} 


?>




