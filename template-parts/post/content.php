<?php /* @version 1.0.5 */
if ( ! defined('ABSPATH')) exit; ?>
<?php do_action('totalpress_open_article_container'); ?>
<?php do_action('totalpress_before_entry_header'); ?>
<?php do_action('totalpress_blog_entry_header'); ?>
<?php do_action('totalpress_before_entry_header'); ?>
<?php do_action('totalpress_featured_image'); ?>
<?php do_action('totalpress_excerpt_full_post'); ?>
<?php totalpress_entry_footer(); ?>
<?php do_action( 'totalpress_after_entry_content' ); ?>
<?php do_action('totalpress_close_article_container'); ?>