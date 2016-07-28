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

/*

TO DO
(>) Generate URN id's for feeds and individual feed items
(>) Built catch updated detail page for external reference (sharing and monitoring)
(>) Populate Checkpoints feed with correct information
(>) Test reverse geo lookup (although this may be overkill)
(>) Add photo name to DB for easier lookup (with necessary conditionals)

*/	

?>


<?php

/* APPLICATION SETTINGS */

include_once 'config.inc.php';

?>


<?php

/* INCOMING VARIABLES */

/*
lat: latitude from the GPS
lng: longitude from the GPS
message: text which is written in the message
photo: the binary image that the user has selected
device_id: udid of device
compass: compas direction of device
application_name: Name of application sending the message post
*/

$lat = $_POST['lat'];
$lng = $_POST['lng'];
$message = $_POST['message'];
$photo = $_FILES['photo'];
$time = date("m/d/y",time());

?>


<?php

/* SEND EMAIL NOTIFICATION */

//include_once "email.php";

?>


<?php

/* REVERSE GEO LOOKUP */

//include_once 'geolookup.php';

?>


<?php

/* IMAGE PROCESSING */

// Variable Setup
$directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . $uploadFolder;
$uploadsPath = $directory_self . $uploadFolder;
$fieldname = $_FILES['photo'];
$filenameFromFile = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$name = $_FILES['photo']['name'];
$now = time();
$newFileName = $now.'-'.$_FILES['photo']['name'];
$newFileNameStripped = substr($newFileName, 0, strrpos($newFileName, '.')); // Resize class adds file extension
$uploadFilePath = $uploadsDirectory . $newFileNameStripped;

// Resize
include_once 'resize.image.class.php';
$image = new Resize_Image;
$image->new_width = 320;
$image->new_height = 320;
$image->image_to_resize = $tmp_name; // Full Path to the file
$image->ratio = true; // Keep Aspect Ratio?
$image->new_image_name = $newFileNameStripped;
$image->save_folder = $uploadsDirectory;
$process = $image->resize();

// Upload
if($process['result'] && $image->save_folder)
{
	//echo 'The new image ('.$process['new_file_path'].') has been saved.';
}
else
{
	$uploadFilePathReverted = $uploadsDirectory.$newFileName;
	move_uploaded_file($newFileName, $uploadFilePathReverted); //Failsafe move to server without resizing (full image)
}

// Add image to Message body
$message .= "\n\n";
$message .= "<img src=\"" .$applicationURL.$uploadFolder.$newFileName. "\">";

?>


<?php

/* ADD ENTRY TO DATABASE */

// Only add to DB if Geo Location Services are working
if( ($lat != "0.000000") || ($lng != "0.000000") )
{
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);

	mysql_query("INSERT INTO catches (latitude, longitude, message, time)
	VALUES ('$lat', '$lng', '$message', now())");

	mysql_close($conn);
}

?>


<?php

/* UPDATE XML FEED */

if( ($lat != "0.000000") || ($lng != "0.000000") )
{

	// Start XML Document
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

	// Test Variables
	/*
	$title = "New Catch from PHP";
	$href = "http://www.google.com";
	$summary = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.";
	$latitude = "38.911160";
	$longitude = "-77.044365";
	*/

	// Start Query
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname);

	$query  = "SELECT id, latitude, longitude, message, time FROM catches ORDER BY time DESC";
	$result = mysql_query($query);

	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{

    	// Pull Entry Details
    	$catchTime =  date("g:iA", strtotime($row["time"]));
		$catchTimeFriendly = date("F j, Y g:iA", strtotime($row['time']));
    	$title = "Catch Reported (" .$catchTime. ")";
    	$href = $applicationURL.$uploadFolder.$newFileName;
	
		// Add Entry Details to XML Document
    	$_xml .="<entry>\r\n";
		$_xml .="<title>" .$title. "</title>\r\n";
		$_xml .="<link href=\"" .$href. "\"/>\r\n";
		$_xml .="<id>urn:uuid:1225c695-cfb8-4ebb-aaaa-80da344efa6a</id>\r\n";
		$_xml .="<updated>" .$catchTimeFriendly. "</updated>\r\n";
		$_xml .="<summary><![CDATA[" .$row['message']. "]]></summary>\r\n";
		$_xml .="<georss:point>" .$row['latitude']. " " .$row['longitude']. "</georss:point>\r\n";
		$_xml .="</entry>\r\n";

	} 

	// Finish with DB, write file and close it
	mysql_close($conn);
	$_xml .="</feed>\r\n";
	fwrite($file, $_xml);
	fclose($file);

	//echo "XML has been written. <a href=\"updates.xml\">View the XML.</a>";

}

?>