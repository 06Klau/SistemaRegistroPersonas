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
		<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<h1>Sistema de Registro de Miembros de Iglesia</h1>
		</div>
	</div>
	<div class="container-fluid">
				<div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
					<div class="login">
					<form name="autentification_frm" method="post" action="php/control.php" enctype="application/x-www-from-urlencoded">
					<!--PHP LOGIN-->
					<?php
error_reporting(E_ALL ^ E_NOTICE); // Oculta todos los errores

if($_GET["error"] == "data"){
	echo '<div class="error-login">Usuario o Password Incorrecto<br/></div>';
}
else{}
?>
<!--TERMINA PHP LOGIN-->
				    	<label class="clearfix" for='nombre'>Usuario:</label>
				        <input class="clearfix rounded" type="text" name="username" id="username"/>
				        <a href="#">Olvidó su usuario?</a>
				        <label class="clearfix" for='nombre'>Contraseña:</label>
				        <input class="clearfix rounded" type="password" name="password" id="password"/>
				        <a href="#">Olvidó su contraseña?</a>
				        <button class="rounded" type='submit'>Ingresar</button>
        			</form>
        			</div>
				</div>
			</div>

</div>
</body>
</html>