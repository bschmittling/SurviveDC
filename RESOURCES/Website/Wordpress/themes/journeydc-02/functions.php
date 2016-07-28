<?php
function twitter_status($twitter_id, $hyperlinks = true) {
    
	$c = curl_init();
    curl_setopt($c, CURLOPT_URL, "http://twitter.com/statuses/user_timeline/$twitter_id.xml");
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    $src = curl_exec($c);
    curl_close($c);
    preg_match('/<text>(.*)<\/text>/', $src, $m);
    $status_message = htmlentities($m[1]);
    if( $hyperlinks ) $status_message = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\">\\0</a>", $status_message);
	
	preg_match('/<created_at>(.*)<\/created_at>/', $src, $t);
    $status_time = htmlentities($t[1]);
    if( $hyperlinks ) $status_time = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]", "<a href=\"\\0\">\\0</a>", $status_time);
	
	$status_time = shortenText($status_time,10);
	
	$status_time = str_replace("Dec", "December", $status_time);
	$status_time = str_replace("Jan", "January", $status_time);
	$status_time = str_replace("Sat", "Saturday", $status_time);
	$status_time = str_replace("Wed", "Wednesday", $status_time);
	$status_time = str_replace("Thu", "Thursday", $status_time);
	$status_time = "<br />Updated via <a href=\"http://twitter.com/".$twitter_id."\">Twitter</a> on " . $status_time;
	
	
	$status =  $status_message . " " . $status_time;
	
    return($status);
}

function shortenText($text,$num) {
	// Change to the number of characters you want to display
	$chars = $num;
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	//$text = $text."...";
	return $text;
}


function wt_get_category_ID() {
	$category = get_the_category();
	return $category[0]->cat_ID;
}


//return the name of the top parent page base on a page_id
function getTopParentPostName($myid){
	$mypage = get_page($myid);

	if ($mypage->post_parent == 0){
		return $mypage->post_name;
	}
	else{
		return getTopParentPostName($mypage->post_parent);
	}

}


/** get_parent_id
  * get the id of the parent of a given page
  * @param int page id
  * @return int the id of the page's parent page
  */
function get_parent_id ( $child = 0 ) {
        global $wpdb;
        // Make sure there is a child ID to process
        if ( $child > 0 ) {
                $result = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = $child");
        } else {
                // ... or set a zero result.
                $result = 0;
        }
        //
        return $result;
}




?>