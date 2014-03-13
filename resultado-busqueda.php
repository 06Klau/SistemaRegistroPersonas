<?php 
include("php/session.php");
ini_set('display_errors','off');
ini_set('display_startup_errors','off');
error_reporting(0);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<title>Sistema de Registro de Miembros de Iglesia</title>
	
	<link href="stylesheets/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="stylesheets/default.css" rel="stylesheet" type="text/css">
	
	<link href="stylesheets/jquery-ui-1.8.16.custom.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>


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
		<?php include 'php/menu.php'; ?>
		</div>
	</div>
	<div class="container-fluid clearfix ">
		<div class="col-xs-12 rounded content clearfix">
			<h1>Buscar Miembro de Iglesia</h1>

			<?php
if($_GET["message"] == "true"){
	echo '<div class="message-true">Miembro eliminado correctamente<br/></div>';
}
elseif ($_GET["message"] == "false") {
  echo '<div class="message-false">Error al eliminar miembro<br/></div>';
}
?>

<div id="dialogo" title="Eliminar Registro" style="display:none;">
   <p>Esta Seguro de que Desea Eliminar el Registro?</p>
  </div>


			<div class="col-xs-12 clearfix">
				<form id="buscar-per" name="buscar-per" method="post" action="realizar-consulta.php">
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
			<div class="col-xs-12 results">
			<div class="table-responsive">


      <table class="table results" border="0" cellspacing="0" cellpadding="0"> 
        <tr class="head">
        <td>Nombre</td>
        <td>Primer Apellido</td>
        <td class="hidemobile">Segundo Apellido</td>
        <td class="hidemobile">Nacionalidad</td>
        <td class="hidemobile">Estado Civil</td>
        <td class="hidemobile">Edad</td>
        <td class="hidemobile">Estado de Membresía</td>
        <td align="center">Ver</td>
        <td align="center">Editar</td>
        <td align="center">Eliminar</td>
        </tr>

        <?php 


if ($row = mysql_fetch_array($result)){
   do { ?>

   <tr>
   <td><?php echo utf8_encode($row['Nombre']); ?></td>
   <td><?php echo utf8_encode($row['Apellido_1']); ?></td>
   <td class="hidemobile"><?php echo utf8_encode($row['Apellido_2']); ?></td>
   <td class="hidemobile"><?php echo $row['Nacionalidad']; ?></td>
   <td class="hidemobile"><?php echo $row['Estado_Civil']; ?></td>
   <td class="hidemobile">
   <?php  

    $DOB = $row['DOB'];

  // Define la edad
  $from = new DateTime($DOB);
  $to   = new DateTime('today');
  $edad = $from->diff($to)->y;

   echo "$edad"
   ?></td>
   <td class="hidemobile"><?php echo $row['Estado_Membresia']; ?></td>
   <td align="center"><a class="see" href="ver-persona.php?id=<?php echo $row['ID']; ?>">Ver</a></td>
   <td align="center"><a class="edit" href="editar-persona.php?id=<?php echo $row['ID']; ?>">update</a></td>
   <td align="center"><a id="dialogSencillo" class="delete">delete</a></td>
<?php
}
while ($row = mysql_fetch_array($result)); 
   echo "</table> \n"; 
} else { 

echo '<div class="error-login">¡ No se ha encontrado ningun registro !</div>'; 

} 

        ?>
<?php $_SESSION['id'] = $row['ID']; ?>			
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
<script type="text/javascript">
$(document).ready(function(){
	
	// Formateamos el botón Diálogo sencillo
	$('#dialogSencillo');
	
	// Damos formato a la Ventana de Diálogo	
	$('#dialogo').dialog({
		// Indica si la ventana se abre de forma automática
		autoOpen: false,
		// Indica si la ventana es modal
		modal: true,
		// Largo
		width: 350,
		// Alto
		height: 200,
		// Creamos los botones
		buttons: {
			Si: function() {
				window.location.href="eliminar-persona.php";
				
			},
			No: function() {
				$(this).dialog( "close" );
			}			
		}
	});
	
	// Mostrar Diálogo Sencillo
	$('#dialogSencillo').click(function(){
		$('#dialogo').dialog('open');
	});
	
});
</script>
</body>
</html>