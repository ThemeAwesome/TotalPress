<?php
if ( ! defined('ABSPATH')) exit;
// Flush transients used in totalpress_categorized_blog.
function totalpress_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Scram kid yah bother me!
	delete_transient('totalpress_categories');
}
add_action('edit_category','totalpress_category_transient_flusher');
add_action('save_post','totalpress_category_transient_flusher');
// returns true if blog has more than one category
if ( ! function_exists( 'totalpress_categorized_blog' ) ) :
	function totalpress_categorized_blog() {
		if ( false === ( $the_thunder_cats_ho = get_transient( 'totalpress_categories' ) ) ) {
			// Create an array of all the categories that are attached to posts.
			$the_thunder_cats_ho = get_categories( array(
				'fields'     => 'ids',
				'hide_empty' => 1,
				// We only need to know if there is more than one category.
				'number'     => 2,
			) );
			// Count the number of categories that are attached to the posts.
			$the_thunder_cats_ho = count( $the_thunder_cats_ho );

			set_transient( 'totalpress_categories', $the_thunder_cats_ho );
		}
		if ( $the_thunder_cats_ho > 1 ) {
			// This blog has more than 1 category so totalpress_categorized_blog should return true.
			return true;
		} else {
			// This blog has only 1 category so totalpress_categorized_blog should return false.
			return false;
		}
	}
endif;
// add classes for the body element.
if ( ! function_exists('totalpress_body_classes')) :
	function totalpress_body_classes( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}
	    if (get_theme_mod('totalpress_hide_sitetitle')) {
	        $classes[] = 'no-site-title';
	    } else {
	        $classes[] = 'has-site-title';
	    }
	    if (get_theme_mod('totalpress_hide_tagline')) {
	        $classes[] = 'no-site-tagline';
	    } else {
	        $classes[] = 'has-site-tagline';
	    }
		return $classes;
	}
	add_filter('body_class','totalpress_body_classes');
