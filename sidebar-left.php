<?php /* @version 1.0.1 */
if ( ! defined('ABSPATH')) exit; ?>
<?php if (is_active_sidebar('sidebar-2')) : ?>
	<div id="left-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="lfts widget-area  small-12 large-4 cell">
		<?php do_action('totalpress_before_left_sidebar'); ?>
		<?php dynamic_sidebar('sidebar-2'); ?>
		<?php do_action('totalpress_after_left_sidebar'); ?>
	</div><!-- #left-sidebar -->
<?php endif; ?>