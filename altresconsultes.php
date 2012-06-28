
<?php

$bd_host = "localhost"; 
$bd_usuario = "test"; 
$bd_password = "test"; 
$bd_base = "twt_kfe06final";
mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());
mysql_query("SET NAMES 'utf8'");
//consultes

$consultadia=mysql_query("SELECT DAY( created_at )as fecha , COUNT( * ) total_por_dia FROM tweets WHERE `tweet_text` LIKE '%#%' GROUP BY DAY( created_at )  ORDER BY DAY( created_at )  LIMIT 0 , 30 ");

$consulta_rts=mysql_query("SELECT DAY( created_at ) as fecha , COUNT( * ) total_por_dia FROM tweets WHERE `tweet_text` LIKE '%RT%' GROUP BY DAY( created_at ) ORDER BY DAY( created_at )LIMIT 0 , 30");

//change user

$consultaper_usari=mysql_query("SELECT DAY( created_at ) AS fecha, COUNT( * ) total_por_dia,screen_name FROM tweets WHERE `tweet_text` LIKE '%#%' AND screen_name = 'kfeinnovacion' GROUP BY DAY( created_at ) ORDER BY DAY( created_at ) LIMIT 0 , 30");

$top_rts=mysql_query("SELECT tweet_text,COUNT(tweet_text) as resultado FROM `tweets` WHERE `tweet_text` LIKE '%RT%' GROUP BY tweet_text ORDER BY resultado DESC LIMIT 10");

$consultresper_links=mysql_query("SELECT DAY( created_at ) AS fecha, COUNT( * ) total_por_dia FROM tweets WHERE `tweet_text` LIKE '%http%' GROUP BY DAY( created_at ) ORDER BY DAY( created_at ) LIMIT 0 , 30");

$menciones = mysql_query("SELECT DAY( created_at ) , COUNT( * ) total_por_dia FROM tweets, tweet_mentions WHERE tweets.tweet_id = tweet_mentions.tweet_id GROUP BY DAY( created_at ) ORDER BY DAY( created_at )LIMIT 0 , 30");

while ($crow2 = mysql_fetch_array ($consultadia)) {
$ct5 = $crow2 [total_por_dia];
$twt1num[] = $ct5;
$ct6 = $crow2 [fecha];
$twt1fecha[] = $ct6;
}

while ($crow4 = mysql_fetch_array ($consulta_rts)) {
$ct7 = $crow4 [total_por_dia];
$rt_num[] = $ct7;
$ct8 = $crow4 [fecha];
$rt_fecha[] = $ct8;
}

while ($crow5 = mysql_fetch_array ($consultaper_usari)) {
$ct9 = $crow5 [total_por_dia];
$twt1usuari[] = $ct9;
$ct9 = $crow5 [fecha];
$twt1fecha[] = $ct10;
$ct10 = $crow5 [screen_name];
$consultarper_usuari=$ct10;
}

while ($crow6 = mysql_fetch_array ($consultresper_links)) {
$ct11 = $crow6 [total_por_dia];
$link_num[] = $ct11;
$ct12 = $crow6 [fecha];
$link_fecha[] = $ct12;
}

while ($crow7 = mysql_fetch_array ($menciones)) {
$ct13 = $crow7 [total_por_dia];
$menciones_num[] = $ct13;
$ct14 = $crow7 [fecha];
$menciones_fecha[] = $ct14;
}

?>
