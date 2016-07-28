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

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<script type="text/javascript" src="/lightbox2.05/js/prototype.js"></script>
<script type="text/javascript" src="/lightbox2.05/js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="/lightbox2.05/js/lightbox.js"></script>
<link rel="stylesheet" href="/lightbox2.05/css/lightbox.css" type="text/css" media="screen" />


<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SurviveDC - All Catches</title>
<style type="text/css">
<!--
body,td,th {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
body {
	background-color: #000000;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.entry{
	border-style:solid;
	border-bottom:thin dotted #ffffff;
}
.entry a.mapbutton{
	display: inline;
	width:100px;
	height:50px;
	color:#999999;
	padding: 10px;
	margin: 10px;
	background-color: #333333;
	text-decoration: none;
	font-size: 11px;
	font-weight: bold;
	text-transform: uppercase;
	-moz-border-radius: 30px;
	border-radius: 30px;
}
-->
</style></head>

<body>

<?php

// This will eventually be an admin style page which will list all entries with basic controls to allow game monitoring 

include 'config.inc.php';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

$query  = "SELECT id, latitude, longitude, message, time FROM catches ORDER BY time DESC";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
?>

<?php

$theTime = "{$row['time']}";
$theTimeFormatted = date("g:ia",$theTime);
$theMessage = "{$row['message']}";
$theMessageNoImage = preg_replace("/<img[^>]+\>/i", "", $theMessage);

//preg_match('~<img[^>]*src\s?=\s?[\'"]([^\'"]*)~i',$theMessage, $matches);

$Lat = "{$row['latitude']}";
$Long =  "{$row['longitude']}";





?>
     <table class="entry" width="100%" border="0" cellspacing="5" cellpadding="5">
   
  <tr>
    <td width="10%" align="left" valign="middle"><?php echo $theTimeFormatted; ?></td>
    <td width="80%" align="left" valign="middle"><a class="mapbutton" href="http://maps.google.com/maps?f=q&q=<?php echo $Lat; ?>,<?php echo $Long; ?>&zoom=14">Google Map</a><?php echo $theMessageNoImage; ?></td>
    <td width="10%" align="right" valign="top">

<?php    	
if((bool)preg_match('#<img[^>]+src=[\'"]([^\'"]+)[\'"]#', $theMessage, $matches))
{
	//print_r($matches);
?>

<a rel="lightbox" title="<?php echo $theMessageNoImage ?>" href="<?php echo $matches[1]; ?>"><img src="<?php echo $matches[1]; ?>" alt="catch" name="catch" width="50" height="50" border="0" id="catch" /></a>
	
<?php
}
else
{
	//echo 'Not found';
}
?>    </td>
  </tr></table>
<?php
} 

mysql_close($conn);

?>




</body>
</html>
