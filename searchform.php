<?php /* @version 1.0.4 */
if ( ! defined('ABSPATH')) exit; ?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' )); ?>">
	<label>
		<span class="screen-reader-text"><?php apply_filters('totalpress_search_label', _ex('Search for:','label','totalpress')); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr(apply_filters('totalpress_search_placeholder', _x( 'Search &hellip;','placeholder','totalpress'))); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s" title="<?php esc_attr( apply_filters('totalpress_search_label', _ex('Search for:', 'label','totalpress'))); ?>">
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr(apply_filters('totalpress_search_button', _x('Search','submit button','totalpress'))); ?>">
</form>