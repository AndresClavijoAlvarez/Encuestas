<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="theme/css/custom-theme/jquery-ui.css" rel="stylesheet" />
<link type="text/css" href="theme/css/jquery.jgrowl.css" rel="stylesheet" />
<link type="text/css" href="theme/css/styles.css" rel="stylesheet" />
<script type="text/javascript" src="theme/js/jquery.min.js"></script>
<script type="text/javascript" src="theme/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="theme/js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="theme/js/highcharts/highcharts.js"></script>
<script type="text/javascript" src="theme/js/highcharts/modules/exporting.js"></script>
<script type="text/javascript" src="theme/js/picnet.table.filter.min.js"></script>
<script type="text/javascript" src="theme/js/scripts.js"></script>


<title>Documento sin título</title>
<style type="text/css">
body,td,th {
}
body {
	background-color: #FFF;
	text-align: center;
}
</style>
</head>
<body>
<?php
	if (!isset($_POST) || !isset($_POST['password']))
	{
?>
	<script>
		window.top.location.href = 'index.php';
	</script>
<?php
	}	
	elseif ($_POST['password'] != "12345")
	{
?>
	<script>
		jQuery(document).ready(function($)
		{
			setTimeout("recargar()", 10000);
		});
		
	</script>
	<p>Contraseña incorrecta.</p><br />
	<p>La aplicación regresará al sitio principal automáticamente en 10 segundos, o si desea puede dar clic en el siguiente enlace para regresar al sitio principal</p>
	<a href="#" onclick="window.top.location.href='index.php';">Regresar</a>
<?php
	}
	else
	{
?>
	<div>
		<form method="post" name="frmQuery" id="frmQuery">
			<table>
				<tr>
					<td>Desde:</td>
					<td><input type="text" name="date_init" id="date_init" /></td>
					<td style="width: 10px;"></td>
					<td>hasta:</td>
					<td><input type="text" name="date_end" id="date_end" /></td>
					<td style="width: 10px;"></td>
					<td><input type="button" name="send" id="send" value="Consultar" /></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="result"></div>
	
	<br /><br />
	<a href="#" onclick="window.top.location.href='index.php';">Regresar</a>
<?php
	}
?>
</body>
</html>
