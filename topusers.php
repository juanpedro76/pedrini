<script type="text/javascript">
	var chart;
	$(document).ready(function() {
		chart = new Highcharts.Chart({
			chart: {
			renderTo: 'container1',
				type: 'bar'
			},
                        credits: {
                           text: '',
                           href: ''
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
					text: ''
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -480,
				y: 1,
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
                renderTo: 'tweetsenviados_usuaro',
                type: 'areaspline'
            },
            credits: {
            text: '',
            href: ''
        },
            title: {
                text: 'Tweets enviados'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 50,
                y: 2,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
                categories: ['<?php echo join($twt1fecha, "','");?>'],
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(99, 70, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                     text: 'enviado'
                }
            },
            tooltip: {
                formatter: function() {
                   return ''+
                    this.x +': '+ this.y +' tweets';
               }
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'tweets',
                data: [<?php echo join($twt1usuari,',');?>]
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
                        credits: {
                            text: '',
                            href: ''
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
					text: ''
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -560,
				y: 1,
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
echo"<p> Primero mostramos el número de tweets enviados con el usuario oficial, mostrando cuantos <strong>tweets</strong> envió el usuario <strong> $consultarper_usuari </strong> desglosados por los días, motorizados durante el evento.";
?>

<div id="tweetsenviados_usuaro" style="width: 670px; height: 350px;"></div>


<?php 

echo" <p> Seguidamente representamos cuales son los usuarios más activos durante el evento.<p>";
echo"<p>";
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



<?php

echo'Finalmente mostramos cuales son los usuarios que más impacto han generado en Twitter. Si un usuario tiene <strong>100 followers</strong> por ejemplo, un twit suyo aparecerá en <strong>100 TimeLine</strong> de diferentes usuarios y consideraremos <strong>100 impresiones</strong> . Si ponéis el cursor sobre la gráfica veréis el número de impresiones que ha generado cada usuario.';
// libera los registros de la tabla
echo'</table>';
mysql_free_result($consulta1); 
mysql_free_result($consulta2); 
mysql_free_result($consulta9);

mysql_close($conexion); // cierra la conexion con la base de datos

?>
<div id="container3" style="width: 670px; height: 350px;"></div>

