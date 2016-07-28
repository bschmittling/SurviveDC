<?php
/*
Plugin Name: Expanding Text
Plugin URI: http://www.dagondesign.com/articles/expanding-text-plugin-for-wordpress/
Description: Allows you to define areas of text that expand/collapse when clicked, and is handled properly when javascript is disabled.
Author: Dagon Design
Version: 1.2
Author URI: http://www.dagondesign.com
*/

function ddet_str_replace_once($needle , $replace , $haystack){ 
    // Looks for the first occurence of $needle in $haystack 
    // and replaces it with $replace. 
    $pos = strpos($haystack, $needle); 
    if ($pos === false) { 
        // Nothing found 
    return $haystack; 
    } 
    return substr_replace($haystack, $replace, $pos, strlen($needle)); 
}  



function ddet_process($content) {

	$offset = 0;
	$stag = '[DDET ';
	$etag = '[/DDET]';
	while (stripos($content, $stag, $offset)) {

		// string to replace
		$s = stripos($content, $stag, $offset);	
		$e = stripos($content, $etag, $s) + strlen($etag); 

		// inside data
		$ds = stripos($content, ']', $s) + 1;
		$de = $e - strlen($etag);

		// style tag
		$ss = $s + strlen($stag);
		$se = $ds - 1;

		$sstring = substr($content, $s, $e - $s);
		$sdesc = substr($content, $ss, $se - $ss); 
		$sdata = substr($content, $ds, $de - $ds);

		mt_srand((double)microtime()*1000000);
		$rnum = mt_rand();

		$new_string = '<a style="display:none;" id="ddetlink' . $rnum;
		$new_string .= '" href="javascript:expand(document.getElementById(\'ddet' . $rnum . '\'))">';
		$new_string .= $sdesc . '</a>' . "\n";
		$new_string .= '<div class="ddet_div" id="ddet' . $rnum . '">';
		$new_string .= '<script language="JavaScript" type="text/javascript">expand(document.getElementById(\'ddet' . $rnum . '\'));';
		$new_string .= 'expand(document.getElementById(\'ddetlink' . $rnum . '\'))</script>';

		$sdata = preg_replace('`^<br />`sim', '', $sdata);

		$content = ddet_str_replace_once($sstring, $new_string . $sdata . '</div>', $content);

		$offset = $s + 1;
	}

	return $content;

}




function ddet_javascript() {

	echo '
<script language="JavaScript" type="text/javascript"><!-- 
function expand(param) { 
param.style.display=(param.style.display=="none") ? "" : "none"; 
} 
//--></script>

';

}


add_action('wp_head', 'ddet_javascript');
add_filter('the_content', 'ddet_process');

?>