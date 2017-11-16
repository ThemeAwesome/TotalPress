<?php /* @version 1.0.2 */
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>
	<div id="primary" class="content-area small-12 large-8 cell">
		<main id="main" class="site-main" role="main">
			<?php do_action('totalpress_before_search_content'); ?>
			<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__('Search Results for: %s','totalpress'), '<span>' . get_search_query() . '</span>'); ?></h1>
			</header><!-- .page-header -->
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('template-parts/post/content',get_post_format()); ?>
			<?php endwhile; ?>
				<?php do_action('totalpress_content_navigation','page-nav'); ?>
			<?php else : ?>
				<?php get_template_part('template-parts/post/content','none'); ?>
			<?php endif; ?>
			<?php do_action('totalpress_after_search_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php 
do_action('totalpress_sidebars');
get_footer();