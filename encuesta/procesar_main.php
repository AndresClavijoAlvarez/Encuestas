<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Procesar</title>
</head>
<style type="text/css">
body,td,th {
	color: #000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12pt;
	font-weight: normal;
}
body {
	background-color: #FFF;
	text-align: center;
	font-weight: bold;
}
</style>
<body>
<?php
if (isset($_REQUEST['main_codigo_registrado'])) 
	{
		if (empty($_REQUEST['main_codigo_registrado'])) 
	{
			echo "No Ingreso Valor, da click en: <a href='main.php' target='mainFrame'><strong>VOLVER</strong></a>";
	} else {
	require ("conexion.php");
	$main_codigo_registrado = $_REQUEST['main_codigo_registrado'];
	$sql = "SELECT * FROM calificadores WHERE codigo = '".$main_codigo_registrado."'";
	$extraccion = mysql_query($sql, $conexion) or die(mysql_error());
	while ($dat = mysql_fetch_assoc($extraccion)) 
		{
?>
		<form action="encuesta.php?procesar_main_codigo=<?php echo $dat['codigo']; ?>" method="post" enctype="multipart/form-data" name="procesar_main" target="mainFrame" id="procesar_main">Los datos registrados son:
        	<br />
            <br />
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">Codigo:</td>
					<td align="left" valign="middle"><input name="procesar_main_codigo" type="text" disabled="disabled" id="procesar_main_codigo" value="<?php echo $dat['codigo']; ?>" size="15" maxlength="11" readonly="readonly" /></td>
				</tr>
				<tr>
					<td align="left">Nombre:</td>
					<td align="left" valign="middle"><input name="procesar_main_nombre" type="text" disabled="disabled" id="procesar_main_nombre" value="<?php echo $dat['nombre']; ?>" size="65" maxlength="60" readonly="readonly" /></td>
				</tr>
				<tr>
					<td align="left">Ciudad:</td>
					<td align="left" valign="middle"><input name="procesar_main_ciudad" type="text" disabled="disabled" id="procesar_main_ciudad" value="<?php echo $dat['ciudad']; ?>" size="25" maxlength="20" readonly="readonly" /></td>
				</tr>
				<tr>
					<td align="left">Area:</td>
					<td align="left" valign="middle"><input name="procesar_main_area" type="text" disabled="disabled" id="procesar_main_area" value="<?php echo $dat['area']; ?>" size="25" maxlength="20" readonly="readonly" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="left">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" align="center" valign="middle"><br />Si los datos no corresponden a tu codigo, da click aqui: <a href="javascript:history.go(-1);" target="mainFrame"><strong>VOLVER</strong></a><br /><br />Si tus datos son correctos, da click en: <br />
        				<input type="submit" name="procesar_main_ir_encuesta" id="procesar_main_ir_encuesta" value="Ir a la Encuesta" /></td>
				</tr>
			</table>
		</form>
<?php
			mysql_close($conexion);
		}
	}
		}
if (isset($_REQUEST['main_codigo_nuevo']) and isset($_REQUEST['main_nombre_nuevo']) and isset($_REQUEST['main_ciudad_nuevo']) and isset($_REQUEST['main_area_nuevo']))  
	{
			if (empty($_REQUEST['main_codigo_nuevo']) or empty($_REQUEST['main_nombre_nuevo']) or empty($_REQUEST['main_ciudad_nuevo']) or empty($_REQUEST['main_area_nuevo'])) 
	{
			echo "No Ingreso Valor, da click en: <a href='main.php' target='mainFrame'><strong>VOLVER</strong></a>";
	} else {
	require ("conexion.php");
	$main_codigo_nuevo = $_REQUEST['main_codigo_nuevo'];
	$main_nombre_nuevo = $_REQUEST['main_nombre_nuevo'];
	$main_ciudad_nuevo = $_REQUEST['main_ciudad_nuevo'];
	$main_area_nuevo = $_REQUEST['main_area_nuevo'];
	$sql = "INSERT INTO calificadores (codigo, nombre, ciudad, area) VALUES ('".$main_codigo_nuevo."','".$main_nombre_nuevo."','".$main_ciudad_nuevo."','".$main_area_nuevo."')";
	$guardar = mysql_query($sql, $conexion) or die("Ocurrio un error, el Codigo ya se encuentra creado. El Error es:  " .mysql_error()." --<a href='javascript:history.go(-1);' target='mainFrame'><strong>VOLVER</strong></a>--");
	$sql = "SELECT * FROM calificadores WHERE codigo = '".$main_codigo_nuevo."'";
	$extraccion = mysql_query($sql, $conexion) or die(mysql_error());
	while ($dat = mysql_fetch_assoc($extraccion)) 
		{
?>
		<form action="encuesta.php?procesar_main_codigo=<?php echo $dat['codigo']; ?>" method="post" enctype="multipart/form-data" name="procesar_main" target="mainFrame" id="procesar_main">Los datos registrados son:
        	<br />
            <br />
			<table border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td align="left">Codigo:</td>
					<td align="left" valign="middle"><input name="procesar_main_codigo" type="text" disabled="disabled" id="procesar_main_codigo" value="<?php echo $dat['codigo']; ?>" size="15" maxlength="11" readonly="readonly" /></td>
				</tr>
				<tr>
					<td align="left">Nombre:</td>
					<td align="left" valign="middle"><input name="procesar_main_nombre" type="text" disabled="disabled" id="procesar_main_nombre" value="<?php echo $dat['nombre']; ?>" size="65" maxlength="60" readonly="readonly" /></td>
				</tr>
				<tr>
					<td align="left">Ciudad:</td>
					<td align="left" valign="middle"><input name="procesar_main_ciudad" type="text" disabled="disabled" id="procesar_main_ciudad" value="<?php echo $dat['ciudad']; ?>" size="25" maxlength="20" readonly="readonly" /></td>
				</tr>
				<tr>
					<td align="left">Area:</td>
					<td align="left" valign="middle"><input name="procesar_main_area" type="text" disabled="disabled" id="procesar_main_area" value="<?php echo $dat['area']; ?>" size="25" maxlength="20" readonly="readonly" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td align="left">&nbsp;</td>
				</tr>
				<tr>
					<td colspan="2" align="center" valign="middle"><br />Si los datos no corresponden a tu codigo, da click aqui: <a href="javascript:history.go(-1);" target="mainFrame"><strong>VOLVER</strong></a><br /><br />Si tus datos son correctos, da click en: <br />
        				<input type="submit" name="procesar_main_ir_encuesta" id="procesar_main_ir_encuesta" value="Ir a la Encuesta" /></td>
				</tr>
			</table>
		</form>
<?php
			mysql_close($conexion);
			}
	}
	}
?>
</body>
</html>