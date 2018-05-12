<?php /* @version 1.0.24 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_more_options_section', array(
    'title'       => esc_html__('Extend TotalPress','totalpress'),
    'panel'       => 'totalpress_more_options',
    'priority'    => 1,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field( 'totalpress_theme_customizer', array(
	'type'        => 'custom',
	'settings'    => 'tp-primo-link',
	'label'       => __('Make TotalPress even more AWESOME by extending that awesomeness with TP-Primo! With a ton of extra options available, TP Primo will help you go to the next level and create the site you have always wanted.<br /><br />','totalpress'),
	'section'     => 'upsell_section',
	'default' => '<a class="tp button expanded" href="https://themeawesome.com/tp-primo/" target="_blank">' . esc_html__('Download TP Primo Today','totalpress') . '</a>',
	'priority'    => 999,
));