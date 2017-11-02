<?php /* @version 1.0.0 */
if ( ! defined('ABSPATH')) exit; ?>
<?php if (is_active_sidebar('sidebar-1')) : ?>
	<div id="right-sidebar" itemtype="http://schema.org/WPSideBar" itemscope="itemscope" role="complementary" class="rts widget-area  small-12 large-4 cell">
		<?php do_action('totalpress_before_right_sidebar'); ?>
		<?php dynamic_sidebar('sidebar-1'); ?>
		<?php do_action('totalpress_after_right_sidebar'); ?>
	</div><!-- #right-sidebar -->
<?php endif; ?>