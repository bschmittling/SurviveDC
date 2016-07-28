<?PHP
require( dirname(__FILE__) . '/wp-load.php' );

//if you want to use a key to protect comment submissions oncomment these lines and pass a k=somekey param
//$key = "12345";
//if ($_GET["k"] != $key){
//  echo "Not a valid key";//  exit;
//}


//id if the post this comment is suppose to go on
$comment_post_ID = (int) $_GET['comment_post_ID'];
$comment_author = "Mobile App";
//check if post exists
$status = $wpdb->get_row( $wpdb->prepare("SELECT post_status, comment_status FROM $wpdb->posts WHERE ID = %d", $comment_post_ID) );
if ( empty($status->comment_status) ) {
   echo "No Post with that ID Exists";
   exit;
}

//get comment info from POST param
$comment_content = ( isset($_POST['message']) ) ? trim($_POST['message']) : null;

$commentdata = compact('comment_post_ID', 'comment_author', 'comment_content');

//http://codex.wordpress.org/Function_Reference/wp_new_comment
$comment_id = wp_new_comment( $commentdata );
echo $comment_id;
?>