endif;
if ( ! function_exists('totalpress_layout_classes')) {
	function totalpress_layout_classes($classes) {
		// pagetemplate source ordering
		if (get_theme_mod('totalpress_theme_layout_container') == 'one_container')
			$classes[] = 'one-container';
		if (get_theme_mod('totalpress_top_sidebar_container') == 'full')
			$classes[] = 'top-sidebar-full';
		if (get_theme_mod('totalpress_inner_top_sidebar_container') == 'full')
			$classes[] = 'inner-top-sidebar-full';
		if (get_theme_mod('totalpress_header_container') == 'full')
			$classes[] = 'header-container-full';
		if (get_theme_mod('totalpress_inner_head_container') == 'full')
			$classes[] = 'inner-head-container-full';
		if (get_theme_mod('totalpress_nav_container') == 'full')
			$classes[] = 'nav-container-full';
		if (get_theme_mod('totalpress_inner_nav_container') == 'full')
			$classes[] = 'top-bar-full';
		if (get_theme_mod('totalpress_post_content_container') == 'full')
			$classes[] = 'post-content-full';
		if (get_theme_mod('totalpress_post_inner_content_container') == 'full')
			$classes[] = 'post-inner-content-full';
		if (get_theme_mod('totalpress_footer_widgets_main_container') == 'full')
			$classes[] = 'footer-widgets-full';
		if (get_theme_mod('totalpress_inner_footer_widgets_container') == 'full')
			$classes[] = 'inner-footer-widgets-full';
		if (get_theme_mod('totalpress_main_footer_container') == 'full')
			$classes[] = 'site-footer-full';
		if (get_theme_mod('totalpress_inner_footer_container') == 'full')
			$classes[] = 'inner-footer-full';
		return $classes;
	}
	add_filter('body_class','totalpress_layout_classes');
}
if ( ! function_exists('totalpress_order_classes')) {
	function totalpress_order_classes($classes) {
		// pagetemplate source ordering
		if (get_theme_mod('totalpress_blog_layout') == 'right_sidebar')
			$classes[] = 'cs';
		if (get_theme_mod('totalpress_blog_layout') == 'left_sidebar')
			$classes[] = 'sc';
		if (get_theme_mod('totalpress_blog_layout') == 'sidebars_right')
			$classes[] = 'css';
		if (get_theme_mod('totalpress_blog_layout') == 'sidebars_left')
			$classes[] = 'ssc';
		if (get_theme_mod('totalpress_blog_layout') == 'both_sidebars')
			$classes[] = 'scs';
		if (get_theme_mod('totalpress_blog_layout') == 'no_sidebars')
			$classes[] = 'nsb';
		if (is_page_template('page-templates/content-sidebar.php'))
			$classes[] = 'cs_single_template';
		if (is_page_template('page-templates/sidebar-content.php'))
			$classes[] = 'sc_single_template';
		if (is_page_template('page-templates/content-sidebar-sidebar.php'))
			$classes[] = 'css_single_template';
		if (is_page_template('page-templates/sidebar-sidebar-content.php'))
			$classes[] = 'ssc_single_template';
		if (is_page_template('page-templates/sidebar-content-sidebar.php'))
			$classes[] = 'scs_single_template';
		if (is_page_template('page-templates/full-width.php'))
			$classes[] = 'nsb_single_template';
		if (get_post_meta(get_the_id(),'totalpress_hide_widget_one',true))
			$classes[] = 'no-widget-one';
		if (get_post_meta(get_the_id(),'totalpress_hide_widget_two',true))
			$classes[] = 'no-widget-two';
		if (get_post_meta(get_the_id(),'totalpress_hide_widget_three',true))
			$classes[] = 'no-widget-three';
		if (get_post_meta(get_the_id(),'totalpress_hide_widget_four',true))
			$classes[] = 'no-widget-four';
		if (get_post_meta(get_the_id(),'totalpress_hide_widget_five',true))
			$classes[] = 'no-widget-five';
		if (get_post_meta(get_the_id(),'totalpress_hide_widget_one',true) && get_post_meta(get_the_id(),'totalpress_hide_widget_two',true) && get_post_meta(get_the_id(),'totalpress_hide_widget_three',true) && get_post_meta(get_the_id(),'totalpress_hide_widget_four',true) && get_post_meta(get_the_id(),'totalpress_hide_widget_five',true))
			$classes[] = 'no-footer-widgets';
		if (get_post_meta(get_the_id(),'totalpress_remove_content_area_padding',true))
			$classes[] = 'no-pad';
		return $classes;
	}
	add_filter('body_class','totalpress_order_classes');
}

// Add a pingback url auto-discovery header for singularly identifiable articles.
if ( ! function_exists('totalpress_pingback_header')) :
	function totalpress_pingback_header() {
		if ( is_singular() && pings_open() ) {
			echo '<link rel="pingback" href="', esc_url( get_bloginfo('pingback_url')), '">';
		}
	}
	add_action('wp_head','totalpress_pingback_header');
endif;

// Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
if ( ! function_exists('totalpress_page_menu_args')) :
	function totalpress_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
	add_filter('wp_page_menu_args','totalpress_page_menu_args');
endif;

// archive title
if ( ! function_exists('totalpress_build_archive_title')) :
	function totalpress_build_archive_title() { ?>
		<?php if (is_author() && get_the_author_meta('description') && is_multi_author() ) : ?>
			<?php if (have_posts()) : ?>
			<?php the_post(); ?>
			<div class="author-info small-12 cell">
				<h1 class="page-title">
					<?php the_archive_title(); ?>
				</h1>
					<div class="author-img small-12 cell">
						<?php echo get_avatar(get_the_author_meta('user_email'),apply_filters('thempress_avatar_size',75)); ?>
					</div><!-- .author-img -->
					<?php if ( get_the_author_meta('description')) : ?>
					<div class="author-description small-12 cell">
						<p><?php the_author_meta('description'); ?></p>
					</div><!-- .author-description -->
					<?php endif; ?>
			</div><!-- .author-info -->
			<?php rewind_posts(); ?>
			<?php endif; ?>
			<?php else: ?>
			<header class="page-header">
				<?php
					the_archive_title('<h1 class="page-title">','</h1>');
					the_archive_description('<div class="archive-description">','</div>');
				?>
			</header><!-- .page-header -->
		<?php endif; ?>
	<?php
	}
	add_action('totalpress_archive_title','totalpress_build_archive_title');
