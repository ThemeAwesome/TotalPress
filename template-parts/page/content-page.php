<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit; ?>
<?php do_action('totalpress_open_article_container'); ?>
	<?php do_action('totalpress_before_entry_header'); ?>
	<?php do_action('totalpress_content_page_entry_header'); ?>
	<?php do_action('totalpress_after_entry_header'); ?>
	<?php do_action('totalpress_featured_image_single'); ?>
	<div class="entry-content" itemprop="text">
		<?php the_content(); wp_link_pages( array(
			'before' => '<div class="page-links">' . __('Pages:','totalpress'),'after' => '</div>',)); ?>
	</div><!-- .entry-content -->
	<?php totalpress_entry_page_footer(); ?>
	<?php do_action('totalpress_after_entry_content'); ?>
<?php do_action('totalpress_close_article_container'); ?>