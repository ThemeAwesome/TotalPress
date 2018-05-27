<?php
if ( ! defined('ABSPATH')) exit; ?>
<?php if (is_active_sidebar('right-sidebar')) : ?>
<?php do_action('totalpress_open_right_sidebar_container') ?>
<?php do_action('totalpress_before_right_sidebar'); ?>
<?php dynamic_sidebar('right-sidebar'); ?>
<?php do_action('totalpress_after_right_sidebar'); ?>
<?php do_action('totalpress_close_right_sidebar_container') ?>
<?php endif; ?>