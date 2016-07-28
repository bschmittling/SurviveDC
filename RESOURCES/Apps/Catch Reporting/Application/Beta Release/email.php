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

// Sends an email notification when catch.php is used

$to = $emailTo;
$subject = "New Catch";
$body = "A new catch was reported\n\nLat: " .$lat. "\nLong: " .$lng. "\nMessage: " .stripslashes($message). "\n\nWhen: " .$time;

$headers = 'From: donotreply@survivedc.com' . "\r\n" .
   	'Reply-To: donotreply@survivedc.com' . "\r\n" .
   	'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $body, $headers)) {
	//echo("<p>Message successfully sent!</p>");
} else {
	//echo("<p>Message delivery failed...</p>");
}

?>