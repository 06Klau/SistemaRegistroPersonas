<?php
// Configuracion de la base de datos.
$dbhost = "registromiembros.db.4684682.hostedresource.com"; // Servidor
$dbuser = "registromiembros"; // Usuario
$dbpass = "RegIASD7!"; // Contraseña
$dbname = "registromiembros"; // Nombre de la base de datos

// Creando conexion.
$link = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error()); // Conectamos a la base de datos
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db($dbname,$link) or die(mysql_error()) ; // Seleccionamos la base de datos


?>