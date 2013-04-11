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
	// Comment Form
	//=============================================================================
	if(comments_open()){
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Requires registration, but not logged in
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		if(get_option('comment_registration') && !$user_ID){
			echo '<p><i>Sorry, you need to <a href="'.wp_login_url(get_permalink()).'">log in</a> to comment.</i></p>';
		} else {
			echo '<form action="' . get_bloginfo('url') . '/wp-comments-post.php" method="post" id="commentform">';
				//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				// Show the standard comment form
				//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				if($user_ID): global $current_user; ?>
					<div class="group-generic">
						<aside><?php _e('Logged in as'); ?></aside>
						<div class="comment-header">
							<a href="<?php bloginfo('url') ?>/wp-admin/profile.php"><?php echo $user_identity; ?> <?php echo get_avatar($current_user->ID, 96) ?></a>							
						</div>
					</div>
					<br>
				<?php //- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				// Not logged in, so ask for email and website
				//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
				else : ?>
					<div class="group">
						<label for="author"><?php _e('Name'); ?></label>
						<input type="text" id="author" name="author" value="<?php echo $comment_author ?>">
					</div>
					<div class="group">
						<label for="email"><?php _e('Mail <small>(not published)</small>'); ?></label>
						<input type="text" id="email" name="email" value="<?php echo $comment_author_email ?>">
					</div>					
					<div class="group">
						<label for="url"><?php _e('Website'); ?></label>
						<input type="text" id="url" name="url" value="<?php echo $comment_author_url ?>">
					</div>
				<?php endif;?>

				<div class="group">
					<label for="comment"><?php _e('Comment'); ?></label>
					<textarea name="comment" id="comment"></textarea>
				</div>
				<input type="submit" id="submit" value="<?php _e('Submit Comment'); ?>">
				<?php comment_id_fields($post->ID); do_action('comment_form', $post->ID); ?>
				<?php cancel_comment_reply_link(__('Cancel Repy')); ?>
			<?php echo '</form>';
		}
	} else {
		echo '<p><i>Sorry, comments have been closed. Please send me a <a href="http://twitter.com/thejadobe" target="_blank">Tweet</a> if you\'d like to reopen the discussion!</i></p>';
	}
	echo '<hr>';

	//=============================================================================
	// Display Comments
	//=============================================================================
	if($comments){
		wp_list_comments(array(
			'callback'		=> 'custom_comment_callback',
			'end-callback'	=> '__return_false',
			'style'			=> 'div',
			'avatar_size'	=> 96
		));
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	// No Comments
	//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
	} else {
		echo '<p><i>'.__('No one has commented yet. Be the first!').'</i></p>';
	}


	//###########################################################################
	// Custom Callback for the comments
	//###########################################################################
	function custom_comment_callback($comment, $args, $depth){
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Comment is awaiting moderation
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		global $post;

		if($comment->comment_approved == '0'){
			echo '<p><b>' . __('Your comment is awaiting approval.') . '</b></p>';
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		// Display Comment
		//- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		} else {
			//=============================================================================
			// Get Comment User Meta
			//=============================================================================
			if($user = get_user_by('email', $comment->comment_author_email)){
				$userUrl = '<a href="' . str_replace('jadobe.com', $user->data->user_nicename . '.jadobe.com', get_bloginfo('url')) . '">' . $user->data->display_name . '</a>';
			} else {
				if($comment->comment_author_url) $userUrl = '<a href="' . $comment->comment_author_url . '">'.$comment->comment_author.'</a>';
				else $userUrl = $comment->comment_author;
			}
			//=============================================================================
			// Create the comment
			//=============================================================================
		?>
			<div class="group-comment depth-<?php echo min($depth-1, 2) ?> <?php if($post->post_author === $comment->user_id) echo 'author' ?>" id="comment-<?php echo $comment->comment_ID ?>">
				<aside>
					<p class="align-center">
						<?php echo get_avatar($comment->user_id, $args['avatar_size']) ?>
						<br><?php echo $userUrl ?> 
						<br><?php echo date('d, F Y', strtotime($comment->comment_date)) ?>
					</p>
				</aside>
				<div>
					<p>
						<?php echo htmlspecialchars($comment->comment_content); ?>
					</p>
					<p><?php comment_reply_link(array('respond_id' => 'commentform', 'add_below' => 'comment', 'depth' => 1, 'max_depth' => 3), $comment->comment_ID) ?></p>
				</div>
			</div>
		<?php }
	}
?>