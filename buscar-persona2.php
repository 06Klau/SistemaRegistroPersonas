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
	<script type="text/javascript" src="js/jquery-2.1.0.min.js"></script>
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
	<div class="container-fluid clearfix ">
		<div class="col-xs-12 rounded content clearfix">
			<h1>Buscar Miembro de Iglesia</h1>
			<div class="col-xs-12 clearfix">
				<form id="buscar-per" name="buscar-per" method="post" action="php/realizar-consulta.php">
					 <label class="clearfix" for='nombre'>Escriba el Nombre y apellido  de la persona que desea buscar:</label>
           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
					 <input class="clearfix rounded" type="text" name="nombre" id="nombre" placeholder="Nombre" required/>
           </div>
           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
           <input class="clearfix rounded" type="text" name="apellido1" id="apellido1" placeholder="Primer Apellido" />
           </div>
           <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
           <input class="clearfix rounded" type="text" name="apellido2" id="apellido2" placeholder="Segundo Apellido" />
           </div>
					  <button class="rounded buscar" type='submit'>Buscar</button>
				</form>
			</div>
			<div class="col-xs-12">
			<div class="table-responsive">
				<table class="table results" border="0" cellspacing="0" cellpadding="0">
  <tr class="head">
    <td>Nombre</td>
    <td>Primer Apellido</td>
    <td class="hidemobile">Segundo Apellido</td>
    <td class="hidemobile">Nacionalidad</td>
    <td class="hidemobile">Estado Civil</td>
    <td class="hidemobile"># de Documento</td>
    <td class="hidemobile">Estado de Membresía</td>
    <td>Editar</td>
    <td>Eliminar</td>
  </tr>
  <tr>
    <td>Rodrigo</td>
    <td>Ovares</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
    <td><a class="edit" href="#">Edit</a></td>
    <td><a class="delete" href="#">delete</a></td>
  </tr>
  <tr>
    <td>Carlos</td>
    <td>Ovares</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
    <td class="hidemobile">Ejemplo</td>
   <td><a class="edit" href="#">Edit</a></td>
    <td><a class="delete" href="#">delete</a></td>
  </tr>
</table>
</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function()
    {
    	var miselect=$("#pais");

    	miselect.find('option').remove().end().append('<option value="">Cargando...</option>').val('');

    	 $.post("array-paises.php",
                function(data) {
                    miselect.empty();
                    for (var i=0; i<data.length; i++) {
                        miselect.append('<option value="' + data[i].id + '">' + data[i].literal + '</option>');
                    }
            }, "json");

 });
</script>
<?php
include "php/config.php";
?>
</body>
</html>