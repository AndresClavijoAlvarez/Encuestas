<?php
require ("conexion.php");

for ($i=1; $i<5; $i++)
{
	if (!isset($_REQUEST['encuesta_preg' . $i]))
	{
		echo json_encode (array('errors' => 1, 'message' => "Falta la pregunta " . $i . " por responder"));
		exit;
	}
}

$encuesta_fecha = $_REQUEST['encuesta_fecha'];
$encuesta_codigo = $_REQUEST['encuesta_codigo'];
$encuesta_preg1 = $_REQUEST['encuesta_preg1'];
$encuesta_preg2 = $_REQUEST['encuesta_preg2'];
$encuesta_preg3 = $_REQUEST['encuesta_preg3'];
$encuesta_preg4 = $_REQUEST['encuesta_preg4'];

$encuesta_sugerencias = $_REQUEST['encuesta_sugerencias'];
$preg1 = "INSERT INTO votacion (id_pregunta, respuesta, fecha, codigo) VALUES ('1','".$encuesta_preg1."','".$encuesta_fecha."','".$encuesta_codigo."')";
$guardar_preg1 = mysql_query($preg1, $conexion);
if (!$guardar_preg1)
{
	echo json_encode (array('errors' => 1, 'message' => "Ocurrio un error PREG1, El Error es:  " .mysql_error().""));
	exit;
}

$preg2 = "INSERT INTO votacion (id_pregunta, respuesta, fecha, codigo) VALUES ('2','".$encuesta_preg2."','".$encuesta_fecha."','".$encuesta_codigo."')";
$guardar_preg2 = mysql_query($preg2, $conexion);
if (!$guardar_preg2)
{
	echo json_encode (array('errors' => 1, 'message' => "Ocurrio un error PREG2, El Error es:  " .mysql_error().""));
	exit;
}

$preg3 = "INSERT INTO votacion (id_pregunta, respuesta, fecha, codigo) VALUES ('3','".$encuesta_preg3."','".$encuesta_fecha."','".$encuesta_codigo."')";
$guardar_preg3 = mysql_query($preg3, $conexion);
if (!$guardar_preg3)
{
	echo json_encode (array('errors' => 1, 'message' => "Ocurrio un error PREG3, El Error es:  " .mysql_error().""));
	exit;
}

$preg4 = "INSERT INTO votacion (id_pregunta, respuesta, fecha, codigo) VALUES ('4','".$encuesta_preg4."','".$encuesta_fecha."','".$encuesta_codigo."')";
$guardar_preg4 = mysql_query($preg4, $conexion);
if (!$guardar_preg4)
{
	echo json_encode (array('errors' => 1, 'message' => "Ocurrio un error PREG4, El Error es:  " .mysql_error().""));
	exit;
}

$sugerencias = "INSERT INTO sugerencias (fecha, codigo, sugerencia) VALUES ('".$encuesta_fecha.
"','".$encuesta_codigo."','".$encuesta_sugerencias."')";
$guardar_suge = mysql_query($sugerencias, $conexion);
if (!$guardar_suge)
{
	echo json_encode (array('errors' => 1, 'message' => "Ocurrio un error SUGERENCIAS, El Error es:  " .mysql_error().""));
	exit;
}
echo json_encode(array("errors" => 0));
?>