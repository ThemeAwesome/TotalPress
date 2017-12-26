<?php /* @version 1.0.6 */
if ( ! defined('ABSPATH')) exit; ?>
<?php if (is_active_sidebar('cs1-sidebar')) : ?>
<?php do_action('totalpress_open_right_sidebar_container') ?>
<?php do_action('totalpress_before_right_sidebar'); ?>
<?php dynamic_sidebar('cs1-sidebar'); ?>
<?php do_action('totalpress_after_right_sidebar'); ?>
<?php do_action('totalpress_close_right_sidebar_container') ?>
<?php endif; ?>