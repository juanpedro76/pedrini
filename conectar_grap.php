<?php

$bd_host = "localhost"; 
$bd_usuario = "test"; 
$bd_password = "test"; 
$bd_base = "twt_12m15m"; 

mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//consultes

$consultadia=mysql_query("SELECT DAY( created_at )as fecha , COUNT( * ) total_por_dia
FROM tweets WHERE `tweet_text` LIKE '%#%' GROUP BY DAY( created_at )  ORDER BY DAY( created_at )  LIMIT 0 , 30 ");

//añadir los hashtags motorizados

$consultahast1=mysql_query("SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = '12m15m'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = '15m' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'alaplaza12m' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = '12mglobal' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'acampadabcn'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'acampadasol'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'tomalacalle'order by num DESC");

//eliminar los hashtags motorizados

$consultahast2=mysql_query("SELECT tag,COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE not  tag = '12m15m' and not tag='15m' and not tag = 'alaplaza12m'  and not tag='yovoy12m' and not tag='12m' and not tag='12mglobal' and not tag='feliz12m' and not tag='12mani'and not tag='volvemos12m' and not tag='ff' and not tag='m12' and not tag='spanishrevolution' and not tag='12m15mzgz' and not tag='12m15mbcn' and not tag='acampadabcn' and not tag='acampadasol' and not tag='tomalacalle' GROUP BY tag ORDER BY num DESC LIMIT 20");


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