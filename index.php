<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit;
get_header(); ?>
	<?php do_action('totalpress_open_post_container') ?>
	<?php do_action('totalpress_before_the_post_content'); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php get_template_part('template-parts/post/content',get_post_format()); ?>
	<?php endwhile; ?>
		<?php do_action('totalpress_content_navigation','page-nav'); ?>
	<?php else : ?>
		<?php get_template_part('template-parts/content','none'); ?>
	<?php endif; ?>
	<?php do_action('totalpress_close_post_container') ?>
<?php 
do_action('totalpress_sidebars');
get_footer();