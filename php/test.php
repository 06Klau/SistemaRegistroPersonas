
<form name="agregar-per" method="post" action="">
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				 <label class="clearfix" for='nombre'>fecha de nacimiento:</label>
				 <input type="date" name="fechanac" id="fechanac"/>
				 <button type="submit" name="guardar" id="guardar" class="rounded">Guardar</button>
</form>

<?php

$Date = $_POST['fechanac'];

$DOB = date("Y-m-d", strtotime($Date));
//$today = date('Y-m-d');

$from = new DateTime($DOB);
$to   = new DateTime('today');
$edad = $from->diff($to)->y;

echo "$edad";
?>