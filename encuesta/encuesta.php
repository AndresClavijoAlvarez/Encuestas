<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="theme/css/jquery.jgrowl.css" rel="stylesheet" />
<link type="text/css" href="theme/css/styles.css" rel="stylesheet" />
<script type="text/javascript" src="theme/js/jquery.min.js"></script>
<script type="text/javascript" src="theme/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="theme/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="theme/js/scripts.js"></script>
<title>ENCUESTA</title>
<style type="text/css">
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
	font-style: italic;
}
</style>
</head>
<?php
//$fecha = date();
$encuesta_fecha = date("Y-m-d");//echo "XXX".$encuesta_fecha;
if (isset($_REQUEST['procesar_main_codigo'])) 
	{
	require ("conexion.php");
	$procesar_main_codigo = $_REQUEST['procesar_main_codigo'];
	$sql = "SELECT * FROM calificadores WHERE codigo = '".$procesar_main_codigo."'";
	$extraccion = mysql_query($sql, $conexion) or die(mysql_error()); 
	while ($dat = mysql_fetch_assoc($extraccion)) 
		{
?>
<body>
<form action="guardar_encuesta.php?encuesta_codigo=<?php echo $dat['codigo']; ?>&encuesta_fecha=<?php echo $encuesta_fecha; ?>" method="POST" enctype="multipart/form-data" name="encuesta" target="mainFrame" id="encuesta">
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left">Codigo:</td>
      <td align="left" valign="middle"><input name="encuesta_codigo" type="text" disabled="disabled" id="procesar_main_codigo" value="<?php echo $dat['codigo']; ?>" size="15" maxlength="11" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left">Nombre:</td>
      <td align="left" valign="middle"><input name="encuesta_nombre" type="text" disabled="disabled" id="procesar_main_nombre" value="<?php echo $dat['nombre']; ?>" size="65" maxlength="60" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left">Ciudad:</td>
      <td align="left" valign="middle"><input name="encuesta_ciudad" type="text" disabled="disabled" id="procesar_main_ciudad" value="<?php echo $dat['ciudad']; ?>" size="25" maxlength="20" readonly="readonly" /></td>
    </tr>
    <tr>
      <td align="left">Area:</td>
      <td align="left" valign="middle"><input name="encuesta_area" type="text" disabled="disabled" id="procesar_main_area" value="<?php echo $dat['area']; ?>" size="25" maxlength="20" readonly="readonly" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="middle">        Si los datos no corresponden a tu codigo, da click aqui: <a href="javascript:history.go(-1);" target="mainFrame"><strong>VOLVER</strong></a><br /></td>
    </tr>
  </table>
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td width="905" height="40" colspan="15" align="center" valign="top"><h3><strong>De acuerdo al servicio prestado por el personal    del proceso de soporte tecnológico, marque con una X la calificación para cada criterio.</strong></h3></td>
    </tr>
  </table>
  <table border="1" align="center" cellpadding="0" cellspacing="0">
    <tr></tr>
  <tr>
    <td align="left" scope="row">1. ¿El asesoramiento tecnológico por parte del personal fue?</td>
    <td><table width="88" align="center">
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg1" value="Malo"/>Malo</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg1" value="Regular"/>Regular</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg1" value="Bueno"/>Bueno</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" scope="row">2. ¿La rapidez del servicio prestado por parte del personal fue?</td>
    <td><table width="88" align="center">
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg2" value="Malo"/>Malo</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg2" value="Regular"/>Regular</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg2" value="Bueno"/>Bueno</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" scope="row">3. ¿La atención, el respeto y la cordialidad por parte del personal fue?</td>
    <td><table width="88" align="center">
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg3" value="Malo"/>Malo</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg3" value="Regular"/>Regular</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg3" value="Bueno"/>Bueno</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" scope="row">4. ¿El nivel de satisfacción por la solución suministrada por parte del personal fue?</td>
    <td><table width="88" align="center">
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg4" value="Malo"/>Malo</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg4" value="Regular"/>Regular</td>
      </tr>
      <tr>
        <td align="left" valign="middle"><input type="radio" name="encuesta_preg4" value="Bueno"/>Bueno</td>
      </tr>
    </table></td>
  </tr>
  <tr></tr>
</table>
  <h3>SUGERENCIAS:</h3>
     <textarea name="encuesta_sugerencias"cols="100" rows="5"></textarea>
  </h4>
  <br />
  <br />
  Verifica tus respuestas antes de enviar el formulario, una ves lo envies, no se puede dar marcha atras.<br />
  <h4>
    <p align="center"><input type="submit" name="Enviar"value="Enviar" /></p>
  </h4>
</form>
</body>
<?php		
		}
	} else {
		echo "No Se Pudo";
	}
?>
</body>

</html>