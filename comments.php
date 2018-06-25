<?php
if ( ! defined('ABSPATH')) exit;
if ( post_password_required() ) {
	return; }
do_action( 'totalpress_before_comments' ); ?>
<div id="comments">
<div class="inside-comments">
	<?php do_action( 'totalpress_inside_comments' );
	if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			$comments_number = get_comments_number();
			if ( 1 === $comments_number ) {
				printf(
					/* translators: %s: post title */
					esc_html_x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'totalpress' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: number of comments, 2: post title */
					esc_html( _nx(
						'%1$s thought on &ldquo;%2$s&rdquo;',
						'%1$s thoughts on &ldquo;%2$s&rdquo;',
						$comments_number,
						'comments title',
						'totalpress'
					) ),
					number_format_i18n( $comments_number ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h3>
		<?php
		do_action( 'totalpress_below_comments_title' );
		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e('Comment navigation','totalpress'); ?></h2>
				<div class="nav-previous"><?php previous_comments_link( __('&laquo; Older Comments','totalpress')); ?></div>
				<div class="nav-next"><?php next_comments_link( __('Newer Comments &raquo;','totalpress')); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; ?>
		<ol class="comment-list">
			<?php wp_list_comments( array(
				'callback' => 'totalpress_comments',
			) );
			?>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e('Comment navigation','totalpress'); ?></h2>
				<div class="nav-previous"><?php previous_comments_link( __('&laquo; Older Comments','totalpress')); ?></div>
				<div class="nav-next"><?php next_comments_link( __('Newer Comments &raquo;','totalpress')); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif;
	endif;
	// If comments are closed
	if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'totalpress' ); // WPCS: XSS OK. ?></p>
	<?php endif;
	$commenter = wp_get_current_commenter();
	$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	$fields = array(
		'before_fields' => '<div class="grid container comment-fields"><div class="grid-x grid-padding-x">',
		'author' => '<label for="author" class="screen-reader-text">' . __( 'Name', 'totalpress' ) . '</label><p class="comment-form-author large-auto cell"><input placeholder="' . __( 'Name', 'totalpress' ) . ' *" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" /></p>',
		'email' => '<label for="email" class="screen-reader-text">' . __( 'Email', 'totalpress' ) . '</label><p class="comment-form-email large-auto cell"><input placeholder="' . __( 'Email', 'totalpress' ) . ' *" id="email" name="email" type="email" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" /></p>',
		'url' => '<label for="url" class="screen-reader-text">' . __( 'Website', 'totalpress' ) . '</label><p class="comment-form-url large-auto cell"><input placeholder="' . __( 'Website', 'totalpress' ) . '" id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
		'after_fields' => '</div></div>',
// Now we will add our new privacy checkbox optin
        'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
            '<label for="wp-comment-cookies-consent">' . __('Save my name, email, and website in this browser for the next time I comment.','totalpress') . '</label></p>',
	);
	$defaults = array(
		'fields'		=> apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field' => '<p class="comment-form-comment"><label for="comment" class="screen-reader-text">' . __( 'Comment', 'totalpress' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'comment_notes_before' => null,
		'comment_notes_after'  => null,
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => apply_filters( 'totalpress_leave_comment', __( 'Leave a Comment', 'totalpress' ) ),
		'label_submit'         => apply_filters( 'totalpress_post_comment', __( 'Post Comment', 'totalpress' ) ),
	);
	comment_form( $defaults );
	?>
</div><!-- end .inside-comments -->	
</div><!-- #comments -->