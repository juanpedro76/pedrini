<?php

$bd_host = "localhost"; 
$bd_usuario = "test"; 
$bd_password = "test"; 
$bd_base = "twt_kfe06final"; 

mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//añadir los hashtags motorizados

$consultahast1=mysql_query("SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'kfe06'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'edgeryders' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'mooteu12' order by num DESC");

//eliminar los hashtags motorizados

$consultahast2=mysql_query("SELECT tag,COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE not  tag = 'kfe06' and not tag='15m' and not tag = 'mooteu12'  and not tag='edgeryders' and not tag='FF' and not tag = 'STB01' and not tag='STB02'  and not tag='STB03'  and not tag='STB04'  and not tag='STB05' and not tag='MAD01' and not tag='SXB01' and not tag='SXB02' and not tag='STB06' and not tag='MNL01' and not tag='ACN01' and not tag='MTV01' and not tag ='SFL01' and not tag ='SVQ01'and not tag= 'SLM01' and not tag='LOTE' and not tag='MNL01' and not tag='SXB04' and not tag='svq02' and not tag='LOA01'  and not tag='mto01' and not tag='fb'  and not tag='mty01' and not tag='fgl01' GROUP BY tag ORDER BY num DESC LIMIT 20");

//consultas seus

$consultasedes=mysql_query("SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'STB01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SXB01' 
union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SXB02' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SXB03'
union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SXB04' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SXB05'
union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SXB06' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'STB02' 
union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'STB03' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'STB04'
union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'STB05' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'STB06'
union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'LOA01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'LOA02' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SVQ01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SVQ02' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SVQ03'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SVQ01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'MTO01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'MNL01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'MAD01'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'UIO01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'FLG01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SFL01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'MTY01'union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'SFL01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'ACN01' union SELECT tag, COUNT( tag ) AS 'num' FROM `tweet_tags` WHERE `tag` = 'AKF01'
order by num DESC");

while ($crow1 = mysql_fetch_array ($consultahast1)) {
$ct1 = $crow1 [tag];
$twt6tag[] = $ct1;
$ct2 = $crow1 [num];
$twt6num[] = $ct2;
}

while ($crow2 = mysql_fetch_array ($consultahast2)) {
$ct3 = $crow2 [tag];
$twt2tag[] = $ct3;
$ct4 = $crow2 [num];
$twt2num[] = $ct4;
}
while ($crow3 = mysql_fetch_array ($consultasedes)) {
$ct5 = $crow3 [tag];
$twtsedes[] = $ct5;
$ct6 = $crow3 [num];
$twtnumsedes[] = $ct6;
}

?>
