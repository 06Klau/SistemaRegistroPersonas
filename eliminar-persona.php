<?php

ini_set('display_errors','off');
ini_set('display_startup_errors','off');
error_reporting(0);
include("php/session.php");
include("php/config.php");

$id=$_SESSION['id'];


// Retrieve data from database 
$sql="DELETE FROM agregar_miembro WHERE ID = '$id'";
$result=mysql_query($sql);

if($result){
header("Location: buscar-persona.php?message=true");
}

else {
header("Location: buscar-persona.php?message=false");
}
?>
	

<body>
</html>