<script type="text/javascript">
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
			renderTo: 'container1',
				type: 'bar'
			},
			title: {
				text: 'Top 15 Users (Twittero x Tweets)'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				categories: ['<?php 
					echo join($values, "','"); 
				?>']
			},
			yAxis: {
				min: 0,
				title: {
					text: 'tweets'
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -30,
				y: 150,
				floating: true,
				borderWidth: 1,
				backgroundColor: '#FFFFFF',
				shadow: true
			},
			tooltip: {
				formatter: function() {
					return ''+
                    this.x +': '+ this.y +' tweets';
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
            series: [{
				name: 'tweets',
				data: [<?php echo join($total_tweets,',');?>]
			}]
		});
	});
var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
				renderTo: 'container3',
				type: 'bar'
			},
			title: {
				text: 'Impact Users (Twitteros x Impactos)'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				categories:['<?php echo join($twt3name, "','");?>']
			},
			yAxis: {
				min: 0,
				title: {
					text: 'impactos'
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -30,
				y: 150,
				floating: true,
				borderWidth: 1,
				backgroundColor: '#FFFFFF',
				shadow: true
			},
			tooltip: {
				formatter: function() {
					return ''+ this.x +': '+ this.y +' impactos';
				}
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
            series: [{
				name: 'impactos',
				data:[<?php echo join($twt3num,',');?>]
			}]
		});
	});
</script>

<?php 
echo " <strong><center>Usuarios</strong></center>";
echo "<p>";
echo" <p> En la primera <strong> gráfica</strong> representamos a los usuarios más activos durante el evento.<p>";
?>

<div id="container1" style="width: 670px; height: 350px;"></div>

<?php
mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//consultes

$consulta1 = mysql_query("SELECT count(*) as num FROM `tweets`");
$consulta2 = mysql_query ("SELECT SUM(num) as 'resultado' FROM (SELECT COUNT(user_id) as 'num' FROM tweets GROUP BY user_id ORDER BY num DESC LIMIT 15)as num");
$consulta3 = mysql_query("select count(*) as num FROM `users`");

while ($most1 = mysql_fetch_array($consulta1)) { 
    $varia1= $most1['num'];
 

}

while ($most2 = mysql_fetch_array($consulta2)) { 
    $varia2= $most2['resultado'];
   

}
while ($most1 = mysql_fetch_array($consulta3)) { 
    $varia3= $most1['num'];
 

}

$resultado = (100 * $varia3 ) / $varia1 ;



echo" Tenemos a los usuarios y el número de twits realizados por cada uno de ellos. Estos <strong>15</strong> usuarios más activos, del total de  <strong>";
echo "$varia3";
echo "</strong>, suman un total de <strong>"; 
echo "$varia2";
echo" tweets </strong> que representan un <strong> ";
echo round($resultado,2); 

echo"</strong> del total de tweets realizados durante el evento. Si ponéis el cursor sobre la gráfica veréis el número de tweets de cada usuario.";
?>

<div id="container3" style="width: 670px; height: 350px;"></div>

<?php

echo'Seguidamente mostramos cuales son los usuarios que más impacto han generado en Twitter. Si un usuario tiene <strong>100 followers</strong> por ejemplo, un twit suyo aparecerá en <strong>100 TimeLine</strong> de diferentes usuarios y consideraremos <strong>100 impresiones</strong> . Si ponéis el cursor sobre la gráfica veréis el número de impresiones que ha generado cada usuario.
<br><strong>Nota: </strong> Se eliminaron todas las cuentas oficiales de los medios de comunicación y cuentas oficiales del movimiento 15M';

echo'En la siguiente tabla encontramos los <strong>10 RT</strong> más relevantes aparecidos durante el evento y el primer usuario que realizó';
echo '<table border="0" cellpadding=4 cellspacing=0 id="mitabla">';  
echo '<tr>';
echo '<th scope="col">Veces  </th>';
echo '<th scope="col">nombre</th>';
echo '</tr>';
while ($most1 = mysql_fetch_array($consulta09)) {
echo '<tr>';
echo '<td style="text-align: left; width: 40;"> '  . $most1['num'] . '</td>' . ' ';
echo '<td style="text-align: left; width: 40;"> '  . $most1['screen_name'] . '</td>' . ' ';
echo '</tr>';
}
// libera los registros de la tabla
echo'</table>';
mysql_free_result($consulta1); 
mysql_free_result($consulta2); 
mysql_free_result($consulta9);

mysql_close($conexion); // cierra la conexion con la base de datos

?>

