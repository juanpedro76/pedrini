<?php

$bd_host = "localhost"; 
$bd_usuario = "test"; 
$bd_password = "test"; 
$bd_base = "twt_kfe06final"; 

mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//consultes

$consulta01=mysql_query("SELECT COUNT( user_id ) AS 'num', screen_name,profile_image_url, name FROM tweets  GROUP BY user_id ORDER BY num DESC LIMIT 15 ");


//impactes

$consulta03=mysql_query("SELECT tweets.screen_name, tweets.tweet_text, SUM( followers_count ) AS resultado FROM users, tweets WHERE users.screen_name = tweets.screen_name  and not tweets.screen_name ='elmundoes' and not tweets.screen_name ='el_pais'and not tweets.screen_name ='rtve'  and  not tweets.screen_name ='20m' and  not tweets.screen_name ='la_informacion' and  not tweets.screen_name ='eljueves' and not tweets.screen_name ='telesurtv'  and not tweets.screen_name ='informativost5' and  not tweets.screen_name ='lasextatv' and  not tweets.screen_name ='AgorasolRadio' and  not tweets.screen_name ='publico_es' and  not tweets.screen_name ='lavanguardia' and  not tweets.screen_name ='milenio' and  not tweets.screen_name ='NTelevisa_com' and  not tweets.screen_name ='elespectador'and  not tweets.screen_name ='repubblicait'  and  not tweets.screen_name ='antena3com'  and  not tweets.screen_name ='a3noticias' and  not tweets.screen_name ='democraciareal'  and  not tweets.screen_name ='acampadabcn' and  not tweets.screen_name ='barcelonarealya'  and  not tweets.screen_name ='12m_15m'  and  not tweets.screen_name ='15mayovalencia' and  not tweets.screen_name ='drymadrid' and  not tweets.screen_name ='Anonymous_Co'  and  not tweets.screen_name ='OccupyWallStNYC'  and  not tweets.screen_name ='AnonymousAction'  and  not tweets.screen_name ='OccupyWallSt' and  not tweets.screen_name ='Anonymous_Link' and  not tweets.screen_name ='AnonymousMexi'  and  not tweets.screen_name ='acampadazgz' and  not tweets.screen_name ='Acampadaparis'  and  not tweets.screen_name ='drynternational' and  not tweets.screen_name ='juventudsin' and  not tweets.screen_name ='OccupyLondon' and  not tweets.screen_name ='iaioflautas'  and  not tweets.screen_name ='tw_top_news'  GROUP BY tweets.screen_name ORDER BY resultado DESC LIMIT 0 , 15");

$consulta04=mysql_query("SELECT tweet_urls.url,COUNT(url) as resultado, screen_name  FROM tweet_urls, tweets WHERE  `url` Not LIKE 'http://t.co' AND `url` Not LIKE 'http://t.co/VsN' AND `url` Not LIKE 'http://t.co/sFN' and tweet_urls.tweet_id = tweets.tweet_id GROUP BY url ORDER BY resultado DESC LIMIT 15");

$consulta05=mysql_query("SELECT tweets.screen_name,SUM( followers_count ) AS 'total_impactos' FROM users, tweets WHERE users.screen_name = tweets.screen_name GROUP BY tweets.screen_name ORDER BY total_impactos DESC LIMIT 100");

$consulta07=mysql_query("SELECT tweets.screen_name,SUM( followers_count ) AS 'total_impactos' FROM users, tweets WHERE users.screen_name = tweets.screen_name GROUP BY tweets.screen_name ORDER BY total_impactos DESC LIMIT 15,100");


$consulta8=mysql_query("SELECT tweet_text,COUNT(tweet_text) as resultado FROM `tweets` WHERE `tweet_text` LIKE '%RT%'GROUP BY tweet_text ORDER BY resultado DESC LIMIT 10");

$consulta09=mysql_query("SELECT COUNT( user_id ) AS 'num', screen_name,profile_image_url, name FROM tweets  GROUP BY user_id ORDER BY num DESC LIMIT 100");


while ($row = mysql_fetch_array ($consulta01)) {
$t = $row [screen_name];
$values[] = $t;

$t2 = $row [num];
$total_tweets[] = $t2;

}

while ($row3 = mysql_fetch_array ($consulta03)) {
$t5 = $row3 [screen_name];
$twt3name[] = $t5;

$t6 = $row3 [resultado];
$twt3num[] = $t6;

}

while ($row4 = mysql_fetch_array ($consulta04)) {
$t7 = $row4 [screen_name];
$twt4name[] = $t7;
$t8 = $row4 [resultado];
$twt4num[] = $t8;
}


while ($row5 = mysql_fetch_array ($consulta05)) {

$t9 = $row5 [total_impactos];
$twt5num[] = $t9;

}

while ($row7 = mysql_fetch_array ($consulta07)) {

$t12 = $row7 [total_impactos];
$twt7num[] = $t12;

}

while ($row8 = mysql_fetch_array ($consulta08)) {

$t13 = $row8 [resultado];
$twt8num[] = $t13;

$t14 = $row8 [tweet_text];
$twt8text[] = $t14;


}
?> 
