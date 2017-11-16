<?php /* @version 1.0.2 */
if ( ! defined('ABSPATH')) exit;
get_header(); ?>
	<div id="primary" class="content-area-404 small-12 cell">
		<?php do_action('totalpress_before_404_content'); ?>
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title" itemprop="headline"><?php echo apply_filters('totalpress_404_headline', __('Oops! Nothing was found.','totalpress')); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content" itemprop="text">
					<p><?php echo apply_filters('totalpress_404_text', __('Try doing another search, making sure that any spelling, cApitALiZaTiOn, and punctuation are correct.','totalpress')); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		<?php do_action('totalpress_after_404_content'); ?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
