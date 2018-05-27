<?php
if ( ! defined('ABSPATH') ) exit;
get_header(); ?>
<?php do_action('totalpress_open_post_container') ?>
<?php do_action('totalpress_before_the_post_content'); ?>
<?php do_action('totalpress_search_loop'); ?>
<?php do_action('totalpress_close_post_container') ?>
<?php 
do_action('totalpress_sidebars');
get_footer();