<?php
if ( ! defined('ABSPATH')) exit;
function totalpress_setup_woocommerce() {
	if ( ! class_exists('WooCommerce') ) {
		return; }
	add_theme_support('wc-product-gallery-zoom');
	add_theme_support('wc-product-gallery-lightbox');
	add_theme_support('wc-product-gallery-slider');
	remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
	remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
	remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
}
add_action('after_setup_theme','totalpress_setup_woocommerce');

if ( ! function_exists('totalpress_woocommerce_start')) :
	function totalpress_woocommerce_start() { ?>
	<div id="primary" class="woo- cell">
		<main id="main" class="site-main" role="main">
			<?php do_action('totalpress_open_article_container'); ?>
					<div class="entry-content" itemprop="text">
	<?php 
	}
	add_action('woocommerce_before_main_content','totalpress_woocommerce_start',10);
endif;

if ( ! function_exists('totalpress_woocommerce_end')) :
	function totalpress_woocommerce_end() { ?>
					</div><!-- .entry-content -->
			<?php do_action('totalpress_close_article_container'); ?>
		</main><!-- .site-main -->
	</div><!-- #primary -->
	<?php
	}
	add_action('woocommerce_after_main_content','totalpress_woocommerce_end',10);
endif;