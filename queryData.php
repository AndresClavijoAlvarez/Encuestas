<?php
	require ("conexion.php");
	$query = "
			SELECT t1 . * AS data1, t2 . * AS data2
			FROM votacion t1
			INNER JOIN calificadores t2 ON ( t1.codigo = t2.codigo ) 
			WHERE ((t1.fecha >= \"" . $_POST['date_init'] . "\") AND (t1.fecha <= \"" . $_POST['date_end'] . "\"))
			";
	
	$rst = mysql_query($query, $conexion) or die(mysql_error());
	
	if (mysql_num_rows($rst) < 1)
	{
		echo "No hay resultados para estos rangos de fecha";
		exit;
		
	}
	
	$info = array();
	$datas = array();
	while ($data = mysql_fetch_array($rst, MYSQL_ASSOC))
	{
		if (!isset($info[$data['id_pregunta']]))
			$info[$data['id_pregunta']] = array();
		
		if (!isset($info[$data['id_pregunta']][$data['respuesta']]))
			$info[$data['id_pregunta']][$data['respuesta']] = 0;
		
		if ($data['respuesta'] == "Bueno")
			$info[$data['id_pregunta']][$data['respuesta']]++;
		if ($data['respuesta'] == "Regular")
			$info[$data['id_pregunta']][$data['respuesta']] += 1;
		if ($data['respuesta'] == "Malo")
			$info[$data['id_pregunta']][$data['respuesta']]++;
		
		$datas[] = $data;
	}
?>
<br /><br />
<table>
	<tr>
		<td>
			<table class="stadistics stadistics_a">
			<thead>
				<tr>
					<td colspan="4">TABULACIÓN DE RESPUESTAS</td>
				</tr>
				<tr>
					<td></td>
					<td>Bueno</td>
					<td>Regular</td>
					<td>Malo</td>
				</tr>
			</thead>
			<tbody>
<?php
	$totales = array('Bueno' => 0, 'Regular' => 0, 'Malo' => 0);
	
	foreach($info as $k => $v)
	{
		echo "<tr>";
		echo "<td class='question'>Pregunta " . $k . "</td>";
		echo "<td class='answer'>" . $v['Bueno'] . "</td>";
		echo "<td class='answer'>" . $v['Regular'] . "</td>";
		echo "<td class='answer'>" . $v['Malo'] . "</td>";
		echo "</tr>";
		
		$totales['Bueno'] += $v['Bueno'];
		$totales['Regular'] += $v['Regular'];
		$totales['Malo'] += $v['Malo'];
	}
	
	$total = $totales['Bueno'] + $totales['Regular'] + $totales['Malo'];
	$oper1 = $totales['Bueno']*3 + $totales['Regular']*2 + $totales['Malo']*1;
	$oper2 = $total*3;
	
	$porcentaje = round((($oper1 / $oper2) * 100) * 100) / 100;
?>
				<tr>
					<td><b>Totales</b></td>
					<td><b><?php echo $totales['Bueno']; ?></b></td>
					<td><b><?php echo $totales['Regular']; ?></b></td>
					<td><b><?php echo $totales['Malo']; ?></b></td>
				</tr>
			</tbody>
			</table>
			<div>
			<table style="font-size: 15px;">
				<tr>
					<td colspan="0">Total de respuestas:</td>
					<td style="width: 20;"></td>
					<td><?php echo mysql_num_rows($rst)/4; ?> </td>
				</tr>
				<tr>
					<td colspan="3"><b>Porcentaje de satisfacción:</b></td>
					<td style="width: 20;"></td>
					<td><b><?php echo $porcentaje; ?> %</b></td>
				</tr>
				
			</table>
		</td>
		<td><div id="chart" style="width: 500px; height: 400px; margin: 0 auto"></div></td>
	</tr>
</table>
<div>
	<script type="text/javascript">
	var chart;
	jQuery(document).ready(function($)
	{
		$('#tstadistics').tableFilter();
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'chart',
				defaultSeriesType: 'bar',
				type: 'column'
			},
			title: {
				text: 'Estadísticas de las preguntas',
				margin: 30,
				x: 30
			},
			
			xAxis: {
				categories: ['P1', 'P2', 'P3', 'P4'],
				title: {
					text: 'Preguntas'
				}
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Cantidad de votos',
					align: 'high',
					rotation: 0,
				}
			},
			tooltip: {
				formatter: function() {
					return ''+
						 this.series.name +': '+ this.y +' votos';
				}
			},
			plotOptions: {
				bar: {
					dataLabels: {
						enabled: true
					}
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -100,
				y: 100,
				floating: true,
				borderWidth: 1,
				backgroundColor: '#FFFFFF',
				shadow: true
			},
			credits: {
				enabled: false
			},
			series: [{
				name: 'Bueno',
				data: [<?php
				$cadena = array();
				for($i =1; $i<5; $i++)
					if (isset($info[$i]['Bueno']))
						$cadena[] = $info[$i]['Bueno'];
					else
						$cadena[] = 0;
				echo implode(",", $cadena);
				?>]
			}, {
				name: 'Regular',
				data: [<?php
				$cadena = array();
				for($i =1; $i<5; $i++)
					if (isset($info[$i]['Regular']))
						$cadena[] = $info[$i]['Regular'];
					else
						$cadena[] = 0;
				echo implode(",", $cadena);
				?>]
			}, {
				name: 'Malo',
				data: [<?php
				$cadena = array();
				for($i =1; $i<5; $i++)
					if (isset($info[$i]['Malo']))
						$cadena[] = $info[$i]['Malo'];
					else
						$cadena[] = 0;
				echo implode(",", $cadena);
				?>]
			}]
		});
	});
	</script>
</div>

<div class="config">
	<div class="config-seo">
		<div class="ui-icon ui-icon-triangle-1-e"></div>
		<div>Consultar respuestas</div>
	</div>

	<div class="config-seo-box" style="display: block; ">
		<table class="stadistics stadistics_b" id="tstadistics">
		<thead>
			<tr class="first-child">
				<th></th>
				<th filter-type='ddl'>Pregunta</th>
				<th filter-type='ddl'>Respuesta</th>
				<th>Fecha</th>
				<th>C&oacute;digo</th>
				<th>Nombre completo</th>
				<th>Ciudad</th>
				<th>Oficina</th>
			</tr>
		</thead>
		<tbody>
<?php
		foreach($datas as $data)
		{
			echo "<tr>";
			foreach($data as $k => $v)
				echo "<td>".$v."</td>";
			echo "</tr>";
		}
?>
		</tbody>
		</table>
	</div>
</div>
