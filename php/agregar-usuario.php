<!--<meta http-equiv="refresh" content="2;URL=../index.php">-->

<?php
//Conectar a la Base de Datos

include "config.php";

$username = $_POST ['username'];
$password = md5($_POST ['password']);

if($username!='' && $password!=''){
	mysql_query("INSERT INTO usuarios(username, password)values('$username','$password')");
	echo "Los datos se ingresaron correctamente";
}
else{
	echo "Todos los datos deben contener datos";
};

?>