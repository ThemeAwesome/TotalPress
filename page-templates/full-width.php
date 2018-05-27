<?php
/**
 * Template Name: Full-Width | No Sidebars
 * Template Post Type: post, page, aside, audio, chat, gallery, image, link, quote, status, video
 */
if ( ! defined('ABSPATH')) exit;
get_header(); ?>
	<?php do_action('totalpress_page_template_container') ;?>
	<?php do_action('totalpress_before_the_post_content'); ?>
	<?php do_action('totalpress_page_template_loop'); ?>
	<?php do_action('totalpress_close_post_container') ?>
<?php
get_footer();