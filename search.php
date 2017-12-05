<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>
	<?php do_action('totalpress_open_post_container') ?>
	<?php do_action('totalpress_before_the_post_content'); ?>
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title"><?php printf(esc_html__('Search Results for: %s','totalpress'), '<span>' . get_search_query() . '</span>'); ?></h1>
		</header><!-- .page-header -->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('template-parts/post/content',get_post_format()); ?>
		<?php endwhile; ?>
			<?php do_action('totalpress_content_navigation','page-nav'); ?>
		<?php else : ?>
			<?php get_template_part('template-parts/post/content','none'); ?>
		<?php endif; ?>
	<?php do_action('totalpress_close_post_container') ?>
<?php 
do_action('totalpress_sidebars');
get_footer();