endif;

// modify archive title
if ( ! function_exists('totalpress_modify_archive_title')) :
	function totalpress_modify_archive_title($title) {
		if (is_category()) {
			$title = single_cat_title('', false);
		} elseif (is_tag()) {
			$title = single_tag_title('', false);
		} elseif (is_month()) {
			$title = single_month_title(' ', false);
		} elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
		return $title;
	}
	add_filter('get_the_archive_title','totalpress_modify_archive_title');
endif;

// prints html for page footer
if ( ! function_exists('totalpress_build_entry_page_footer')) :
	function totalpress_build_entry_page_footer() { 
		$show_page_edit = apply_filters( 'totalpress_show_page_edit', true );
		if ( $show_page_edit ) {
			echo apply_filters('totalpress_footer_entry_output', sprintf(
				'<footer class="entry-footer">%1$s</footer><!-- .entry-footer -->',
				edit_post_link( __('Edit Page','totalpress'),'<span class="edit-link">','</span>')
			));
		}
	}
	add_action('totalpress_entry_page_footer','totalpress_build_entry_page_footer');
endif;

// prints html for current post-date/time and author
if ( ! function_exists( 'totalpress_build_posted_on' ) ) :
	function totalpress_build_posted_on() {
		$date = apply_filters('totalpress_post_date',true);
		$author = apply_filters('totalpres_post_author',true);
		$time_string = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time('U')) {
			$time_string .= '<time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$open_entry_meta = sprintf('<div class="entry-meta">');
		echo apply_filters('totalpress_open_entry_meta',$open_entry_meta);
			// If our date is enabled, show it.
			if ( $date ) {
				echo apply_filters( 'totalpress_post_date_output', sprintf( '<span class="posted-on">%1$s</span>', // WPCS: XSS ok, sanitization ok.
					sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
						esc_url( get_permalink() ),
						esc_attr( get_the_time() ),
						$time_string
					)
				), $time_string );
			}
			// If our author is enabled, show it.
			if ( $author ) {
				echo apply_filters('totalpress_post_author_output', sprintf( '<span class="byline"> %1$s</span>', // WPCS: XSS ok, sanitization ok.
					sprintf( '<span class="author vcard" itemtype="http://schema.org/Person" itemscope="itemscope" itemprop="author">%1$s <a class="url fn n" href="%2$s" title="%3$s" rel="author" itemprop="url"><span class="author-name" itemprop="name">%4$s</span></a></span>',
						__( 'by','totalpress' ),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						/* translators: 1: Author name */
						esc_attr( sprintf( __('View all posts by %s','totalpress'), get_the_author() ) ),
						esc_html( get_the_author() )
					)
				) );
			}

		$close_entry_meta = sprintf( '</div><!-- .entry-meta -->' );
		echo apply_filters( 'totalpress_close_entry_meta', $close_entry_meta );
	}
	add_action('totalpress_posted_on','totalpress_build_posted_on');
endif;

