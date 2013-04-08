<?php //###########################################################################
// Our custom comment form
//###########################################################################
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// Exit if you're a snooper
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		header("Location: http://jadobe.com/");
		die();
	}

	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// Exit if you need a password
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	if(!empty($post->post_password)){
		if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password){
			echo '<p><b>' . __('Sorry, but this comment is password protected.') . '</b></p>';
		}
	}

	//=============================================================================
	// Display Comments
	//=============================================================================
	if($comments){
		foreach($comments as $comment){
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			// Comment is awaiting moderation
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			if($comment->comment_approved == '0'){
				echo '<p><b>' . __('Your comment is awaiting approval.') . '</b></p>';
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			// Display Comment
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			} else {
				ppr($comment);
			}
		}
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// No Comments
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	} else {
		echo '<p><i>'.__('No one has commented yet. Be the first!').'</i></p>';
	}

	//=============================================================================
	// Comment Form
	//=============================================================================
	if(comments_open()){
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Requires registration, but not logged in
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		if(get_option('comment_registration') && !$user_ID){
			echo '<p><i>Sorry, you need to <a href="'.wp_login_url(get_permalink()).'">log in</a> to comment.</i></p>';
		} else {
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			// Show the standard comment form
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			if($user_ID){
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			// Not logged in, so ask for email and website
			//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
			}else{

			}
		}
	} else {
		echo '<p><i>Sorry, comments have been closed. Please send me a <a href="http://twitter.com/thejadobe" target="_blank">Tweet</a> if you\'d like to reopen the discussion!</i></p>';
	}
?>