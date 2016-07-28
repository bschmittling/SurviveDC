<?php

$file= fopen("features.xml", "w");

$_xml ="<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\r\n";
$_xml .="<features_list>\r\n";

/* ITEM START */

$_xml .="<feature>\r\n";
$_xml .="\t\t<headline>Headline</headline>\r\n";
$_xml .="\t\t<subtitle>none</subtitle>\r\n";
$_xml .="\t\t<feature_text>none</feature_text>\r\n";
$_xml .="\t\t<image>none</image>\r\n";
$_xml .="\t\t<link>none</link>\r\n";
$_xml .="</feature>\r\n";

/* ITEM END */

$_xml .="</features_list>\r\n";
fwrite($file, $_xml);

fclose($file);

echo "XML has been written. <a href=\"features.xml\">View the XML.</a>";

?>