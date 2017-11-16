<?php /* @version 1.0.2 */
if ( ! defined('ABSPATH')) exit;
get_header(); ?>
	<div id="primary" class="content-area small-12 large-8 cell">
		<main id="main" class="site-main" role="main">
			<?php do_action('totalpress_before_the_post_content'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/post/content',get_post_format()); ?>
			<?php endwhile; ?>
				<?php do_action('totalpress_content_navigation','page-nav'); ?>
			<?php else : ?>
				<?php get_template_part('template-parts/content','none'); ?>
			<?php endif; ?>
			<?php do_action('totalpress_before_the_post_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
do_action('totalpress_sidebars');
get_footer();