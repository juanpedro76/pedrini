<script type="text/javascript">
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'containertotdia',
                type: 'areaspline'
            },
            title: {
                text: 'Tweets enviados'
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
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
            title: {
                text: 'Hashtags Motorizados'
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
                x: 500,
                y: 70,
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
                renderTo: 'containerhtags2',
                type: 'bar'
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
                    text: 'Hashtags más utilizados'
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
echo' <p>Primero de todo tenemos una gráfica en que autentificamos el número de de tweets enviados durante las fechas analizadas';
?>
<div id="containertotdia" style="height: 300px; width: 670px"></div>
<p>
<?php
echo'<strong><center>Hastags</strong></center><p>';
echo'En la primera gráfica se muestran cada uno de los hashtags motorizados durante el evento';
?>
<div id="containerhtags1" style="width: 670px; height: 350px;"></div>
<?php
echo'<p>Finalmente mostrados los <strong>hashtags</strong> más utilizados durante el evento y el número de veces (tweets) que fué utilizado. Si ponéis el cursor sobre la gráfica veréis el número';
?>
<div id="containerhtags2" style="width: 670px; height: 350px;"></div>