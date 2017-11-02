<?php /* @version 1.0.0 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'colors_section', array(
    'title'       => esc_attr__('Basic Color Options','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 3,
    'capability'  => 'edit_theme_options',
));

TotalPress_Kirki::add_field( 'theme_customizer', array(
	'type'        => 'color',
	'settings'    => 'theme_link_colors',
	'label'       => esc_attr__('Link Color','totalpress'),
	'tooltip'     => esc_attr__('Change default link color. Does not change link color of other areas, i.e. .entry-meta a, etc.','totalpress'),
	'section'     => 'colors_section',
	'default'     => '#b02329',
	'priority'    => 11,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'a',
			'function' => 'css',
			'property' => 'color',
		),
	),
) );

TotalPress_Kirki::add_field( 'theme_customizer', array(
	'type'        => 'color',
	'settings'    => 'theme_link_hover_colors',
	'label'       => esc_attr__('Link Hover Color','totalpress'),
	'tooltip'     => esc_attr__('Change default link hover color. Does not change link hover color of other areas, i.e. .entry-meta a:hover, etc.','totalpress'),
	'section'     => 'colors_section',
	'default'     => '#3f3f3f',
	'priority'    => 12,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'a:hover,a:focus',
			'function' => 'css',
			'property' => 'color',
		),
	),
) );
