<?php
include("php/session.php");
include('config.php');
?>

<h1>Agregar Usuarios</h1>


<form id="new-user" name="new-user" method="post" action="php/agregar-usuario.php">
<label for='usuario'>Usuario:</label>
<input type="text" name="username" id="username"/>
<label for='pass'>Password:</label>
<input type="password" name="password" id="password"/>
<input type="submit" name="enviar" id="enviar" value="Enviar" />
</form>