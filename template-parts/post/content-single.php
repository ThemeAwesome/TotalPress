<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit; ?>
<?php do_action('totalpress_open_article_container'); ?>
<?php do_action('totalpress_before_entry_header'); ?>
	<?php do_action('totalpress_content_entry_header'); ?>
	<?php do_action('totalpress_featured_image_single'); ?>
	<?php do_action('totalpress_after_entry_header'); ?>
	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
			'before' => '<div class="page-links">' . __('Pages:','totalpress'),
			'after'  => '</div>',
		) ); ?>
	</div><!-- .entry-content -->
	<?php totalpress_entry_footer(); ?>
	<?php do_action('totalpress_post_navigation'); ?>
	<?php do_action( 'totalpress_after_entry_content' ); ?>
<?php do_action('totalpress_close_article_container'); ?>
<?php do_action('totalpress_display_author'); ?>