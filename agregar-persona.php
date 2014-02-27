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
	<div class="container-fluid clearfix">
		<div class="col-xs-12 rounded content">
			<h1>Agregar Nuevo Miembro de Iglesia</h1>
			<?php
if($_GET["message"] == "true"){
	echo '<div class="message-true">Miembro agregado correctamente<br/></div>';
}
else{}
?>
			<form id="agregar-per" name="agregar-per" method="post" action="php/agregar-nuevo-miembro.php">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='nombre'>Nombre:</label>
				 <input class="clearfix rounded" type="nombre" name="nombre" id="nombre" placeholder="Nombre" required/>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='apellido1'>Primer Apellido:</label>
				 <input class="clearfix rounded" type="apellido1" name="apellido1" id="apellido1" placeholder="Primer Apellido" required/>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='apellido2'>Segundo Apellido:</label>
				 <input class="clearfix rounded" type="apellido2" name="apellido2" id="apellido2" placeholder="Segundo Apellido" required/>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='fechanac'>Fecha de Nac.:</label>
				 <input class="clearfix rounded" type="date" name="fechanac" id="fechanac" placeholder="DD/MM/YYYY" required/>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						 <label class="clearfix" for='nacionalidad'>Nacionalidad:</label>
					<div class="col-xs-12 select_join">
						 <select name="pais" id="pais" required>
						 <option value="">Selecciona...</option>
						 </select>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='genero'>Género:</label>
				 <label class="clearfix genero" for='masculino'>Maculino:</label>
				 <input class="radiobutton" name="genero" type="radio" value="Masculino"/>
				 <label class="clearfix genero" for='femenino'>Femenino:</label>
				 <input class="radiobutton" name="genero" type="radio" value="Femenino"/>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='estado-civil'>Estado Civil:</label>
				<div class="select_join col-xs-12">
					<select name="estadocivil" id="estado-civil" required>
						<option>Soltero(a)</option>
						<option>Casado(a)</option>
						<option>Divorciado(a)</option>
						<option>Viudo(a)</option>
					 </select>
				</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='tipo-doc'>Tipo de Documento:</label>
				 <div class="select_join col-xs-12">
					<select name="documento" id="documento" required>
						<option value="Nac">Cédula Física</option>
						<option value="Ext">Cédula de Residencia</option>
						<option value="Menor">Menor de edad</option>
					 </select>
				</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='numero-doc'>Número de Doc.:</label>
				 <input class="clearfix rounded" type="num-doc" name="numdoc" id="num-doc" placeholder="Número de Doc." required/>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='direccion'>Dirección:</label>
				 <input class="clearfix rounded" type="direccion" name="direccion" id="direccion" placeholder="Dirección" required/>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='foto'>Fotografía:</label>
				 <input class="clearfix rounded" type="file" name="foto" id="foto" required/>
				</div>
				<button type="submit" name="guardar" id="guardar" class="rounded">Guardar</button>
				<button class="rounded limpiar" type='button'>Limpiar</button>
			</form>
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