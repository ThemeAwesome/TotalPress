<?php /* @version 1.0.5 */
if ( ! defined('ABSPATH')) exit; ?>
<?php if (is_active_sidebar('cs2-sidebar')) : ?>
<?php do_action('totalpress_open_left_sidebar_container') ?>
<?php do_action('totalpress_before_left_sidebar'); ?>
<?php dynamic_sidebar('cs2-sidebar'); ?>
<?php do_action('totalpress_after_left_sidebar'); ?>
<?php do_action('totalpress_close_left_sidebar_container') ?>
<?php endif; ?>