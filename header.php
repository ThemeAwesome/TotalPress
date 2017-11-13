<?php /* @version 1.0.1 */
if ( ! defined('ABSPATH')) exit; ?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>

<body <?php totalpress_body_schema();?> <?php body_class(); ?>><section><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content','totalpress'); ?></a></section>
<?php do_action('totalpress_theme_start');
	do_action('totalpress_top_sidebar');
	do_action('totalpress_header');
	do_action('totalpress_open_content_container'); ?>
