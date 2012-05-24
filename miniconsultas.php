<?php

include("conectar.php");

mysql_connect($bd_host, $bd_usuario, $bd_password) or die ("error1".mysql_error());
mysql_select_db($bd_base) or die ("error2".mysql_error());

//consultes

$consulta1 = mysql_query("SELECT count(*) as num FROM `tweets`");
$consulta2 = mysql_query("select count(*) as num FROM `users`"); // selecciono todos los registros de la tabla usuarios, ordenado por nombre
$consulta3 = mysql_query("SELECT count(*) as num  FROM `tweets` WHERE `tweet_text` LIKE '%RT%'");
$consulta4 = mysql_query("SELECT count(*) as num  FROM `tweets` WHERE `tweet_text` LIKE '%http%'");
$consulta5 = mysql_query("SELECT SUM( followers_count ) AS 'num' FROM users, tweets WHERE users.screen_name = tweets.screen_name");
$consulta6 = mysql_query("SELECT date(created_at) FROM `tweets` ORDER BY `tweets`.`created_at` ASC LIMIT 1");
$consulta7 = mysql_query("SELECT date(created_at) FROM `tweets` ORDER BY `tweets`.`created_at` DESC LIMIT 1");
$consulta8 = mysql_query("SELECT count( * ) AS num FROM `tweet_mentions`"); 
while ($most1 = mysql_fetch_array($consulta1)) { 

    echo '<br> * Número de tweets realizados: ' . '<b>' . $most1['num'] . '</b>' . ' ';

}


while ($most2 = mysql_fetch_array($consulta2)) {

    echo '<br> * Número total de usuarios: ' . '<b>' . $most2['num'] . '</b>' . ' '; 

} 

while ($most3 = mysql_fetch_array($consulta3)) { 

    echo '<br> * RT realizados: ' . '<b>' . $most3['num'] . '</b>' . ' '; 

}

while ($most4 = mysql_fetch_array($consulta4)) {

    echo '<br> * Links enviados: ' . '<b>' . $most4['num'] . '</b>' . ' '; 

}

while ($most8 = mysql_fetch_array($consulta8)) {

    echo '<br> * Menciones: ' . '<b>' . $most8['num'] . '</b>' . ' '; 

}

while ($most5 = mysql_fetch_array($consulta5)) { 

    echo '<br> * Número de impresiones realizadas durante el evento: ' . '<b>' . $most5['num'] . '</b>' . '<br>'. ' ';

} 


while ($most6 = mysql_fetch_array($consulta6)) { 
    $fecha1= $most6['date(created_at)'];
    echo '* Los datos fueron recolectados entre el ' . '<b>' . $most6['date(created_at)'] . '</b>' . ''. ' ';
}

while ($most7 = mysql_fetch_array($consulta7)) { 
    $fecha2= $most7['date(created_at)'];
    echo 'al  ' . '<b>' . $most7['date(created_at)'] . '</b>' . '<br><br>'. ' ';
}

// fin 

// libera los registros de la tabla

mysql_free_result($consulta1); 
mysql_free_result($consulta2); 
mysql_free_result($consulta3); 
mysql_free_result($consulta4); 
mysql_free_result($consulta5);
mysql_free_result($consulta6);
mysql_free_result($consulta7); 
mysql_free_result($consulta8); 
mysql_close($conexion); // cierra la conexion con la base de datos
?>
