<?php
$conexion = mysql_connect("localhost", "root", "crisalltex") or die ('Se ha presentado un problema al conectar con la base de datos. Error:' . mysql_error());
mysql_select_db("encuesta", $conexion);
?>
