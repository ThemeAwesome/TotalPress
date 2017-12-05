<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit; ?>
<?php do_action('totalpress_open_article_container'); ?>
	<?php do_action('totalpress_before_entry_header'); ?>
	<?php do_action('totalpress_content_entry_header'); ?>
	<?php do_action('totalpress_before_entry_header'); ?>
	<?php do_action('totalpress_featured_image'); ?>
	<?php if ( get_theme_mod('totalpress_show_excerpt') == 'excerpt') : ?>
	<div class="entry-summary" itemprop="text">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__('Pages:','totalpress'),
		'after'  => '</div>',
		)); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>
	<?php totalpress_entry_footer(); ?>
	<?php do_action( 'totalpress_after_entry_content' ); ?>
<?php do_action('totalpress_close_article_container'); ?>