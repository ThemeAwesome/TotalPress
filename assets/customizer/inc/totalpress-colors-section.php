<?php /* @version 1.0.14 */
if ( ! defined('ABSPATH')) exit;
TotalPress_Kirki::add_section( 'totalpress_colors_section', array(
    'title'       => esc_html__('Basic Colors','totalpress'),
    'panel'       => 'totalpress_general_options',
    'priority'    => 3,
    'capability'  => 'edit_theme_options',
));
TotalPress_Kirki::add_field('totalpress_theme_customizer',array(
	'type'        => 'color',
	'settings'    => 'totalpress_theme_font_colors',
	'label'       => esc_html__('Font Color','totalpress'),
	'tooltip'     => esc_html__('Change default font color.','totalpress'),
	'section'     => 'totalpress_colors_section',
	'default'     => '#3f3f3f',
	'priority'    => 1,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'body',
			'function' => 'css',
			'property' => 'color',
		),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer', array(
	'type'        => 'color',
	'settings'    => 'totalpress_theme_link_colors',
	'label'       => esc_html__('Link Color','totalpress'),
	'tooltip'     => esc_html__('Change default link color. Does not change link color of other areas, i.e. .entry-meta a, etc.','totalpress'),
	'section'     => 'totalpress_colors_section',
	'default'     => '#b02329',
	'priority'    => 2,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'a',
			'function' => 'css',
			'property' => 'color',
		),
	),
));
TotalPress_Kirki::add_field('totalpress_theme_customizer', array(
	'type'        => 'color',
	'settings'    => 'totalpress_theme_link_hover_colors',
	'label'       => esc_html__('Link Hover Color','totalpress'),
	'tooltip'     => esc_html__('Change default link hover color. Does not change link hover color of other areas, i.e. .entry-meta a:hover, etc.','totalpress'),
	'section'     => 'totalpress_colors_section',
	'default'     => '#3f3f3f',
	'priority'    => 3,
	'transport'   => 'auto',
	'output'      => array(
		array(
			'element' => 'a:hover,a:focus',
			'function' => 'css',
			'property' => 'color',
		),
	),
));