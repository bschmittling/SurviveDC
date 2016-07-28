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
I'd like to do eventually do a reverse geo lookup for lat and long points which will be collected and stored in a database and fed out via a geo rss feed. This application will exist for one evening within a realistic time frame of 6 hours as an experiment in massive multiplayer gaming taking place in Washington, DC. I want to use my API key to decode json data into an address after passing in lat and long.
*/ 

// Set API key here
$api_key = "";

// format this string with the appropriate latitude longitude
$url = "http://maps.google.com/maps/geo?q=" .$lat. "," .$lng. "&output=json&sensor=true_or_false&key=" . $api_key;

// Make the HTTP request
$data = @file_get_contents($url);

// Parse the json response
$jsondata = json_decode($data,true);

// if we get a placemark array and the status was good, get the addres
if(is_array($jsondata )&& $jsondata ['Status']['code']==200)
{
      $addr = $jsondata ['Placemark'][0]['address'];
}

?>