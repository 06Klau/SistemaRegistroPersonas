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
			<h1>Miembro de Iglesia ID # <?php echo "$id"?></h1>
			<form id="editar-per" name="editar-per" method="post" action="php/guardar-edicion.php">
			<input type="hidden" value="<?php echo $id; ?> " name="id" id="id">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='nombre'>Nombre:</label>
				 <?php echo $rows['Nombre']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='apellido1'>Primer Apellido:</label>
				 <?php echo $rows['Apellido_1']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='apellido2'>Segundo Apellido:</label>
				 <?php echo $rows['Apellido_2']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='fechanac'>Fecha de Nac.:</label>
				<?php echo $rows['DOB']; ?>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='fechanac'>Edad:</label>
				<?php  

    $DOB = $rows['DOB'];

  // Define la edad
  $from = new DateTime($DOB);
  $to   = new DateTime('today');
  $edad = $from->diff($to)->y;

   echo "$edad"
   ?>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
						 <label class="clearfix" for='nacionalidad'>Nacionalidad:</label>
					<?php echo $rows['Nacionalidad']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='genero'>Género:</label>
				 <?php echo $rows['Genero']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='estado-civil'>Estado de Membresía:</label>
				<?php echo $rows['Estado_Membresia']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='estado-civil'>Fecha de bautismo:</label>
				<?php echo $rows['Bautismo']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='estado-civil'>Estado Civil:</label>
				<?php echo $rows['Estado_Civil']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='tipo-doc'>Tipo de Documento:</label>
				 <?php echo $rows['Tipo_Doc']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='numero-doc'>Número de Doc.:</label>
				 <?php echo $rows['Numero_Doc']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='direccion'>Dirección:</label>
				<?php echo $rows['Direccion']; ?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='foto'>Fotografía:</label>
				 <div class="border-image-miembro">
					 <div class="imagen-miembro">
					<?php
					$var = $rows['Fotografia']; 
					echo "<img src='uploads/$var.jpg' >";
					?>
					</div>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>