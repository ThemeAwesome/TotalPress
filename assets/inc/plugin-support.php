<?php /* @version 1.0.1 */
if ( ! defined('ABSPATH')) exit;
function totalpress_setup_woocommerce() {
	if ( ! class_exists('WooCommerce') ) {
		return;
	}
	// Add support for WooCommerce features
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
	
	//Remove default WooCommerce wrappers
	remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
	remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
	remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
}
add_action('after_setup_theme','totalpress_setup_woocommerce');

// add opening containers
if ( ! function_exists('totalpress_woocommerce_start')) :
	function totalpress_woocommerce_start() { ?>
	<div id="primary" class="woo- cell">
		<main id="main" class="site-main" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php totalpress_article_schema('CreativeWork'); ?>>
				<div class="inside-article">
					<div class="entry-content" itemprop="text">
	<?php 
	}
	add_action('woocommerce_before_main_content','totalpress_woocommerce_start',10);
endif;

// add closing containers
if ( ! function_exists('totalpress_woocommerce_end')) :
	function totalpress_woocommerce_end() { ?>
					</div><!-- .entry-content -->
				</div><!-- .inside-article -->
			</article><!-- article -->
		</main><!-- .site-main -->
	</div><!-- #primary -->
	<?php
	}
	add_action('woocommerce_after_main_content','totalpress_woocommerce_end',10);
endif;