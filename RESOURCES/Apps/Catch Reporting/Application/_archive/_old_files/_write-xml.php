<?php

$file= fopen("updates.xml", "w");
$_xml ="<feed xmlns=\"http://www.w3.org/2005/Atom\" xmlns:georss=\"http://www.georss.org/georss\">\r\n";
$_xml .="<title>Catches</title>\r\n";
$_xml .="<subtitle>Recent catches</subtitle>\r\n";
$_xml .="<link href=\"http://example.org/\"/>\r\n";
$_xml .="<updated>2005-12-13T18:30:02Z</updated>\r\n";
$_xml .="<author>\r\n";
$_xml .="<name>Survive DC</name>\r\n";
$_xml .="<email>donotreply@survivedc.com</email>\r\n";
$_xml .="</author>\r\n";
$_xml .="<id>urn:uuid:60a76c80-d399-11d9-b93C-0003939e0af6</id>\r\n";

?>


<?php

/* TEST VARIABLES */

$title = "New Catch from PHP";
$href = "http://www.google.com";
$summary = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.";
$latitude = "38.911160";
$longitude = "-77.044365";

?>
  

<?php

include 'config.php';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);

$query  = "SELECT id, latitude, longitude, message, time FROM catches";
$result = mysql_query($query);

while($row = mysql_fetch_array($result, MYSQL_ASSOC))
{
    
    $title = "New Catch (" .$row['id']. ")";
    $href = "http://www.google.com";

	/* ENTRY START */

    $_xml .="<entry>\r\n";
	$_xml .="<title>" .$title. "</title>\r\n";
	$_xml .="<link href=\"" .$href. "\"/>\r\n";
	$_xml .="<id>urn:uuid:1225c695-cfb8-4ebb-aaaa-80da344efa6a</id>\r\n";
	$_xml .="<updated>2005-08-17T07:02:32Z</updated>\r\n";
	$_xml .="<summary>" .$row['message']. "</summary>\r\n";
	$_xml .="<georss:point>" .$row['latitude']. " " .$row['longitude']. "</georss:point>\r\n";
	$_xml .="</entry>\r\n";

	/* ENTRY END */

} 

mysql_close($conn);

?>


<?php
$_xml .="</feed>\r\n";
fwrite($file, $_xml);

fclose($file);

echo "XML has been written. <a href=\"updates.xml\">View the XML.</a>";

?>