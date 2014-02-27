<?php

ini_set('display_errors','off');
ini_set('display_startup_errors','off');
error_reporting(0);

$username = $_POST['username'];
$password = $_POST['password'];

function Conectarse(){

	if(!($link=mysql_connect('localhost:8888','test','123456')))
	{
		echo "Error conectando a la base de datos";
		exit();
	}
	if(!mysql_select_db("registro_personas",$link))
	{
		echo "Error seleccionando base de datos";
		exit();
	}
	return $link;
}

$con = Conectarse();
$query = "SELECT * FROM usuarios WHERE username = '".$username."' AND password = '".md5($password)."'";
$q = mysql_query($query, $con);

try{

if(mysql_result($q,0))
{
	session_start();
	$_SESSION["autentificado"] = true;
	$_SESSION["user"] = $_POST["user"];
	header("Location: ../inicio.php");

}
else
	header("Location: ../index.php?error=data");
}
catch(Exception $error){}
mysql_close($con);
?>