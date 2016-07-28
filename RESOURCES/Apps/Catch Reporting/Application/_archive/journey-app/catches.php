<?php

/**
 * _______ _     _  ______ _    _ _____ _    _ _______ ______  _______
 * |______ |     | |_____/  \  /    |    \  /  |______ |     \ |      
 * ______| |_____| |    \_   \/   __|__   \/   |______ |_____/ |_____ 
 *
 * CREATED AND DISTRIBUTED BY Cluser Media http://www.cluster-media.com
 *
 * The SurviveDC Manifest iPhone App by Brandon Schmittling is licensed
 * under a Creative Commons Attribution-NonCommercial-ShareAlike 3.0
 * Unported License: http://creativecommons.org/licenses/by-nc-sa/3.0/
 */

?>



<?php

// This will eventually be an admin style page which will list all entries with basic controls to allow game monitoring 

include 'config.inc.php';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

$query  = "SELECT id, latitude, longitude, message, time FROM catches ORDER BY time DESC";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    echo "ID :{$row['id']} <br>" .
         "Lat : {$row['latitude']} <br>" .
         "Long : {$row['longitude']} <br>" .
         "Message : {$row['message']} <br>" .
         "Time : {$row['time']} <br><br>";
} 

mysql_close($conn);

?>