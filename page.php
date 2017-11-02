<?php /* @version 1.0.0 */
if ( ! defined('ABSPATH')) exit;
get_header(); ?>
	<div id="primary" class="content-area small-12 large-8 cell">
		<main id="main" class="site-main" role="main">
		<?php do_action('totalpress_before_the_page_content'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('template-parts/page/content','page'); ?>
			<?php if ( comments_open() || '0' != get_comments_number() ) : ?>
				<?php comments_template(); ?>
			<?php endif; ?>
		<?php endwhile; ?>
		<?php do_action('totalpress_after_the_page_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
do_action('totalpress_sidebars');
get_footer();