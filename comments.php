<?php /* @version 1.0.7 */
if ( ! defined('ABSPATH')) exit;
if ( post_password_required() ) {
	return; } ?>
<div id="comments" class="comments-area">
	<div class="inside-comments">
	<?php do_action('totalpress_before_comments'); ?>
	<?php if (have_comments()) : ?>
		<h3 class="comments-title"><?php printf( _n('One thought on &ldquo;%2$s&rdquo;','%1$s thoughts on &ldquo;%2$s&rdquo;',get_comments_number(),'totalpress'),number_format_i18n(get_comments_number()),get_the_title()); ?></h3>
		<ol class="comment-list"><?php wp_list_comments( array('callback' => 'totalpress_comments')); ?></ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e('Comment navigation','totalpress'); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __('&laquo; Old Comments','totalpress')); ?></div>
				<div class="nav-next"><?php next_comments_link( __('New Comments &raquo;','totalpress')); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<?php if (! comments_open()) : ?>
			<p class="no-comments"><?php _e('Comments are closed.','totalpress'); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
			<?php // You can modify the comments form to suit your needs here. Please refer to http://codex.wordpress.org/Function_Reference/comment_form as well as http://codex.wordpress.org/Function_Reference/comments_template
				$commenter = wp_get_current_commenter();
				$req = get_option( 'require_name_email' );
				$required_text = __('&nbsp;Required fields are marked <span class="required">*</span>','totalpress');
				$required_name = __('Your Name <span class="required">*</span>','totalpress');
				$required_email = __('Your Email <span class="required">*</span>','totalpress');
				$aria_req = ( $req ? " aria-required='true'" : '');
		   		$comments_args = array(
				  'id_form'           => 'commentform',
				  'id_submit'         => 'submit',
				  'title_reply'       => apply_filters('totalpress_leave_comment',__('Leave a Comment','totalpress')),
				  'title_reply_to'    => apply_filters('totalpress_leave_reply',__('Leave a Reply to %s','totalpress')),
				  'cancel_reply_link' => apply_filters('totalpress_cancel_reply',__('Cancel Reply','totalpress')),
				  'label_submit'      => apply_filters('totalpress_post_comment',__('Post Comment','totalpress')),
			  'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Comment','totalpress') .
			    '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
			    '</textarea></p>',
			  'must_log_in' => '<p class="must-log-in">' .
			    sprintf(
			      __('You must be <a href="%s">logged in</a> to post a comment.','totalpress'),
			      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
			    ) . '</p>',
			  'logged_in_as' => '<p class="logged-in-as">' .
			    sprintf(
			    __('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','totalpress'),
			      admin_url( 'profile.php' ),
			      $user_identity,
			      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
			    ) . '</p>',
			  'comment_notes_before' => '<p class="comment-notes">' .
			    __('Your email address will not be published.','totalpress') . ($req ? $required_text : '') . '</p>',
			  'fields' => apply_filters( 'comment_form_default_fields', array(
			    'author' =>
			      '<div class="grid container"><div class="grid-x grid-padding-x"><p class="comment-form-author large-auto cell">' .
			      '<label for="author">' . ($req ? $required_name : 'Your Name') . '</label> ' .
			      '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
			      '" size="50"' . $aria_req . ' /></p>',
			    'email' =>
			      '<p class="comment-form-email large-auto cell"><label for="email">' . ( $req ? $required_email : 'Your Email' ) . '</label> ' .
			      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
			      '" size="50"' . $aria_req . ' /></p>',
			    'url' =>
			      '<p class="comment-form-url large-auto cell"><label for="url">' .
			      __( 'Your Website', 'totalpress' ) . '</label>' .
			      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
			      '" size="50" /></p></div></div>'
			    )
			  ),
			);
			comment_form($comments_args); ?>
</div><!-- end .inside-comments -->	
</div><!-- end #comments -->