// prints html for categories, tags and comments
if ( ! function_exists('totalpress_build_entry_footer')) :
	function totalpress_build_entry_footer() { 
		$categories = apply_filters( 'totalpress_show_categories', true );
		$tags = apply_filters( 'totalpress_show_tags', true );
		$comments = apply_filters( 'totalpress_show_comments', true );
		$open_entry_footer = sprintf( '<footer class="entry-footer"><p class="entry-meta">' );
		echo apply_filters( 'totalpress_open_entry_footer', $open_entry_footer ); 
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.','totalpress' ));
			if ($categories_list && $categories) {
				echo apply_filters( 'totalpress_category_list_output', sprintf( '<span class="cat-links">Posted in: <span class="screen-reader-text">%1$s </span>%2$s</span>', // WPCS: XSS ok, sanitization ok.
					esc_html_x( 'Categories', 'Used before category names.', 'totalpress' ),
					$categories_list
				));
			}
			$tags_list = get_the_tag_list( '', _x( ', ','Used between list items, there is a space after the comma.','totalpress'));
			if ( $tags_list && $tags ) {
				echo apply_filters( 'totalpress_tag_list_output', sprintf( '<span class="tags-links"> Tagged: <span class="screen-reader-text">%1$s </span>%2$s</span>', // WPCS: XSS ok, sanitization ok.
					esc_html_x( 'Tags', 'Used before tag names.', 'totalpress' ),
					$tags_list
				));
			}
			if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) && $comments ) {
				echo '<span class="comments-link">';
					comments_popup_link( __('Leave a comment','totalpress'), __('1 Comment','totalpress'), __('% Comments', 'totalpress' ) );
				echo '</span>';
			}
		}
		$close_entry_footer = sprintf( '</p></footer><!-- .entry-footer -->' );
		echo apply_filters( 'totalpress_close_entry_footer', $close_entry_footer );
	}
	add_action('totalpress_entry_footer','totalpress_build_entry_footer');
endif;

// comments and pingback template - thanks TU
if ( ! function_exists('totalpress_comments')) :
function totalpress_comments( $comment, $args, $depth ) {
	$args['avatar_size'] = apply_filters('totalpress_comment_avatar_size',50);
	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php __('Pingback:','totalpress'); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __('Edit','totalpress'),
			'<span class="edit-link">','</span>'); ?>
		</div>
	<?php else : ?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<?php if ( 0 != $args['avatar_size']) echo get_avatar( $comment, $args['avatar_size'] ); ?>
				<div class="comment-author-info">
					<div class="comment-author vcard">
						<?php printf('<cite class="fn">%s</cite>',get_comment_author_link()); ?>
					</div><!-- .comment-author -->
					<div class="entry-meta comment-metadata">
						<a href="<?php echo esc_url(get_comment_link( $comment->comment_ID)); ?>">
							<time datetime="<?php comment_time( 'c' ); ?>">
								<?php printf( esc_attr('%1$s at %2$s','1: date,2: time','totalpress'),get_comment_date(),get_comment_time()); ?>
							</time>
						</a>
						<?php edit_comment_link( __('Edit','totalpress'),'<span class="edit-link">','</span>'); ?>
						<?php comment_reply_link( array_merge( $args, array(
							'add_below' => 'div-comment',
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
							'before'    => '<span class="reply-link">',
							'after'     => '</span>',
						))); ?>
					</div><!-- .comment-metadata -->
				</div><!-- .comment-author-info -->
				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php __('Your comment is awaiting moderation.','totalpress'); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->
			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</article><!-- .comment-body -->
	<?php
	endif;
}
endif;

// shows navigation to next/previous pages
if ( ! function_exists( 'totalpress_content_nav' ) ) :
	function totalpress_content_nav( $html_id ) {
	global $wp_query;
	$html_id = esc_attr( $html_id );
	if ( $wp_query->max_num_pages > 1) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php __('Post Navigation','totalpress'); ?></h3>
			<div class="pagination-previous alignleft"><?php next_posts_link( __('Older Posts','totalpress')); ?></div>
			<div class="pagination-next alignright"><?php previous_posts_link( __('Newer Posts','totalpress')); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
add_action('totalpress_content_navigation','totalpress_content_nav');
endif;

// single post navigation
if ( ! function_exists('totalpress_post_nav')) :
	function totalpress_post_nav() { ?>
		<nav class="nav-single">
			<span class="nav-previous"><?php previous_post_link('%link','&laquo; %title'); ?></span>
			<span class="nav-next"><?php next_post_link('%link','%title &raquo;'); ?></span>
		</nav><!-- .nav-single -->
	<?php
	}
	add_action('totalpress_post_navigation','totalpress_post_nav');
endif;