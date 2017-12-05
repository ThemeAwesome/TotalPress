<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit;
get_header(); ?>
	<?php do_action('totalpress_open_post_container') ?>
	<?php do_action('totalpress_before_the_post_content'); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part('template-parts/page/content','page'); ?>
	<?php if ( comments_open() || '0' != get_comments_number() ) : comments_template(); endif; ?>
	<?php endwhile; ?>
	<?php do_action('totalpress_close_post_container') ?>
<?php 
do_action('totalpress_sidebars');
get_footer();