<?php

$bd_host = "localhost"; 
$bd_usuario = "test"; 
$bd_password = "test"; 
$bd_base = "twt_marato"; 

mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//consultes

$consultadia=mysql_query("SELECT DAY( created_at )as fecha , COUNT( * ) total_por_dia
FROM tweets WHERE `tweet_text` LIKE '%#%' GROUP BY DAY( created_at )  ORDER BY DAY( created_at )  LIMIT 0 , 30 ");

//añadir los hashtags motorizados

$consultahast1=mysql_query("SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'maratopobresa'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'sobrencadires' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'lacaixaesmordor' order by num DESC");


//eliminar los hashtags motorizados

$consultahast2=mysql_query("SELECT tag,COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE not  tag = 'maratopobresa' and not tag='15m' and not tag = 'sobrencadires'  and not tag='yovoy12m' and not tag='12m' and not tag='lacaixaesmordor' and not tag='FF' GROUP BY tag ORDER BY num DESC LIMIT 20");


while ($crow1 = mysql_fetch_array ($consultahast1)) {
$ct1 = $crow1 [tag];
$twt6tag[] = $ct1;
$ct2 = $crow1 [num];
$twt6num[] = $ct2;
}
while ($crow2 = mysql_fetch_array ($consultadia)) {
$ct3 = $crow2 [total_por_dia];
$twt1num[] = $ct3;
$ct4 = $crow2 [fecha];
$twt1fecha[] = $ct4;
}

while ($crow3 = mysql_fetch_array ($consultahast2)) {
$ct5 = $crow3 [tag];
$twt2tag[] = $ct5;
$ct6 = $crow3 [num];
$twt2num[] = $ct6;
}



?>