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
<title>Documento sin título</title>
<style type="text/css">
body,td,th {
	color: #000;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12pt;
}
body {
	background-color: #FFF;
	text-align: center;
	font-weight: bold;
}
</style>
</head>
<body>
<p><strong>Bienvenido(a):</p>
<br />
<table width="900" border="0" bordercolor="#CCCCCC" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><form action="procesar_main.php" method="post" name="main_registrado" target="mainFrame" id="main_registrado">
          <table border="1" bordercolor="#999999" align="center" cellpadding="1" cellspacing="1">
            <tr>
              <td align="center"><strong><br />
                Si  deseas participar en nuestra encuesta y ya estas registrado, pon tu codigo y da click en Ingresar:<br />
                <br />
                </strong>
                <table border="0" align="center" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>Codigo:</td>
                    <td><input name="main_codigo_registrado" type="text" id="main_codigo_registrado" size="15" maxlength="11" /></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" valign="middle"><strong>
                      <input name="button" type="submit" id="button" value="Ingresar" />
                    </strong></td>
                    </tr>
                </table>
                <strong><br />
                  <br />
                </strong></td>
            </tr>
          </table>
        </form></td>
      </tr>
    </table></td>
    <td width="20" align="center">&nbsp;</td>
    <td align="center" valign="top">
	<table border="1" bordercolor="#999999" align="center" cellpadding="1" cellspacing="1">
	  <tr>
	    <td align="center" valign="top"><form action="procesar_main.php" method="post" enctype="multipart/form-data" name="main_nuevo" target="mainFrame" id="main_nuevo">
	      <br />
	      <strong>Si deseas participar en nuestra encuesta, y no estas registrado, debes llenar todos datos que se solicitan a continuacion y dar click en Registrar:</strong><br />
	      <br />
	      <table border="0" align="center" cellpadding="0" cellspacing="0">
	        <tr>
	          <td align="left" valign="middle">Codigo:</td>
	          <td align="left" valign="middle"><input name="main_codigo_nuevo" type="text" id="main_codigo_nuevo" size="15" maxlength="11" /></td>
	          </tr>
	        <tr>
	          <td align="left" valign="middle">Nombre:</td>
	          <td align="left" valign="middle"><input name="main_nombre_nuevo" type="text" id="main_nombre_nuevo" size="65" maxlength="60" /></td>
	          </tr>
	        <tr>
	          <td align="left" valign="middle">Ciudad:</td>
	          <td align="left" valign="middle"><input name="main_ciudad_nuevo" type="text" id="main_ciudad_nuevo" size="25" maxlength="20" /></td>
	          </tr>
	        <tr>
	          <td align="left" valign="middle">Area:</td>
	          <td align="left" valign="middle"><input name="main_area_nuevo" type="text" id="main_area_nuevo" size="25" maxlength="20" /></td>
	          </tr>
	        <tr>
	          <td>&nbsp;</td>
	          <td>&nbsp;</td>
	          </tr>
	        <tr>
	          <td colspan="2" align="center" valign="middle"><input type="submit" name="registrar" id="registrar" value="Registrarse" /></td>
	          </tr>
	        </table>
	      <br />
	      <br />
	    </form></td>
	    </tr>
    </table></td>
  </tr>
  <tr>
	<td><a href="session.php">Ver resultados</a></td>
	<td></td>
  </tr>
</table>
</body>
</html>