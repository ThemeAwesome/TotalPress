<?php
if ( ! defined('ABSPATH')) exit; ?>
<?php if (is_active_sidebar('left-sidebar')) : ?>
<?php do_action('totalpress_open_left_sidebar_container') ?>
<?php do_action('totalpress_before_left_sidebar'); ?>
<?php dynamic_sidebar('left-sidebar'); ?>
<?php do_action('totalpress_after_left_sidebar'); ?>
<?php do_action('totalpress_close_left_sidebar_container') ?>
<?php endif; ?>