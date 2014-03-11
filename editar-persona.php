<?php
include("php/session.php");
include "php/config.php";
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

<?php
$id=$_GET['id'];

// Retrieve data from database 
$sql="SELECT * FROM agregar_miembro WHERE id = '$id'";
$result=mysql_query($sql);
$rows=mysql_fetch_array($result);

?>



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
		<?php include 'php/menu.php'; ?>
		</div>
	</div>
	<div class="container-fluid clearfix">
		<div class="col-xs-12 rounded content">
			<h1>Editar Nuevo Miembro de Iglesia</h1>
			<?php
if($_GET["message"] == "true"){
  echo '<div class="message-true">Miembro actualizado correctamente<br/></div>';
}
else{}
?>
			<form id="editar-per" name="editar-per" method="post" action="php/guardar-edicion.php">
			<input type="hidden" value="<?php echo $id; ?> " name="id" id="id">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='nombre'>Nombre:</label>
				 <input class="clearfix rounded" type="text" name="nombre" id="nombre" value="<?php echo $rows['Nombre']; ?>" />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='apellido1'>Primer Apellido:</label>
				 <input class="clearfix rounded" type="text" name="apellido1" id="apellido1" value="<?php echo $rows['Apellido_1']; ?>" />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='apellido2'>Segundo Apellido:</label>
				 <input class="clearfix rounded" type="apellido2" name="apellido2" id="apellido2" value="<?php echo $rows['Apellido_2']; ?>" />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='fechanac'>Fecha de Nac.:</label>
				 <input class="clearfix rounded" type="date" name="fechanac" id="fechanac" value="<?php echo $rows['DOB']; ?>" />
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						 <label class="clearfix" for='nacionalidad'>Nacionalidad:</label>
					<div class="col-xs-12 select_join">
						 <select name="pais" id="pais">
						 <option selected=""><?php echo $rows['Nacionalidad']; ?></option>
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
				 <label class="clearfix" for='estado-civil'>Estado de Membresía:</label>
				<div class="select_join col-xs-12">
					<select name="estadomembresia" id="estadomembresia">
						<option selected><?php echo $rows['Estado_Membresia']; ?></option>
						<option value="Activo">Activo</option>
						<option value="Sancionado">Sancionado</option>
						<option value="Desfraternizado">Desfraternizado</option>
						<option value="Desconocido">Paradero Desconocido</option>
						<option value="Traslado">Trasladado</option>
					 </select>
				</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='estado-civil'>Estado Civil:</label>
				<div class="select_join col-xs-12">
					<select name="estadocivil" id="estado-civil">
						<option selected><?php echo $rows['Estado_Civil']; ?></option>
						<option value="Soltero">Soltero(a)</option>
						<option value="Casado">Casado(a)</option>
						<option value="Divorciado">Divorciado(a)</option>
						<option value="Viudo">Viudo(a)</option>
					 </select>
				</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='tipo-doc'>Tipo de Documento:</label>
				 <div class="select_join col-xs-12">
					<select name="documento" id="documento">
						<option selected><?php echo $rows['Tipo_Doc']; ?></option>
						<option value="Nac">Cédula Física</option>
						<option value="Ext">Cédula de Residencia</option>
						<option value="Menor">Menor de edad</option>
					 </select>
				</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='numero-doc'>Número de Doc.:</label>
				 <input class="clearfix rounded" type="text" name="numdoc" id="num-doc" value="<?php echo $rows['Numero_Doc']; ?>" />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='direccion'>Dirección:</label>
				 <input class="clearfix rounded" type="text" name="direccion" id="direccion" value="<?php echo $rows['Direccion']; ?>" />
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='foto'>Fotografía:</label>
				 <input class="clearfix rounded" type="file" name="foto" id="foto" value="<?php echo $rows['Fotografia']; ?>" />
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
</body>
</html>