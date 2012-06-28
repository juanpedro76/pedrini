<script type="text/javascript">
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                type: 'areaspline',
                renderTo: 'containertotdia',  
events: {
                click: function(event) {
                    alert ('x: '+ event.xAxis[0].value +', y: '+
                          event.yAxis[0].value);
                }
            }           
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
                x: 60,
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
                    color: 'rgba(68, 170, 213, .2)'
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
                    color: '#cdc0de',
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'tweets',
                data: [<?php echo join($twt1num,',');?>]
            }]
        });
    });
   var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
               renderTo: 'containerhtags1',
                type: 'column'
            },
            credits: {
            text: '',
            href: ''
        },
            title: {
                text: 'Hashtags Monitorizados'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                 categories: ['<?php echo join($twt6tag, "','");?>']
                   },
            yAxis: {
                min: 0,
                title: {
                    text: 'tweets enviados'
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 60,
                y: 2,
                floating: true,
                shadow: true
            },
           tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' twetts';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
                name: 'twetts',
				data:[<?php echo join($twt6num,',');?>]
              }]
        });
    });
var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'containersedes',
                type: 'bar'
            },
           credits: {
            text: '',
            href: ''
        },
           title: {
                text: 'Sedes '
            },
            xAxis: {
                categories: ['<?php echo join($twtsedes, "','");?>']
            },
            yAxis: {
               min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                backgroundColor: '#FFFFFF',
                reversed: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.series.name +': '+ this.y +'';
                }
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
                series: [{
                name: 'Sedes',
                data: [<?php echo join($twtnumsedes,',');?>]
               }]
        });
    }); 
 var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'containerhtags2',
                type: 'bar'
            },
           credits: {
            text: '',
            href: ''
        },
           title: {
                text: 'Hashtags más utilizados '
            },
            xAxis: {
                categories: ['<?php echo join($twt2tag, "','");?>']
            },
            yAxis: {
               min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                backgroundColor: '#FFFFFF',
                reversed: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.series.name +': '+ this.y +'';
                }
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
                series: [{
                name: 'Hashtags',
                data: [<?php echo join($twt2num,',');?>]
               }]
        });
    }); 
 </script>
 <?php
echo' <p>Primero mostramos el número de tweets enviados separadas en fechas.';
?>
<div id="containertotdia" style="height: 300px; width: 670px"></div>
<p>
<?php
echo'<strong><center>Hastags</strong></center><p>';
echo'En la siguiente tabla mostramos todos los hashtags monitorizados durante el evento.';
?>
<div id="containerhtags1" style="width: 670px; height: 350px;"></div>
<?php
echo'Seguidamente se muestran todas las sedes motorizadas durante el evento.';
?>
<div id="containersedes" style="width: 670px; height: 350px;"></div>

<?php
echo'<p>Finalmente mostrados los hashtags más aparecidos durante el evento y el número de veces (tweets) que fueron enviados. Si ponéis el cursor sobre la gráfica viereis el número. ';
?>
<div id="containerhtags2" style="width: 670px; height: 350px;"></div>
