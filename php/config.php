<?php
// Configuracion de la base de datos.
$dbhost = "localhost:8888"; // Servidor
$dbuser = "test"; // Usuario
$dbpass = "123456"; // Contraseña
$dbname = "registro_personas"; // Nombre de la base de datos

// Creando conexion.
$link = mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error()); // Conectamos a la base de datos
		mysql_query("SET NAMES 'utf8'");
		mysql_select_db($dbname,$link) or die(mysql_error()) ; // Seleccionamos la base de datos


?>