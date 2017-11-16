<?php
/**
 * Template Name: Full-Width | No Sidebars
 * Template Post Type: post, page, aside, audio, chat, gallery, image, link, quote, status, video
 * @version 1.0.2
 */
if ( ! defined('ABSPATH')) exit;
get_header(); ?>
	<div id="primary" class="content-area small-12 cell">
		<main id="main" class="site-main" role="main">
		<?php do_action('totalpress_before_fw'); ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php if(is_single()) { ?>
				<?php get_template_part('template-parts/post/content','single'); ?>
			<?php } ?>
			<?php if(is_page()) { ?>
				<?php get_template_part('template-parts/page/content','page'); ?>
			<?php } ?>
			<?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?>
		<?php endwhile; ?>
		<?php do_action('totalpress_after_fw'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();