<?php
include("php/session.php");
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<title>Sistema de Registro de Miembros de Iglesia</title>
	<link href="stylesheets/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="stylesheets/default.css" rel="stylesheet" type="text/css">
</head>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<body>
<div class="container clearfix">
	<div class="container-fluid ">
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 col-lg-8 col-lg-offset-0">
			<a class="logo" href="#"><img class="img-responsive" src="images/logo-iasd.png"/></a>
		</div>
	</div>
</div>
<div class="expand">
	<hr>
</div>
<div class="container">
	<div class="container-fluid clearfix">
		<div class="col-xs-12 rounded navbar">
		<ul>
			<li class="col-xs-12 col-sm-4 col-md-4 col-lg-3 row"><a href="agregar-persona.php"><img src="images/add-person-icon.gif"/>Agregar Miembro</a></li>
			<li class="col-xs-12 col-sm-4 col-md-4 col-lg-3 row"><a href="buscar-persona.php"><img src="images/search-icon.gif"/>Buscar Miembro</a></li>
			<li class="col-xs-12 col-sm-4 col-md-4 col-lg-3 row"><a href="#"><img src="images/report-icon.gif"/>Generar Reporte</a></li>
			<li class="col-xs-12 col-sm-4 col-md-4 col-lg-3 row"><a href="php/salir.php"><img src="images/exit-icon.gif"/>Salir</a></li>
		</ul>
		</div>
	</div>
</div>
</body>
</html>