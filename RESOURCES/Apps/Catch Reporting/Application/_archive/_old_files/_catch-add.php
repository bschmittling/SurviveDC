<?php
include 'config.php';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

mysql_query("INSERT INTO catches (latitude, longitude, message, time)
VALUES ('1.000000', '1.000000', 'here is my message', now())");

mysql_close($conn);

?>