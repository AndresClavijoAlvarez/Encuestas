<?php
	require ("conexion.php");
	$query = "
			SELECT *
			FROM calificadores
			WHERE (codigo = \"" . (isset($_POST['main_codigo_registrado']) ? $_POST['main_codigo_registrado'] : "") . "\")
			";
	
	$rst = mysql_query($query, $conexion) or die(mysql_error());
	
	if (mysql_num_rows($rst) < 1)
		echo json_encode(array('exist' => 0));
	else
		echo json_encode(array('exist' => 1));
?>